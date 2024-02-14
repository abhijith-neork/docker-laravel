<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Services\DepartmentService;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class DepartmentController extends Controller
{
     private DepartmentService $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
  
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::get();
        return view('master.department.index',['departments'=>$departments]);
    }
    public function get_departments(Request $request, $is_list)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        if(empty($columnIndex_arr))
        {
            $columnName ="id";
            $columnSortOrder = "desc";
        }
        else
        {
            // Column index
            $columnIndex = $columnIndex_arr[0]['column'];
            $columnName = $columnName_arr[$columnIndex]['data']; // Column name
            $columnSortOrder = $order_arr[0]['dir']; 
        }   
        $searchValue = $search_arr?$search_arr['value']:''; // Search value
        $department = new Department;
        // Total records
        $totalRecords = $department->get_count();
        $totalRecordswithFilter = $department->get_count($searchValue);

        // Fetch records
        $records = $department->get_records($columnName,$columnSortOrder,$searchValue,$start,$rowperpage);

        $data_arr = array();
        foreach($records as $record){
            $department_code  = $record->department_code;
            $department_name  = $record->department_name;
            ($record->status==1) ? $status ='Active' : $status ='Inactive';
            $edit_action = '';
            $delete_action = '';
            $view_action = '';

                                            
            if (hasPermission('department.update')) {

                $edit_action = ' <span><a href="#departmentEditForm" class="edit-item edit_department_btn"  title="Edit"
                data-id="' . Crypt::encrypt($record->id) . '" data-type="editdepartment" data-bs-toggle="offcanvas"
                href="#userEditForm" department="button" aria-controls="offcanvasExample1">
                <i class=" icon-close   fas fa-edit"></i></a></span>';
            }
            if (hasPermission('department.destroy')) {

                $delete_action = '<span> <a
            href="#" class="delete-item delete_department_btn" data-bs-toggle="modal" title="Delete"
            data-bs-target="#dltModal" data-id="' . Crypt::encrypt($record->id) . '"> <i class="fa fa-close dlt-icon"></i></a></span>';
            }
            // if (hasPermission('department.list')) {

            //     $view_action = '<span> <a href="#"
            // class="delete-item view_department_btn" data-bs-toggle="modal" data-bs-target="#viewdepartmentModal" title="View" data-id="' . Crypt::encrypt($record->id) . '"data-type="viewdepartment"> <i class="fa fa-eye eye-icon"></i></a></span>';
            // }
            $data_arr[] = array(
                "department_code" => $department_code,
                "department_name" => $department_name,
                "status" => $status,
                "action" => $edit_action . ' ' . $delete_action . ' ' . $view_action,

            );
        }

        $response = array(
           "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordswithFilter,
           "aaData" => $data_arr
        );

        return response()->json($response); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        $result = $this->departmentService->addDepartment($request);
        if ($result) {
            return redirect('department')->with('success', 'Department details added Successfully.');
        }
        return redirect('department')->with('error', 'Sorry, 505 error occured.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id   = Crypt::decrypt($id);
        $department_details  =   Department::find($id);
        return response()->json($department_details); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request)
    {
        $id = Crypt::decrypt($request->department_id);
        $result = $this->departmentService->addDepartment($request,$id);
        if ($result) {
            return redirect('department')->with('success', 'Department details updated Successfully.');
        }
        return redirect('department')->with('error', 'Sorry, 505 error occured.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $id = Crypt::decrypt($request->department_id);
        $result = $this->departmentService->deleteDepartment($id);
        if ($result) {
            return redirect('department')->with('success', 'Department details Successfully deleted.');

        } else {
            return redirect('department')->with('error', 'Sorry, 505 error occured.');

        }
    }
    public function departmentReport(Request $request)
    {
        return view('master.department.department_report');

    }

    public function getdepartmentDetails(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->department_id);
            $department = Department::find($id);
            if ($department) {

                return response()->json([
                    'success' => true,
                    'data' => $department,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Department not found',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
            ], 500);
        }
    }

    public function check_department_name(Request $request)
    {
        $cat = new Department;
        $desig_details = $cat->get_department_name($request->department_name, $request->id);
        (count($desig_details) > 0) ? $data['status'] = 1 : $data['status'] = 0;
        return json_encode($data);
    }
    public function check_department_code(Request $request)
    {
        $cat = new Department;
        $desig_details = $cat->get_department_code($request->department_code, $request->id);
        (count($desig_details) > 0) ? $data['status'] = 1 : $data['status'] = 0;
        return json_encode($data);
    }
}
