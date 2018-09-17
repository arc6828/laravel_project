<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomerModel extends Model
{

    public static function select_all(){
        $sql = "SELECT * from tb_customer";
        return DB::select($sql , []);
    }

}
