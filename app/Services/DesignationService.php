<?php

namespace App\Services;

use App\Models\User;
use App\Models\Designation;
use App\Models\HistoryDesignation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Mail;

class DesignationService {
    
    public function addDesignation(Request $request, $id=null) {
        DB::beginTransaction();            
        try {
            $designation = $this->addDesignationDetail($request, $id);
            DB::commit();

            return $designation;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        } 
    }

    private function addDesignationDetail(Request $request, $id) {
        if ($id) {
            $designation = Designation::where('id',$id)->first();
        } else {
            $designation = new Designation();
        }
        $designation->designation_code           = $request->designation_code;
        $designation->designation_name           = $request->designation_name;
        $designation->status                     = $request->status;
        $designation->created_by                 = Auth::user()->id;
        $designation->save();
     
        return $designation;
    }
    public function deleteDesignation($id) {
        DB::beginTransaction();            
        try {
            $designation = Designation::find($id);
            $designation->delete(); 
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }   
    }
}