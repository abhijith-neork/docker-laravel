<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobRole;
use App\Http\Requests\StoreJobRoleRequest;
use App\Http\Requests\UpdateJobRoleRequest;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Services\JobRoleService;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class JobRoleController extends Controller
{
     private JobRoleService $job_roleService;

    public function __construct(JobRoleService $job_roleService)
    {
        $this->job_roleService = $job_roleService;
  
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job_roles = JobRole::get();
        return view('master.job_role.index',['job_roles'=>$job_roles]);
    }
    public function get_technologies(Request $request, $is_list)
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
        $job_role = new JobRole;
        // Total records
        $totalRecords = $job_role->get_count();
        $totalRecordswithFilter = $job_role->get_count($searchValue);

        // Fetch records
        $records = $job_role->get_records($columnName,$columnSortOrder,$searchValue,$start,$rowperpage);

        $data_arr = array();
        foreach($records as $record){
            $job_role_name  = $record->job_role_name;
            ($record->status==1) ? $status ='Active' : $status ='Inactive';
            $edit_action = '';
            $delete_action = '';
            $view_action = '';

                                            
            if (hasPermission('job_role.update')) {

                $edit_action = ' <span><a href="#job_roleEditForm" class="edit-item edit_job_role_btn"  title="Edit"
                data-id="' . Crypt::encrypt($record->id) . '" data-type="editjob_role" data-bs-toggle="offcanvas"
                href="#userEditForm" job_role="button" aria-controls="offcanvasExample1">
                <i class=" icon-close   fas fa-edit"></i></a></span>';
            }
            if (hasPermission('job_role.destroy')) {

                $delete_action = '<span> <a
            href="#" class="delete-item delete_job_role_btn" data-bs-toggle="modal" title="Delete"
            data-bs-target="#dltModal" data-id="' . Crypt::encrypt($record->id) . '"> <i class="fa fa-close dlt-icon"></i></a></span>';
            }
            // if (hasPermission('job_role.list')) {

            //     $view_action = '<span> <a href="#"
            // class="delete-item view_job_role_btn" data-bs-toggle="modal" data-bs-target="#viewjob_roleModal" title="View" data-id="' . Crypt::encrypt($record->id) . '"data-type="viewjob_role"> <i class="fa fa-eye eye-icon"></i></a></span>';
            // }
            $data_arr[] = array(
                "job_role_name" => $job_role_name,
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
    public function store(StoreJobRoleRequest $request)
    {
        $result = $this->job_roleService->addJobRole($request);
        if ($result) {
            return redirect('job_role')->with('success', 'JobRole details added Successfully.');
        }
        return redirect('job_role')->with('error', 'Sorry, 505 error occured.');

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
        $job_role_details  =   JobRole::find($id);
        return response()->json($job_role_details); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRoleRequest $request)
    {
        $id = Crypt::decrypt($request->job_role_id);
        $result = $this->job_roleService->addJobRole($request,$id);
        if ($result) {
            return redirect('job_role')->with('success', 'JobRole details updated Successfully.');
        }
        return redirect('job_role')->with('error', 'Sorry, 505 error occured.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $id = Crypt::decrypt($request->job_role_id);
        $result = $this->job_roleService->deleteJobRole($id);
        if ($result) {
            return redirect('job_role')->with('success', 'JobRole details Successfully deleted.');

        } else {
            return redirect('job_role')->with('error', 'Sorry, 505 error occured.');

        }
    }
    public function job_roleReport(Request $request)
    {
        return view('master.job_role.job_role_report');

    }

    public function getjob_roleDetails(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->job_role_id);
            $job_role = JobRole::find($id);
            if ($job_role) {

                return response()->json([
                    'success' => true,
                    'data' => $job_role,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'JobRole not found',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
            ], 500);
        }
    }

    public function check_job_role_name(Request $request)
    {
        $cat = new JobRole;
        $cat_details = $cat->get_job_role_name($request->job_role_name, $request->id);
        (count($cat_details) > 0) ? $data['status'] = 1 : $data['status'] = 0;
        return json_encode($data);
    }
}
