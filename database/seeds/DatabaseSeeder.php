<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $checkAdmin = User::where('role_id',1)->get();
        //dd(count($checkAdmin));
        if(count($checkAdmin)==0) {
            $this->call(AdminSeeder::class);
        }

        /* role seeder call */
    	$getRole = DB::table('roles')->get();
        if($getRole->isEmpty()){
            $this->call(RoleSeeder::class);
    	}
    /* category seeder call */
        $getCategory = DB::table('category')->get();
        if($getCategory->isEmpty()){
            $this->call(CategorySeeder::class);
        }
   	}
}
