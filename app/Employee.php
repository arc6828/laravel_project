<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    protected $table = "employees";

    public static function getAll(){
        return self::get();
    }

    public static function getItem($id){
        //SIMILAR TO, BUT DIFFERENT A LITTLE BIT
        //return self::where('id',$id)->get($id);
        return self::findOrFail($id);
    }

    public static function search($q){
        return self::where("name","like","%{$q}%")
          ->orWhere("name","like","%{$q}%")
          ->orWhere("age","like","%{$q}%")
          ->orWhere("address","like","%{$q}%")
          ->orWhere("salary","like","%{$q}%")
          ->get();
    }







    //OLD VERSION

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

    public static function delete_by_id($id){
        $sql = "DELETE FROM tb_employee WHERE employee_id = {$id}";
        DB::delete($sql, []);
	}
}
