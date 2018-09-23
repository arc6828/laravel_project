<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmployeeModel extends Model
{
    public static function select_all(){
        $sql = "SELECT * FROM tb_employee
            INNER JOIN tb_position ON tb_employee.position_id = tb_position.position_id";
        return DB::select($sql , []);
    }

    public static function select_by_id($id){
        $sql = "SELECT * FROM tb_employee
            INNER JOIN tb_position ON tb_employee.position_id = tb_position.position_id
            WHERE employee_id = {$id}";
        return DB::select($sql , []);
    }

    public static function insert($name, $age, $address, $salary, $position_id){
        $sql = "INSERT INTO tb_employee (name,age,address,salary, position_id)
                    VALUES ( '{$name}', {$age}, '{$address}', {$salary}, {$position_id})";
        DB::insert($sql, []); //NO NEED TO RETURN
	}

    public static function update_by_id($name, $age, $address, $salary, $position_id, $id){
        $sql = "UPDATE tb_employee SET
            name = '{$name}',
            age = {$age},
            address =  '{$address}',
            salary =  {$salary},
            position_id =  {$position_id}
            WHERE employee_id = {$id}";
        DB::update($sql, []);
	}
}
