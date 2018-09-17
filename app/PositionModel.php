<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PositionModel extends Model
{
    public static function select_all(){
        $sql = "SELECT * FROM tb_position";
        return DB::select($sql , []);
    }

    public static function select_by_id($id){
        $sql = "SELECT * FROM tb_position
            WHERE position_id = {$id}";
        return DB::select($sql , []);
    }
}
