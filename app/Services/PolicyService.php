<?php

namespace App\Services;

use App\Models\User;
use App\Models\Policy;
use App\Models\HistoryPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Mail;

class PolicyService {
    
    public function addPolicy(Request $request, $id=null) {
        DB::beginTransaction();            
        try {
            $policy = $this->addPolicyDetail($request, $id);
            DB::commit();

            return $policy;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        } 
    }

    private function addPolicyDetail(Request $request, $id) {
        if ($id) {
            $policy = Policy::where('id',$id)->first();
        } else {
            $policy = new Policy();
        }
        $policy->policy_title           = $request->policy_title;
        $policy->policy_description     = $request->policy_description;
        $policy->effective_from         = $request->effective_from;
        $policy->created_by             = Auth::user()->id;
        $policy->save();
     
        return $policy;
    }
    public function deletePolicy($id) {
        DB::beginTransaction();            
        try {
            $policy = Policy::find($id);
            $policy->delete(); 
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }   
    }
}