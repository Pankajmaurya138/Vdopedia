<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "admin",
            'age'=>'20',
            'sex'=>'male',
            'mobile'=>'9876543210',
            'email' => "info@admin.com",
            'role_id' => "1",
            'password' => Hash::make('12345678'),
            'status' => "active",
        ]);
    }
}
