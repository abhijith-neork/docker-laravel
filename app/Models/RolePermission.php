<?php

namespace App\Models;
use OwenIt\Auditing\Contracts\Auditable; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model implements Auditable 
{ 
    use \OwenIt\Auditing\Auditable; 
    use HasFactory;
    protected $table="role_permissions";
    protected $guarded = [];

    // public $timestamps = false;


    
}
