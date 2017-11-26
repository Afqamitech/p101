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
        DB::table('users')->insert([
            'mobile' => "9028285332",
            'email' => 'aamirkazi47@gmail.com',
            'password' => bcrypt('afqami'),
        ]);
        
        DB::table('user_informations')->insert([
            'user_id' => "1",
            'first_name' => 'super',
            'last_name' => 'admin',
            'city' => 'pune',
            'state' => 'maharashtra',
            'address' => '',
            'activation_code' => '',
            'user_status' => '1',
            'user_type' => '1',
        ]);
    }
}
