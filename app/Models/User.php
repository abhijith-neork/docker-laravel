<?php

namespace App\Models;
use OwenIt\Auditing\Contracts\Auditable; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements Auditable 
{ 
    use \OwenIt\Auditing\Auditable; 
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
        'mobile',
        'status',
        'profile_image',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function check_email_unique($email, $id = '')
    {
        if ($id) {
            $id = Crypt::decrypt($id);
            return $user_details = DB::table('users')->where('email', $email)->where('id', "!=", $id)->get();
        } else {
            return $user_details = DB::table('users')->where('email', $email)->get();
        }
    }

    public function get_count($value = '', $status = '')
    {
        $count = User::select('count(*) as allcount')->where(function ($query) use ($value) {
            $query->where('name', 'like', '%' . $value . '%')
                ->orWhere('email', 'like', '%' . $value . '%');
        });

        if ($status != '') {
            $count->where('status', '=', $status);
        }
        return $count->count();
    }

    public function get_records($columnName, $columnSortOrder, $searchValue, $start, $rowperpage, $status = '')
    {
        $records = User::with('role') // Eager load the role relationship
            ->orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhereHas('role', function ($query) use ($searchValue) {
                        $query->where('name', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere('email', 'like', '%' . $searchValue . '%')
                    ->orWhere(function ($query) use ($searchValue) {
                        // Map boolean values to string representations for searching
                        if (strtolower($searchValue) === 'active') {
                            $query->where('status', true);
                        } elseif (strtolower($searchValue) === 'inactive') {
                            $query->where('status', false);
                        }
                    });
            })
            ->select('users.*', DB::raw('(SELECT name FROM roles WHERE users.role_id = roles.id) as role'));

        if ($status != '') {
            $records->where('users.status', $status);
        }

        if ($rowperpage > 0) {
            $records->skip($start)->take($rowperpage);
        }

        $data = $records->get();
        return $data;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
