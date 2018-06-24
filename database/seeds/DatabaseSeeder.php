<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('departments')->insert([
            'DepartmentName' => 'CSE',
        ]);
        DB::table('users')->insert([
            'name' => 'Rajob Raihan',
            'email' => 'iammonmoy@gmail.com',
            'password' => bcrypt('512345monmoy'),
            'user_type' => 'Admin',
            'departments_id' => 1
        ]);
    }
}
