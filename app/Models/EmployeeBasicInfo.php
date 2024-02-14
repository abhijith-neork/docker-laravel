<?php

namespace App\Models;
 
use OwenIt\Auditing\Contracts\Auditable; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeBasicInfo extends Model implements Auditable 
{ 
    use \OwenIt\Auditing\Auditable; 

    use HasFactory;
    public function get_count($searchValue = '', $status = '')
    {
        $count = User::select('count(*) as allcount')
        ->join('employee_basic_infos','employee_basic_infos.user_id','users.id')
        ->leftjoin('employee_professional_details','employee_professional_details.user_id','users.id')
        ->leftjoin('designations','employee_professional_details.designation_id','designations.id')
        ->where(function ($query) use ($searchValue) {
            $query->where('employee_basic_infos.employee_code', 'like', '%' . $searchValue . '%')
            ->orWhere('users.name', 'like', '%' . $searchValue . '%')
            ->orWhere('employee_professional_details.date_of_joining', 'like', '%' . $searchValue . '%')
            ->orWhere('designations.designation_name', 'like', '%' . $searchValue . '%')
            ->orWhere(function ($query) use ($searchValue) {
                // Map boolean values to string representations for searching
                if (strtolower($searchValue) === 'active') {
                    $query->where('status', 1);
                } elseif (strtolower($searchValue) === 'inactive') {
                    $query->where('status', 0);
                }
            });
        });
        if ($status != '') {
            $count->where('status', '=', $status);
        }
        return $count->count();
    }

    public function get_records($columnName, $columnSortOrder, $searchValue, $start, $rowperpage, $status = '')
    {
        $records = User::
        join('employee_basic_infos','employee_basic_infos.user_id','users.id')
        ->leftjoin('employee_professional_details','employee_professional_details.user_id','users.id')
        ->leftjoin('designations','employee_professional_details.designation_id','designations.id')
        ->orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query->where('employee_basic_infos.employee_code', 'like', '%' . $searchValue . '%')
                ->orWhere('users.name', 'like', '%' . $searchValue . '%')
                ->orWhere('employee_professional_details.date_of_joining', 'like', '%' . $searchValue . '%')
                ->orWhere('designations.designation_name', 'like', '%' . $searchValue . '%')
                ->orWhere(function ($query) use ($searchValue) {
                    // Map boolean values to string representations for searching
                    if (strtolower($searchValue) === 'active') {
                        $query->where('status', 1);
                    } elseif (strtolower($searchValue) === 'inactive') {
                        $query->where('status', 0);
                    }
                });
            })
            ->select('users.*','employee_basic_infos.employee_code','employee_professional_details.date_of_joining','designations.designation_name');

        if ($status != '') {
            $records->where('employee_basic_infos.status', $status);
        }

        if ($rowperpage > 0) {
            $records->skip($start)->take($rowperpage);
        }

        $data = $records->get();
        return $data;
    }
    
}
