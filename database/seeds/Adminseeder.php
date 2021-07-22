<?php

use Illuminate\Database\Seeder;
use App\User;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'f_name' => 'Super',
            'l_name' => 'Admin',
            'mobile_number' => 9876543210,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'is_superadmin' => 1,
        ]);
    }
}
