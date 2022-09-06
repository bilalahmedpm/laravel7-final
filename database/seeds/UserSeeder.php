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
        \App\User::create([
            'name' => 'Bilal Ahmad',
            'email' => 'bilalmujahid89@gmail.com',
            'role' => '1',
            'password' => Hash::make('admin123'),
        ]);
        \App\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => '2',
            'password' => Hash::make('12345678'),
        ]);
    }
}
