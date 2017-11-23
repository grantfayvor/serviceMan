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
        // DB::table('users')->insert([[
        //     'id' => 6,
        //     'first_name' => 'admin',
        //     'last_name' => 'admin',
        //     'username' => 'admin',
        //     'email' => 'admin@example.com',
        //     'password' => '$2y$10$1uaX5Se8JhxV8R1GZhp.AOa.rIaDzdvLQ4At4rOLGk9yPeS7pE3FK',
        //     'account_type' => 'Admin',
        //     'image_location' => '',
        //     'identification_number' => '2343435DFDD'
        // ]]);
        DB::table('users')->insert([[
            'id' => 7,
            'first_name' => 'mechanic',
            'last_name' => 'mechanic',
            'username' => 'mechanic',
            'email' => 'grantfayvor101@yahoo.com',
            'password' => '$2y$10$1uaX5Se8JhxV8R1GZhp.AOa.rIaDzdvLQ4At4rOLGk9yPeS7pE3FK',
            'account_type' => 'Mechanic',
            'image_location' => '',
            'identification_number' => '23234DFDG34'
        ]]);
        DB::table('mechanics')->insert([[
            'id' => 1,
            'user_id' => 7,
            'status' => 'Ready'
        ]]);
    }
}
