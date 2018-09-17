<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmployeeModel extends Model
{
    public static function select_all(){
        $sql = "SELECT * FROM tb_employee";
        return DB::select($sql , []);
    }

    public static function select2_all(){
        $sql = "SELECT * FROM tb_employee
            INNER JOIN tb_position ON tb_employee.position_id = tb_position.position_id";
        return DB::select($sql , []);
    }

    public static function select_by_id($id){
        $sql = "SELECT * FROM tb_employee
            WHERE employee_id = {$id}";
        return DB::select($sql , []);
    }

    public static function select2_by_id($id){
        $sql = "SELECT * FROM tb_employee
            INNER JOIN tb_position ON tb_employee.position_id = tb_position.position_id
            WHERE employee_id = {$id}";
        return DB::select($sql , []);
    }
}
