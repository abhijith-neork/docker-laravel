<?php

namespace App\Models;
use OwenIt\Auditing\Contracts\Auditable; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model implements Auditable 
{ 
    use \OwenIt\Auditing\Auditable; 
    use HasFactory;

    public function get_count($value = '', $status = '')
    {
        $count = Technology::select('count(*) as allcount')->where(function ($query) use ($value) {
            $query->where('technology_name', 'like', '%' . $value . '%')
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
        $records = Technology::orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query->where('technology_name', 'like', '%' . $searchValue . '%')
                ->orWhere(function ($query) use ($searchValue) {
                    // Map boolean values to string representations for searching
                    if (strtolower($searchValue) === 'active') {
                        $query->where('status', 1);
                    } elseif (strtolower($searchValue) === 'inactive') {
                        $query->where('status', 0);
                    }
                });
            })
            ->select('technologies.*');

        if ($status != '') {
            $records->where('technologies.status', $status);
        }

        if ($rowperpage > 0) {
            $records->skip($start)->take($rowperpage);
        }

        $data = $records->get();
        return $data;
    }
    
    public function get_technology_name($technology_name, $id = '')
    {
        if ($id) {
            $id = Crypt::decrypt($id);
            return $tech_details = Technology::
            where('technology_name', $technology_name)->where('id', "!=", $id)->get();
        } else {
            return $tech_details = Technology::where('technology_name', $technology_name)->get();
        }

    }
}
