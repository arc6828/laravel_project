<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Position extends Model
{
    protected $table = "positions";
    protected $fillable = ["name","description"];
    protected $primaryKey = 'id';

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
          ->orWhere("description","like","%{$q}%")
          ->get();
    }

    public static function storeItem($item)
    {
        return self::create($item); //RETURN OBJECT
    }

    public static function updateItem($id,$item)
    {
        self::findOrFail($id)->update($item);
    }

    public static function destroyItem($id)
    {
        self::findOrFail($id)->delete();
    }
}
