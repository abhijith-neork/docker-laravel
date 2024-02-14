<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveType;
use App\Http\Requests\StoreLeaveTypeRequest;
use App\Http\Requests\UpdateLeaveTypeRequest;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Services\LeaveTypeService;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class LeaveTypeController extends Controller
{
     private LeaveTypeService $leave_typeService;

    public function __construct(LeaveTypeService $leave_typeService)
    {
        $this->leave_typeService = $leave_typeService;
  
        $this->middleware('auth');
        session_start();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave_types = LeaveType::get();
        return view('master.leave_type.index',['leave_types'=>$leave_types]);
    }
    public function get_leave_types(Request $request, $is_list)
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
        // $searchValue = $search_arr?$search_arr['value']:''; // Search value
        if( $search_arr['value'] != '') {
            $_SESSION['searchValLeaveType'] =  $search_arr['value'];
        }
        else if(isset($_SESSION['searchValLeaveType'])){
            $search_arr['value'] = $_SESSION['searchValLeaveType'];
        }  
        $searchValue = $search_arr['value']; // Search value
        $leave_type = new LeaveType;
        // Total records
        $totalRecords = $leave_type->get_count();
        $totalRecordswithFilter = $leave_type->get_count($searchValue);

        // Fetch records
        $records = $leave_type->get_records($columnName,$columnSortOrder,$searchValue,$start,$rowperpage);

        $data_arr = array();
        foreach($records as $record){
            $leave_type_code  = $record->leave_type_code;
            $leave_type_name  = $record->leave_type_name;
            ($record->status==1) ? $status ='Active' : $status ='Inactive';
            $edit_action = '';
            $delete_action = '';
            $view_action = '';

                                            
            if (hasPermission('leave_type.update')) {

                $edit_action = ' <span><a href="#leave_typeEditForm" class="edit-item edit_leave_type_btn"  title="Edit"
                data-id="' . Crypt::encrypt($record->id) . '" data-type="editleave_type" data-bs-toggle="offcanvas"
                href="#userEditForm" leave_type="button" aria-controls="offcanvasExample1">
                <i class=" icon-close   fas fa-edit"></i></a></span>';
            }
            if (hasPermission('leave_type.destroy')) {

                $delete_action = '<span> <a
            href="#" class="delete-item delete_leave_type_btn" data-bs-toggle="modal" title="Delete"
            data-bs-target="#dltModal" data-id="' . Crypt::encrypt($record->id) . '"> <i class="fa fa-close dlt-icon"></i></a></span>';
            }
            // if (hasPermission('leave_type.list')) {

            //     $view_action = '<span> <a href="#"
            // class="delete-item view_leave_type_btn" data-bs-toggle="modal" data-bs-target="#viewleave_typeModal" title="View" data-id="' . Crypt::encrypt($record->id) . '"data-type="viewleave_type"> <i class="fa fa-eye eye-icon"></i></a></span>';
            // }
            $data_arr[] = array(
                "leave_type_code" => $leave_type_code,
                "leave_type_name" => $leave_type_name,
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
    public function store(StoreLeaveTypeRequest $request)
    {
        $result = $this->leave_typeService->addLeaveType($request);
        if ($result) {
            return redirect('leave_type')->with('success', 'Leave Type details added Successfully.');
        }
        return redirect('leave_type')->with('error', 'Sorry, 505 error occured.');

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
        $leave_type_details  =   LeaveType::find($id);
        return response()->json($leave_type_details); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeaveTypeRequest $request)
    {
        $id = Crypt::decrypt($request->leave_type_id);
        $result = $this->leave_typeService->addLeaveType($request,$id);
        if ($result) {
            return redirect('leave_type')->with('success', 'Leave Type details updated Successfully.');
        }
        return redirect('leave_type')->with('error', 'Sorry, 505 error occured.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $id = Crypt::decrypt($request->leave_type_id);
        $result = $this->leave_typeService->deleteLeaveType($id);
        if ($result) {
            return redirect('leave_type')->with('success', 'Leave Type details Successfully deleted.');

        } else {
            return redirect('leave_type')->with('error', 'Sorry, 505 error occured.');

        }
    }
    public function leave_typeReport(Request $request)
    {
        return view('master.leave_type.leave_type_report');

    }

    public function getleave_typeDetails(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->leave_type_id);
            $leave_type = LeaveType::find($id);
            if ($leave_type) {

                return response()->json([
                    'success' => true,
                    'data' => $leave_type,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Leave Type not found',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
            ], 500);
        }
    }

    public function check_leave_type_name(Request $request)
    {
        $cat = new LeaveType;
        $desig_details = $cat->get_leave_type_name($request->leave_type_name, $request->id);
        (count($desig_details) > 0) ? $data['status'] = 1 : $data['status'] = 0;
        return json_encode($data);
    }
    public function check_leave_type_code(Request $request)
    {
        $cat = new LeaveType;
        $desig_details = $cat->get_leave_type_code($request->leave_type_code, $request->id);
        (count($desig_details) > 0) ? $data['status'] = 1 : $data['status'] = 0;
        return json_encode($data);
    }
}
