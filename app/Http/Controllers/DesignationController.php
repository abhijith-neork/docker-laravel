<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use App\Http\Requests\StoreDesignationRequest;
use App\Http\Requests\UpdateDesignationRequest;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Services\DesignationService;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class DesignationController extends Controller
{
     private DesignationService $designationService;

    public function __construct(DesignationService $designationService)
    {
        $this->designationService = $designationService;
  
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
        $designations = Designation::get();
        return view('master.designation.index',['designations'=>$designations]);
    }
    public function get_designations(Request $request, $is_list)
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
            $_SESSION['searchValDesignation'] =  $search_arr['value'];
        }
        else if(isset($_SESSION['searchValDesignation'])){
            $search_arr['value'] = $_SESSION['searchValDesignation'];
        }  
        $searchValue = $search_arr['value']; // Search value
        $designation = new Designation;
        // Total records
        $totalRecords = $designation->get_count();
        $totalRecordswithFilter = $designation->get_count($searchValue);

        // Fetch records
        $records = $designation->get_records($columnName,$columnSortOrder,$searchValue,$start,$rowperpage);

        $data_arr = array();
        foreach($records as $record){
            $designation_code  = $record->designation_code;
            $designation_name  = $record->designation_name;
            ($record->status==1) ? $status ='Active' : $status ='Inactive';
            $edit_action = '';
            $delete_action = '';
            $view_action = '';

                                            
            if (hasPermission('designation.update')) {

                $edit_action = ' <span><a href="#designationEditForm" class="edit-item edit_designation_btn"  title="Edit"
                data-id="' . Crypt::encrypt($record->id) . '" data-type="editdesignation" data-bs-toggle="offcanvas"
                href="#userEditForm" designation="button" aria-controls="offcanvasExample1">
                <i class=" icon-close   fas fa-edit"></i></a></span>';
            }
            if (hasPermission('designation.destroy')) {

                $delete_action = '<span> <a
            href="#" class="delete-item delete_designation_btn" data-bs-toggle="modal" title="Delete"
            data-bs-target="#dltModal" data-id="' . Crypt::encrypt($record->id) . '"> <i class="fa fa-close dlt-icon"></i></a></span>';
            }
            // if (hasPermission('designation.list')) {

            //     $view_action = '<span> <a href="#"
            // class="delete-item view_designation_btn" data-bs-toggle="modal" data-bs-target="#viewdesignationModal" title="View" data-id="' . Crypt::encrypt($record->id) . '"data-type="viewdesignation"> <i class="fa fa-eye eye-icon"></i></a></span>';
            // }
            $data_arr[] = array(
                "designation_code" => $designation_code,
                "designation_name" => $designation_name,
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
    public function store(StoreDesignationRequest $request)
    {
        $result = $this->designationService->addDesignation($request);
        if ($result) {
            return redirect('designation')->with('success', 'Designation details added Successfully.');
        }
        return redirect('designation')->with('error', 'Sorry, 505 error occured.');

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
        $designation_details  =   Designation::find($id);
        return response()->json($designation_details); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDesignationRequest $request)
    {
        $id = Crypt::decrypt($request->designation_id);
        $result = $this->designationService->addDesignation($request,$id);
        if ($result) {
            return redirect('designation')->with('success', 'Designation details updated Successfully.');
        }
        return redirect('designation')->with('error', 'Sorry, 505 error occured.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $id = Crypt::decrypt($request->designation_id);
        $result = $this->designationService->deleteDesignation($id);
        if ($result) {
            return redirect('designation')->with('success', 'Designation details Successfully deleted.');

        } else {
            return redirect('designation')->with('error', 'Sorry, 505 error occured.');

        }
    }
    public function designationReport(Request $request)
    {
        return view('master.designation.designation_report');

    }

    public function getdesignationDetails(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->designation_id);
            $designation = Designation::find($id);
            if ($designation) {

                return response()->json([
                    'success' => true,
                    'data' => $designation,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Designation not found',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
            ], 500);
        }
    }

    public function check_designation_name(Request $request)
    {
        $cat = new Designation;
        $desig_details = $cat->get_designation_name($request->designation_name, $request->id);
        (count($desig_details) > 0) ? $data['status'] = 1 : $data['status'] = 0;
        return json_encode($data);
    }
    public function check_designation_code(Request $request)
    {
        $cat = new Designation;
        $desig_details = $cat->get_designation_code($request->designation_code, $request->id);
        (count($desig_details) > 0) ? $data['status'] = 1 : $data['status'] = 0;
        return json_encode($data);
    }
}
