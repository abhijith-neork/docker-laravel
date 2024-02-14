<?php

namespace App\Models;
use OwenIt\Auditing\Contracts\Auditable; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model implements Auditable 
{ 
    use \OwenIt\Auditing\Auditable; 
    use HasFactory;

    public function get_count($value = '', $status = '')
    {
        $count = LeaveType::select('count(*) as allcount')->where(function ($query) use ($value) {
            $query->where('leave_type_code', 'like', '%' . $value . '%')
            ->orWhere('leave_type_name', 'like', '%' . $value . '%')
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
        $records = LeaveType::orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query->where('leave_type_code', 'like', '%' . $searchValue . '%')
                ->orWhere('leave_type_name', 'like', '%' . $searchValue . '%')
                ->orWhere(function ($query) use ($searchValue) {
                    // Map boolean values to string representations for searching
                    if (strtolower($searchValue) === 'active') {
                        $query->where('status', 1);
                    } elseif (strtolower($searchValue) === 'inactive') {
                        $query->where('status', 0);
                    }
                });
            })
            ->select('leave_types.*');

        if ($status != '') {
            $records->where('leave_types.status', $status);
        }

        if ($rowperpage > 0) {
            $records->skip($start)->take($rowperpage);
        }

        $data = $records->get();
        return $data;
    }
    
    public function get_leave_type_name($leave_type_name, $id = '')
    {
        if ($id) {
            $id = Crypt::decrypt($id);
            return $desig_details = LeaveType::
            where('leave_type_name', $leave_type_name)->where('id', "!=", $id)->get();
        } else {
            return $desig_details = LeaveType::where('leave_type_name', $leave_type_name)->get();
        }

    }
    public function get_leave_type_code($leave_type_code, $id = '')
    {
        if ($id) {
            $id = Crypt::decrypt($id);
            return $desig_details = LeaveType::
            where('leave_type_code', $leave_type_code)->where('id', "!=", $id)->get();
        } else {
            return $desig_details = LeaveType::where('leave_type_code', $leave_type_code)->get();
        }

    }
}
