<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    protected $db_name = '';
    protected $user = '';
    protected $pass = '';
    protected $version = "2019-04-09";

    public function run()
    {
      Eloquent::unguard();
      $this->db_name     = \Config::get('database.connections.mysql.database');
      $this->user   = \Config::get('database.connections.mysql.username');
      $this->pass   = \Config::get('database.connections.mysql.password');

      //$this->seedStudent();

      $this->seedUsers();
      $this->seedDistrict();
    }

    public function seedUsers()
    {
      // $this->call(UsersTableSeeder::class);
      $path = 'sql/data-'.$this->version.'/'.$this->db_name.'_table_users.sql';
      DB::unprepared(file_get_contents($path));
      $this->command->info('User table seeded!');
    }

    public function seedStudent()
    {
      // $this->call(UsersTableSeeder::class);
      $path = 'sql/data-'.$this->version.'/'.$this->db_name.'_table_tb_student.sql';
      DB::unprepared(file_get_contents($path));
      $this->command->info('Student table seeded!');
    }

    public function seedDistrict()
    {
      // $this->call(UsersTableSeeder::class);
      $path = 'sql/data-'.$this->version.'/'.$this->db_name.'_table_districts.sql';


      // =============================================================
        // file Path -> Project/app/configs/database.php
        // get the database name, database username, database password
        // =============================================================
        //$db     = \Config::get('database.connections.mysql.database');
        //$user   = \Config::get('database.connections.mysql.username');
        //$pass   = \Config::get('database.connections.mysql.password');

        // $this->command->info($db);
        // $this->command->info($user);
        // $this->command->info($pass);

        // running command line import in php code
        exec("mysql -u " . $this->user . " -p" . $this->pass . " " . $this->db_name . " < ".$path);
        // postal_codes.sql is inside root folder

        //DB::unprepared(file_get_contents($path));
        $this->command->info('District table seeded!');
    }


}
