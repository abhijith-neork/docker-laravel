<?php

namespace App\Services;

use App\Models\User;
use App\Models\Skill;
use App\Models\HistorySkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Mail;

class SkillService {
    
    public function addSkill(Request $request, $id=null) {
        DB::beginTransaction();            
        try {
            $skill = $this->addSkillDetail($request, $id);
            DB::commit();

            return $skill;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        } 
    }

    private function addSkillDetail(Request $request, $id) {
        if ($id) {
            $skill = Skill::where('id',$id)->first();
        } else {
            $skill = new Skill();
        }
        $skill->skill_name           = $request->skill_name;
        $skill->save();
     
        return $skill;
    }
    public function deleteSkill($id) {
        DB::beginTransaction();            
        try {
            $skill = Skill::find($id);
            $skill->delete(); 
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }   
    }
}