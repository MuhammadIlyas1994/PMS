<?php

use Illuminate\Database\Seeder;

class PmanagerData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role= DB::table('roles')->insert([
            'name' => Str::random(10),
        ]);
        $users= DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
            
            ]);
        DB::table('companies')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
           
            ]);
           

    }
}
