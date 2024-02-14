<?php

namespace App\Models;
use OwenIt\Auditing\Contracts\Auditable; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;


class Role extends Model implements Auditable 
{ 
    use \OwenIt\Auditing\Auditable; 
    use HasFactory;
    // protected $table="api_tokens";
    protected $guarded = [];
    const ROLE_SUPER_ADMIN = 1;
    const ROLE_ADMIN = 2;
    const ROLE_EMPLOYEE = 3;
    public function get_count($searchValue = '', $status = '')
    {
        $count = Role::select('count(*) as allcount')
            ->where(function ($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('description', 'like', '%' . $searchValue . '%');
            });

        // if($status!='')
        // {
        //     $count->where('active_status','=',$status);
        // }
        return $count->count();
    }

    public function get_records($columnName, $columnSortOrder, $searchValue, $start, $rowperpage, $status = '')
    {
        $records = Role::orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('description', 'like', '%' . $searchValue . '%');
            })
            ->select('roles.*');

        if ($rowperpage > 0) {
            $records->skip($start)->take($rowperpage);
        }
        $data = $records->get();
        return $data;
    }
    public function check_role_unique($name, $id = '')
    {
        if ($id) {
            $id = Crypt::decrypt($id);
            return $role_details = DB::table('roles')->where('name', $name)->where('id', "!=", $id)->get();
        } else {
            return $role_details = DB::table('roles')->where('name', $name)->get();
        }

    }

    public function rolePermissions() {
        return $this->hasMany(RolePermission::class);
    }

}
