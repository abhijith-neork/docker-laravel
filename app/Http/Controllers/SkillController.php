<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Services\SkillService;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class SkillController extends Controller
{
     private SkillService $skillService;

    public function __construct(SkillService $skillService)
    {
        $this->skillService = $skillService;
  
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::get();
        return view('master.skill.index',['skills'=>$skills]);
    }
    public function get_skills(Request $request, $is_list)
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
        $skill = new Skill;
        // Total records
        $totalRecords = $skill->get_count();
        $totalRecordswithFilter = $skill->get_count($searchValue);

        // Fetch records
        $records = $skill->get_records($columnName,$columnSortOrder,$searchValue,$start,$rowperpage);

        $data_arr = array();
        foreach($records as $record){
            $skill_name  = $record->skill_name;
            ($record->status==1) ? $status ='Active' : $status ='Inactive';
            $edit_action = '';
            $delete_action = '';
            $view_action = '';

                                            
            if (hasPermission('skill.update')) {

                $edit_action = ' <span><a href="#skillEditForm" class="edit-item edit_skill_btn"  title="Edit"
                data-id="' . Crypt::encrypt($record->id) . '" data-type="editskill" data-bs-toggle="offcanvas"
                href="#userEditForm" skill="button" aria-controls="offcanvasExample1">
                <i class=" icon-close   fas fa-edit"></i></a></span>';
            }
            if (hasPermission('skill.destroy')) {

                $delete_action = '<span> <a
            href="#" class="delete-item delete_skill_btn" data-bs-toggle="modal" title="Delete"
            data-bs-target="#dltModal" data-id="' . Crypt::encrypt($record->id) . '"> <i class="fa fa-close dlt-icon"></i></a></span>';
            }
            // if (hasPermission('skill.list')) {

            //     $view_action = '<span> <a href="#"
            // class="delete-item view_skill_btn" data-bs-toggle="modal" data-bs-target="#viewskillModal" title="View" data-id="' . Crypt::encrypt($record->id) . '"data-type="viewskill"> <i class="fa fa-eye eye-icon"></i></a></span>';
            // }
            $data_arr[] = array(
                "skill_name" => $skill_name,
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
    public function store(StoreSkillRequest $request)
    {
        $result = $this->skillService->addSkill($request);
        if ($result) {
            return redirect('skill')->with('success', 'Skill details added Successfully.');
        }
        return redirect('skill')->with('error', 'Sorry, 505 error occured.');

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
        $skill_details  =   Skill::find($id);
        return response()->json($skill_details); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSkillRequest $request)
    {
        $id = Crypt::decrypt($request->skill_id);
        $result = $this->skillService->addSkill($request,$id);
        if ($result) {
            return redirect('skill')->with('success', 'Skill details updated Successfully.');
        }
        return redirect('skill')->with('error', 'Sorry, 505 error occured.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $id = Crypt::decrypt($request->skill_id);
        $result = $this->skillService->deleteSkill($id);
        if ($result) {
            return redirect('skill')->with('success', 'Skill details Successfully deleted.');

        } else {
            return redirect('skill')->with('error', 'Sorry, 505 error occured.');

        }
    }
    public function skillReport(Request $request)
    {
        return view('master.skill.skill_report');

    }

    public function getskillDetails(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->skill_id);
            $skill = Skill::find($id);
            if ($skill) {

                return response()->json([
                    'success' => true,
                    'data' => $skill,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Skill not found',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
            ], 500);
        }
    }

    public function check_skill_name(Request $request)
    {
        $cat = new Skill;
        $cat_details = $cat->get_skill_name($request->skill_name, $request->id);
        (count($cat_details) > 0) ? $data['status'] = 1 : $data['status'] = 0;
        return json_encode($data);
    }
}
