<?php

namespace App\Models;
use OwenIt\Auditing\Contracts\Auditable; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model implements Auditable 
{ 
    use \OwenIt\Auditing\Auditable; 
    use HasFactory;

    public function get_count($value = '', $status = '')
    {
        $count = Designation::select('count(*) as allcount')->where(function ($query) use ($value) {
            $query->where('designation_code', 'like', '%' . $value . '%')
            ->orWhere('designation_name', 'like', '%' . $value . '%')
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
        $records = Designation::orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query->where('designation_code', 'like', '%' . $searchValue . '%')
                ->orWhere('designation_name', 'like', '%' . $searchValue . '%')
                    ->orWhere(function ($query) use ($searchValue) {
                        // Map boolean values to string representations for searching
                        if (strtolower($searchValue) === 'active') {
                            $query->where('status', 1);
                        } elseif (strtolower($searchValue) === 'inactive') {
                            $query->where('status', 0);
                        }
                    });
            })
            ->select('designations.*');

        if ($status != '') {
            $records->where('designations.status', $status);
        }

        if ($rowperpage > 0) {
            $records->skip($start)->take($rowperpage);
        }

        $data = $records->get();
        return $data;
    }
    
    public function get_designation_name($designation_name, $id = '')
    {
        if ($id) {
            $id = Crypt::decrypt($id);
            return $desig_details = Designation::
            where('designation_name', $designation_name)->where('id', "!=", $id)->get();
        } else {
            return $desig_details = Designation::where('designation_name', $designation_name)->get();
        }

    }
    public function get_designation_code($designation_code, $id = '')
    {
        if ($id) {
            $id = Crypt::decrypt($id);
            return $desig_details = Designation::
            where('designation_code', $designation_code)->where('id', "!=", $id)->get();
        } else {
            return $desig_details = Designation::where('designation_code', $designation_code)->get();
        }

    }
}
