<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Services\TechnologyService;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class TechnologyController extends Controller
{
     private TechnologyService $technologyService;

    public function __construct(TechnologyService $technologyService)
    {
        $this->technologyService = $technologyService;
  
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
        $technologys = Technology::get();
        return view('master.technology.index',['technologys'=>$technologys]);
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
        // $searchValue = $search_arr?$search_arr['value']:''; // Search value
        if( $search_arr['value'] != '') {
            $_SESSION['searchValTechnology'] =  $search_arr['value'];
        }
        else if(isset($_SESSION['searchValTechnology'])){
            $search_arr['value'] = $_SESSION['searchValTechnology'];
        }  
        $searchValue = $search_arr['value']; // Search value        
        $technology = new Technology;
        // Total records
        $totalRecords = $technology->get_count();
        $totalRecordswithFilter = $technology->get_count($searchValue);

        // Fetch records
        $records = $technology->get_records($columnName,$columnSortOrder,$searchValue,$start,$rowperpage);

        $data_arr = array();
        foreach($records as $record){
            $technology_name  = $record->technology_name;
            ($record->status==1) ? $status ='Active' : $status ='Inactive';
            $edit_action = '';
            $delete_action = '';
            $view_action = '';

                                            
            if (hasPermission('technology.update')) {

                $edit_action = ' <span><a href="#technologyEditForm" class="edit-item edit_technology_btn"  title="Edit"
                data-id="' . Crypt::encrypt($record->id) . '" data-type="edittechnology" data-bs-toggle="offcanvas"
                href="#userEditForm" technology="button" aria-controls="offcanvasExample1">
                <i class=" icon-close   fas fa-edit"></i></a></span>';
            }
            if (hasPermission('technology.destroy')) {

                $delete_action = '<span> <a
            href="#" class="delete-item delete_technology_btn" data-bs-toggle="modal" title="Delete"
            data-bs-target="#dltModal" data-id="' . Crypt::encrypt($record->id) . '"> <i class="fa fa-close dlt-icon"></i></a></span>';
            }
            // if (hasPermission('technology.list')) {

            //     $view_action = '<span> <a href="#"
            // class="delete-item view_technology_btn" data-bs-toggle="modal" data-bs-target="#viewtechnologyModal" title="View" data-id="' . Crypt::encrypt($record->id) . '"data-type="viewtechnology"> <i class="fa fa-eye eye-icon"></i></a></span>';
            // }
            $data_arr[] = array(
                "technology_name" => $technology_name,
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
    public function store(StoreTechnologyRequest $request)
    {
        $result = $this->technologyService->addTechnology($request);
        if ($result) {
            return redirect('technology')->with('success', 'Technology details added Successfully.');
        }
        return redirect('technology')->with('error', 'Sorry, 505 error occured.');

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
        $technology_details  =   Technology::find($id);
        return response()->json($technology_details); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechnologyRequest $request)
    {
        $id = Crypt::decrypt($request->technology_id);
        $result = $this->technologyService->addTechnology($request,$id);
        if ($result) {
            return redirect('technology')->with('success', 'Technology details updated Successfully.');
        }
        return redirect('technology')->with('error', 'Sorry, 505 error occured.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $id = Crypt::decrypt($request->technology_id);
        $result = $this->technologyService->deleteTechnology($id);
        if ($result) {
            return redirect('technology')->with('success', 'Technology details Successfully deleted.');

        } else {
            return redirect('technology')->with('error', 'Sorry, 505 error occured.');

        }
    }
    public function technologyReport(Request $request)
    {
        return view('master.technology.technology_report');

    }

    public function gettechnologyDetails(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->technology_id);
            $technology = Technology::find($id);
            if ($technology) {

                return response()->json([
                    'success' => true,
                    'data' => $technology,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Technology not found',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
            ], 500);
        }
    }

    public function check_technology_name(Request $request)
    {
        $cat = new Technology;
        $cat_details = $cat->get_technology_name($request->technology_name, $request->id);
        (count($cat_details) > 0) ? $data['status'] = 1 : $data['status'] = 0;
        return json_encode($data);
    }
}
