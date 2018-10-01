<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentModel extends Model
{
    public static function select_all(){
        $sql = "SELECT * FROM tb_student";
        return DB::select($sql , []);
    }

    public static function select_by_id($id){
        $sql = "SELECT * FROM tb_student
            WHERE student_id = {$id}";
        return DB::select($sql , []);
    }

    public static function insert($input){
        $sql = "INSERT INTO tb_student (
                    name,
                    hours_per_week,
                    grade
                ) VALUES (
                    '{$input['name']}',
                    '{$input['hours_per_week']}',
                    '{$input['grade']}'
                )";
        DB::insert($sql, []); //NO NEED TO RETURN
	}

    public static function update_by_id($input, $id){
        $sql = "UPDATE tb_student SET
            name =          '{$input['name']}' ,
            hours_per_week = '{$input['hours_per_week']}' ,
            grade =         '{$input['grade']}'
            WHERE student_id = {$id}";
        DB::update($sql, []);
	}

    public static function delete_by_id($id){
        $sql = "DELETE FROM tb_student WHERE student_id = {$id}";
        DB::delete($sql, []);
	}
}
