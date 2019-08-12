<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    protected $table = "employees";
    protected $guarded = [];

    public static function getAll()
    {
        return self::get();
    }

    public static function getItem($id)
    {
        return self::findOrFail($id);
    }

    public static function search($q)
    {
        return self::where("name","like","%{$q}%")
          ->orWhere("age","like","%{$q}%")
          ->orWhere("address","like","%{$q}%")
          ->orWhere("salary","like","%{$q}%")
          ->get();
    }

    public static function storeItem($item)
    {
        //RETURN A NEW RECORD OBJECT
        //return DB::table('employees')->insertGetId($item); //RETURN ID
        return self::create($item); //RETURN OBJECT
    }

    public static function updateItem($id,$item)
    {
        //DB::table('employees')->where('id',$id)->update($item); 
        self::findOrFail($id)->update($item);
    }

    public static function destroyItem($id)
    {
        //DB::table('employees')->where('id',$id)->delete(); 
        //self::destroy($id);
        self::findOrFail($id)->delete();
    }
}
