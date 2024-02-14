<?php

namespace App\Models;
use OwenIt\Auditing\Contracts\Auditable; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class Category extends Model implements Auditable 
{ 
    use \OwenIt\Auditing\Auditable; 

    use HasFactory;
    protected $table='categories';
    protected $guarded=[];

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function subcategory()
    {
        return $this->hasMany(Category::class, 'parent_category_id')->with('subcategory');
    }



    public function get_maincat_code($main_cat_code, $id = '')
    {
        if ($id) {
            $id = Crypt::decrypt($id);
            return $maincat_details = DB::table('categories')
            ->where('parent_category_id',null)

            ->where('category_code', $main_cat_code)->where('id', "!=", $id)->get();
        } else {
            return $maincat_details = DB::table('categories')
            ->where('parent_category_id',null)
            ->where('category_code', $main_cat_code)->get();
        }

    }
    public function get_maincat_name($main_cat_name, $id = '')
    {
        if ($id) {
            $id = Crypt::decrypt($id);
            return $maincat_details = DB::table('categories')
            ->where('parent_category_id',null)
            ->where('category_name', $main_cat_name)->where('id', "!=", $id)->get();
        } else {
            return $maincat_details = DB::table('categories')
            ->where('parent_category_id',null)
            ->where('category_name', $main_cat_name)->get();
        }

    }


    public function get_main_cat_count($value='',$status = '')
    {   
        $count = Category::select('count(*) as allcount')
        ->where('parent_category_id',null)
            ->where(function ($query) use ($value){
                $query->where('category_name', 'like', '%' .$value . '%')
                ->orWhere('category_code', 'like', '%' .$value . '%');
        });
        if($status!='')
        {                    
            $count->where('status','=',$status);
        }
        return $count->count();
    }

    public function get_main_cat_records($columnName,$columnSortOrder,$searchValue,$start,$rowperpage,$status = '')    
    { 
        $records = Category::orderBy($columnName,$columnSortOrder)
        ->where('parent_category_id',null)

            ->where(function ($query) use ($searchValue){
                $query->where('category_name', 'like', '%' .$searchValue . '%')
                    ->orWhere('category_code', 'like', '%' .$searchValue . '%');
                })
            ->select('categories.*');
        if($rowperpage > 0){
            $records->skip($start)->take($rowperpage);
        }
        if($status!='')
        {                    
            $records->where('status','=',$status);
        }
        $data = $records->get();
        return $data;
    }



    public function get_sub_cat_count($value='',$status = '')
    {   
        $count = Category::select('count(*) as allcount')
        ->where('parent_category_id','!=',null)
            ->where(function ($query) use ($value){
                $query->where('category_name', 'like', '%' .$value . '%')
                ->orWhere('category_code', 'like', '%' .$value . '%');
        });
        if($status!='')
        {                    
            $count->where('status','=',$status);
        }
        return $count->count();
    }

    public function get_sub_cat_records($columnName,$columnSortOrder,$searchValue,$start,$rowperpage,$status = '')    
    { 
        $records = Category::orderBy($columnName,$columnSortOrder)
        ->where('categories.parent_category_id','!=',null)
        ->Join('categories as parent_category', 'parent_category.id', '=', 'categories.parent_category_id')
            ->where(function ($query) use ($searchValue){
                $query->where('categories.category_name', 'like', '%' .$searchValue . '%')
                    ->orWhere('categories.category_code', 'like', '%' .$searchValue . '%')
                    ->orWhere('parent_category.category_name', 'like', '%' . $searchValue . '%');
                })
            ->select('categories.*','parent_category.category_name as parent_category_name');
        if($rowperpage > 0){
            $records->skip($start)->take($rowperpage);
        }
        if($status!='')
        {                    
            $records->where('status','=',$status);
        }
        $data = $records->get();
        return $data;
    }

    public function get_subcat_code($sub_cat_code, $id = '')
    {
        if ($id) {
            $id = Crypt::decrypt($id);
            return $maincat_details = DB::table('categories')
            ->where('parent_category_id','!=',null)

            ->where('category_code', $sub_cat_code)->where('id', "!=", $id)->get();
        } else {
            return $maincat_details = DB::table('categories')
            ->where('parent_category_id','!=',null)
            ->where('category_code', $sub_cat_code)->get();
        }

    }
    public function get_subcat_name($sub_cat_name, $id = '')
    {
        if ($id) {
            $id = Crypt::decrypt($id);
            return $maincat_details = DB::table('categories')
            ->where('parent_category_id','!=',null)

            ->where('category_name', $sub_cat_name)->where('id', "!=", $id)->get();
        } else {
            return $maincat_details = DB::table('categories')
            ->where('parent_category_id','!=',null)
            ->where('category_name', $sub_cat_name)->get();
        }

    }

}
