<?php

use Illuminate\Database\Seeder;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Bilal Ahmad',
            'email' => 'bilalmujahid89@gmail.com',
            'role' => '1',
            'password' => Hash::make('admin123'),
        ]);
        User::create([
            'name' => 'farzana',
            'email' => 'ifarzana24@gmail.com',
            'role' => '2',
            'password' => Hash::make('user1234'),
        ]);
    }
}
