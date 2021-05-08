<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => "1",
            'role'=>'admin',
            'role_title'=>'admin user',
        ]);

        DB::table('roles')->insert([
            'id' => "2",
            'role'=>'user',
            'role_title'=>'user',
        ]);
    }
}
