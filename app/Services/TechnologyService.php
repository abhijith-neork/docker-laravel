<?php

namespace App\Services;

use App\Models\User;
use App\Models\Technology;
use App\Models\HistoryTechnology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Mail;

class TechnologyService {
    
    public function addTechnology(Request $request, $id=null) {
        DB::beginTransaction();            
        try {
            $technology = $this->addTechnologyDetail($request, $id);
            DB::commit();

            return $technology;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        } 
    }

    private function addTechnologyDetail(Request $request, $id) {
        if ($id) {
            $technology = Technology::where('id',$id)->first();
        } else {
            $technology = new Technology();
        }
        $technology->technology_name           = $request->technology_name;
        $technology->status                    = $request->status;
        $technology->save();
     
        return $technology;
    }
    public function deleteTechnology($id) {
        DB::beginTransaction();            
        try {
            $technology = Technology::find($id);
            $technology->delete(); 
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }   
    }
}