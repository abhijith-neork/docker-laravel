<?php

namespace App\Services;

use App\Models\User;
use App\Models\JobRole;
use App\Models\HistoryJobRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Mail;

class JobRoleService {
    
    public function addJobRole(Request $request, $id=null) {
        DB::beginTransaction();            
        try {
            $job_role = $this->addJobRoleDetail($request, $id);
            DB::commit();

            return $job_role;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        } 
    }

    private function addJobRoleDetail(Request $request, $id) {
        if ($id) {
            $job_role = JobRole::where('id',$id)->first();
        } else {
            $job_role = new JobRole();
        }
        $job_role->job_role_name           = $request->job_role_name;
        $job_role->save();
     
        return $job_role;
    }
    public function deleteJobRole($id) {
        DB::beginTransaction();            
        try {
            $job_role = JobRole::find($id);
            $job_role->delete(); 
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }   
    }
}