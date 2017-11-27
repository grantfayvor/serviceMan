<?php

use Illuminate\Database\Seeder;

class MechanicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'id' => 12,
            'first_name' => 'mechanic',
            'last_name' => 'mechanic',
            'username' => 'mechanic',
            'email' => 'fayvorharrison101@gmail.com',
            'password' => '$2y$10$1uaX5Se8JhxV8R1GZhp.AOa.rIaDzdvLQ4At4rOLGk9yPeS7pE3FK',
            'account_type' => 'Mechanic',
            'image_location' => 'profile/grantfayvor.jpg',
            'identification_number' => '23234DFDG34'
        ]]);
        DB::table('mechanics')->insert([[
            'id' => 1,
            'user_id' => 12,
            'status' => 'Ready',
            'location' => 'Uwani Enugu'
        ]]);
    }
}
