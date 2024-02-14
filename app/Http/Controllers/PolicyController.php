<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;
use App\Http\Requests\StorePolicyRequest;
use App\Http\Requests\UpdatePolicyRequest;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Services\PolicyService;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class PolicyController extends Controller
{
     private PolicyService $policyService;

    public function __construct(PolicyService $policyService)
    {
        $this->policyService = $policyService;
  
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
        $policys = Policy::get();
        return view('admin.policy.index',['policys'=>$policys]);
    }
    public function get_policys(Request $request, $is_list)
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
            $_SESSION['searchValPolicy'] =  $search_arr['value'];
        }
        else if(isset($_SESSION['searchValPolicy'])){
            $search_arr['value'] = $_SESSION['searchValPolicy'];
        }  
        $searchValue = $search_arr['value']; 
                $policy = new Policy;
        // Total records
        $totalRecords = $policy->get_count();
        $totalRecordswithFilter = $policy->get_count($searchValue);

        // Fetch records
        $records = $policy->get_records($columnName,$columnSortOrder,$searchValue,$start,$rowperpage);

        $data_arr = array();
        foreach($records as $record){
            $policy_title  = $record->policy_title;
            $policy_description  = $record->policy_description;
            $effective_from  = $record->effective_from;
            ($record->status==1) ? $status ='Active' : $status ='Inactive';
            $edit_action = '';
            $delete_action = '';
            $view_action = '';

                                            
            if (hasPermission('policy.update')) {

                $edit_action = ' <span><a href="#policyEditForm" class="edit-item edit_policy_btn"  title="Edit"
                data-id="' . Crypt::encrypt($record->id) . '" data-type="editpolicy" data-bs-toggle="offcanvas"
                href="#userEditForm" policy="button" aria-controls="offcanvasExample1">
                <i class=" icon-close   fas fa-edit"></i></a></span>';
            }
            if (hasPermission('policy.destroy')) {

                $delete_action = '<span> <a
            href="#" class="delete-item delete_policy_btn" data-bs-toggle="modal" title="Delete"
            data-bs-target="#dltModal" data-id="' . Crypt::encrypt($record->id) . '"> <i class="fa fa-close dlt-icon"></i></a></span>';
            }
            // if (hasPermission('policy.list')) {

            //     $view_action = '<span> <a href="#"
            // class="delete-item view_policy_btn" data-bs-toggle="modal" data-bs-target="#viewpolicyModal" title="View" data-id="' . Crypt::encrypt($record->id) . '"data-type="viewpolicy"> <i class="fa fa-eye eye-icon"></i></a></span>';
            // }
            $data_arr[] = array(
                "policy_title" => $policy_title,
                "policy_description" => $policy_description,
                "effective_from" => $effective_from,
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
    public function store(StorePolicyRequest $request)
    {
        $result = $this->policyService->addPolicy($request);
        if ($result) {
            return redirect('policy')->with('success', 'Policy details added Successfully.');
        }
        return redirect('policy')->with('error', 'Sorry, 505 error occured.');

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
        $policy_details  =   Policy::find($id);
        return response()->json($policy_details); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePolicyRequest $request)
    {
        $id = Crypt::decrypt($request->policy_id);
        $result = $this->policyService->addPolicy($request,$id);
        if ($result) {
            return redirect('policy')->with('success', 'Policy details updated Successfully.');
        }
        return redirect('policy')->with('error', 'Sorry, 505 error occured.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $id = Crypt::decrypt($request->policy_id);
        $result = $this->policyService->deletePolicy($id);
        if ($result) {
            return redirect('policy')->with('success', 'Policy details Successfully deleted.');

        } else {
            return redirect('policy')->with('error', 'Sorry, 505 error occured.');

        }
    }
    public function policyReport(Request $request)
    {
        return view('admin.policy.policy_report');

    }

    public function getpolicyDetails(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->policy_id);
            $policy = Policy::find($id);
            if ($policy) {

                return response()->json([
                    'success' => true,
                    'data' => $policy,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Policy not found',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
            ], 500);
        }
    }

   
}
