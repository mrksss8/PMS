<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mark Anthony',
            'firstName' => 'Mark',
            'lastName' => 'Bautista',
            'email' => 'anthony.bautista29@yahoo.com',
            'company' => 'Myth Corporation',
            'Role' => 'Programmer',
            'password' =>bcrypt('asdasd123')
        ]);
    }
}
