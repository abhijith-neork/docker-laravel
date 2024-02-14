<?php

namespace App\Models;
use OwenIt\Auditing\Contracts\Auditable; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Notification extends Model implements Auditable 
{ 
    use \OwenIt\Auditing\Auditable; 
    use HasFactory;
    use SoftDeletes;
    protected $table = 'notifications';
    protected $guarded = [];

    public function get_notification_records($columnName,$columnSortOrder,$searchValue,$start,$rowperpage,$status = '')    

    {
        $records = Notification::orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query->where('title', 'like', '%' . $searchValue . '%')
                    ->orWhere('description', 'like', '%' . $searchValue . '%')
                    ->orWhere('date', 'like', '%' . $searchValue . '%');
            })->orderBy('id', 'desc');

      
        if ($rowperpage > 0) {
            $records->skip($start)->take($rowperpage);
        }
        $data = $records->get();
        return $data;

    }

    public function get_notification_count($searchValue='',$status ='')
    {   
        $count = Notification::select('count(*) as allcount')->where(function ($query) use ($searchValue){
                $query->where('title', 'like', '%' .$searchValue . '%')
                ->orWhere('description', 'like', '%' .$searchValue . '%')
                ->orWhere('date', 'like', '%' .$searchValue . '%');
            });

        if($status!='')
        {                    
            $count->where('status','=',$status);
        }
        return $count->count();
    }
}
