<?php

namespace App\Services;

use App\Models\User;
use App\Models\LeaveType;
use App\Models\HistoryLeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Mail;

class LeaveTypeService {
    
    public function addLeaveType(Request $request, $id=null) {
        DB::beginTransaction();            
        try {
            $leave_type = $this->addLeaveTypeDetail($request, $id);
            DB::commit();

            return $leave_type;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        } 
    }

    private function addLeaveTypeDetail(Request $request, $id) {
        if ($id) {
            $leave_type = LeaveType::where('id',$id)->first();
        } else {
            $leave_type = new LeaveType();
        }
        $leave_type->leave_type_code           = $request->leave_type_code;
        $leave_type->leave_type_name           = $request->leave_type_name;
        $leave_type->status                    = $request->status;
        $leave_type->created_by                 = Auth::user()->id;
        $leave_type->save();
     
        return $leave_type;
    }
    public function deleteLeaveType($id) {
        DB::beginTransaction();            
        try {
            $leave_type = LeaveType::find($id);
            $leave_type->delete(); 
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }   
    }
}