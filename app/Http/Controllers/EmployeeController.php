<?php

namespace App\Http\Controllers;
use App\Models\Designation;
use App\Models\LeaveType;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\EmployeeService;
use App\Models\EmployeeBasicInfo;
use App\Models\EmployeeDocument;
use App\Models\EmployeeEducation;
use App\Models\EmployeeExperience;
use App\Models\EmployeeLeaveDetail;
use App\Models\EmployeeProfessionalDetail;
use App\Models\EmployeeSalaryDetail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    private EmployeeService $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
  
        $this->middleware('auth');
        session_start();
    }

    public function index()
    {
        $id = Auth::user()->id;
        $basic_info = EmployeeBasicInfo::where('user_id',$id)->where('status',1)->first();
        $documents = EmployeeDocument::where('user_id',$id)->where('status',1)->get();
        $education = EmployeeEducation::where('user_id',$id)->where('status',1)->get();
        $experience = EmployeeExperience::where('user_id',$id)->where('status',1)->get();
        $leaves = EmployeeLeaveDetail::where('user_id',$id)->where('status',1)->get();
        $professional = EmployeeProfessionalDetail::where('status',1)->first();
        $salary = EmployeeSalaryDetail::where('user_id',$id)->where('status',1)->first();
        return view('employee.view_profile')
        ->with('basic_info',$basic_info)
        ->with('education',$education)
        ->with('documents',$documents)
        ->with('experience',$experience)
        ->with('leaves',$leaves)
        ->with('professional',$professional)
        ->with('salary',$salary);
    }
    public function view_list()
    {
        return view('hr.employee.view_list');
    }
    public function addEmployee()
    {
        $designation =  Designation::where('status',1)->get();
        $leave_types =  LeaveType::where('status',1)->get();
        $technology =  Technology::where('status',1)->get();
        $supervisor =  User::where('status',1)->get();
        return view('hr.employee.employee_reg')
        ->with('user',[])
        ->with('basic_info',[])
        ->with('education',[])
        ->with('documents',[])
        ->with('experience',[])
        ->with('leaves',[])
        ->with('professional',[])
        ->with('salary',[])
        ->with('designation',$designation)
        ->with('technology',$technology)
        ->with('supervisor',$supervisor)
        ->with('leave_types',$leave_types);
    }
    public function editEmployee($uid = null)
    {
        $designation =  Designation::where('status',1)->get();
        $leave_types =  LeaveType::where('status',1)->get();
        $technology =  Technology::where('status',1)->get();
        $supervisor =  User::where('status',1)->get();
        if($uid){
            $id = Crypt::decrypt($uid);
            $user = User::find($id);
            $basic_info = EmployeeBasicInfo::where('user_id',$id)->where('status',1)->first();
            $documents = EmployeeDocument::where('user_id',$id)->where('status',1)->get();
            $education = EmployeeEducation::where('user_id',$id)->where('status',1)->get();
            $experience = EmployeeExperience::where('user_id',$id)->where('status',1)->get();
            $leaves = EmployeeLeaveDetail::where('user_id',$id)->where('status',1)->get();
            $professional = EmployeeProfessionalDetail::where('user_id',$id)->where('status',1)->first();
            $salary = EmployeeSalaryDetail::where('user_id',$id)->where('status',1)->first();
            return view('hr.employee.employee_reg')
            ->with('user',$user)
            ->with('basic_info',$basic_info)
            ->with('education',$education)
            ->with('documents',$documents)
            ->with('experience',$experience)
            ->with('leaves',$leaves)
            ->with('professional',$professional)
            ->with('salary',$salary)
            ->with('technology',$technology)
            ->with('supervisor',$supervisor)
            ->with('designation',$designation)
            ->with('leave_types',$leave_types);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->employeeService->addEmployee($request,$request->user_id);
        return $result;
        // if ($result) {

        //     return response()->json([
        //         'success' => true,
        //         'id' => $result,
        //     ]);
        // } else {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Designation not found',
        //     ], 404);
        // }
        // if ($result) {
        //     return redirect('add-employee')->with('success', 'Employee details added Successfully.');
        // }
        // return redirect('add-employee')->with('error', 'Sorry, 505 error occured.');

    }

    public function get_employees(Request $request)
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

        if($search_arr['value'] != '') {
            $_SESSION['searchValEmployee'] =  $search_arr['value'];
        }
        else if(isset($_SESSION['searchValEmployee'])){
            $search_arr['value'] = $_SESSION['searchValEmployee'];
        }  
        $searchValue = $search_arr['value']; // Search value
        $employee = new EmployeeBasicInfo;
        // Total records
        $totalRecords = $employee->get_count();
        $totalRecordswithFilter = $employee->get_count($searchValue);

        // Fetch records
        $records = $employee->get_records($columnName,$columnSortOrder,$searchValue,$start,$rowperpage);

        $data_arr = array();
        foreach($records as $record){
            $employee_code  = $record->employee_code;
            $employee_name  = $record->name;
            $designation  = $record->designation_name;
            $joined_date  = $record->date_of_joining;
            ($record->status==1) ? $status ='Active' : $status ='Inactive';
            $edit_action = '';
            $delete_action = '';
            $view_action = '';

                                            
            // if (hasPermission('employee.update')) {

                $edit_action = ' <span><a href="'.route('edit-employee', ['id' => Crypt::encrypt($record->id)]) .'" class="edit-item edit_employee_btn"  title="Edit">
                <i class=" icon-close   fas fa-edit"></i></a></span>';
            // }
            // if (hasPermission('employee.destroy')) {

                $delete_action = '<span> <a
            href="#" class="delete-item delete_employee_btn" data-bs-toggle="modal" title="Delete"
            data-bs-target="#dltModal" data-id="' . Crypt::encrypt($record->id) . '"> <i class="fa fa-close dlt-icon"></i></a></span>';
            // }
            // if (hasPermission('employee.list')) {

            //     $view_action = '<span> <a href="#"
            // class="delete-item view_employee_btn" data-bs-toggle="modal" data-bs-target="#viewemployeeModal" title="View" data-id="' . Crypt::encrypt($record->id) . '"data-type="viewemployee"> <i class="fa fa-eye eye-icon"></i></a></span>';
            // }
            $data_arr[] = array(
                "employee_code" => $employee_code,
                "name" => $employee_name,
                "designation_name" => $designation,
                "date_of_joining" => $joined_date,
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $id = Crypt::decrypt($request->employee_id);
        $result = $this->employeeService->deleteEmployee($id);
        if ($result) {
            return redirect('employee-list')->with('success', 'Employee details Successfully deleted.');

        } else {
            return redirect('employee-list')->with('error', 'Sorry, 505 error occured.');

        }
    }
    public function employeeReport(Request $request)
    {
        return view('hr.employee.employee_report');

    }
}
