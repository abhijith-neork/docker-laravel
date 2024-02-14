<?php

namespace App\Services;

use App\Models\User;
use App\Models\Department;
use App\Models\HistoryDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Mail;

class DepartmentService {
    
    public function addDepartment(Request $request, $id=null) {
        DB::beginTransaction();            
        try {
            $department = $this->addDepartmentDetail($request, $id);
            DB::commit();

            return $department;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        } 
    }

    private function addDepartmentDetail(Request $request, $id) {
        if ($id) {
            $department = Department::where('id',$id)->first();
        } else {
            $department = new Department();
        }
        $department->department_code           = $request->department_code;
        $department->department_name           = $request->department_name;
        $department->created_by                 = Auth::user()->id;
        $department->save();
     
        return $department;
    }
    public function deleteDepartment($id) {
        DB::beginTransaction();            
        try {
            $department = Department::find($id);
            $department->delete(); 
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }   
    }
}