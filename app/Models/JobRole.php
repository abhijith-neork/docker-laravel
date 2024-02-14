<?php

namespace App\Models;
use OwenIt\Auditing\Contracts\Auditable; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRole extends Model implements Auditable 
{ 
    use \OwenIt\Auditing\Auditable; 
    use HasFactory;

    public function get_count($value = '', $status = '')
    {
        $count = JobRole::select('count(*) as allcount')->where(function ($query) use ($value) {
            $query->where('job_role_name', 'like', '%' . $value . '%')
            ->orWhere(function ($query) use ($value) {
                // Map boolean values to string representations for searching
                if (strtolower($value) === 'active') {
                    $query->where('status', 1);
                } elseif (strtolower($value) === 'inactive') {
                    $query->where('status', 0);
                }
            });
        });
        return $count->count();
    }

    public function get_records($columnName, $columnSortOrder, $searchValue, $start, $rowperpage, $status = '')
    {
        $records = JobRole::orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query->where('job_role_name', 'like', '%' . $searchValue . '%')
                ->orWhere(function ($query) use ($searchValue) {
                    // Map boolean values to string representations for searching
                    if (strtolower($searchValue) === 'active') {
                        $query->where('status', 1);
                    } elseif (strtolower($searchValue) === 'inactive') {
                        $query->where('status', 0);
                    }
                });
            })
            ->select('job_roles.*');

        if ($status != '') {
            $records->where('job_roles.status', $status);
        }

        if ($rowperpage > 0) {
            $records->skip($start)->take($rowperpage);
        }

        $data = $records->get();
        return $data;
    }
    
    public function get_job_role_name($job_role_name, $id = '')
    {
        if ($id) {
            $id = Crypt::decrypt($id);
            return $tech_details = JobRole::
            where('job_role_name', $job_role_name)->where('id', "!=", $id)->get();
        } else {
            return $tech_details = JobRole::where('job_role_name', $job_role_name)->get();
        }

    }
}
