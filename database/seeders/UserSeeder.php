<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin1 = User::create([
            'fname'   => 'rokaya',
            'lname'   => 'kobish',
            'email'   => 'admin@admin.com',
            'phone'   => '0989856985',
            'address' => 'street21',
            'city'    => 'Lattakia',
            'password'=>  Hash::make('12345678'),
            'is_admin'=>  1
        ]);

        $user1 = User::create([
            'fname'   => 'ali',
            'lname'   => 'kobish',
            'email'   => 'ali@gmail.com',
            'phone'   => '0989444985',
            'address' => 'street99',
            'city'    => 'Damuscs',
            'password'=>  Hash::make('12345678'),
        ]);

        $user2 = User::create([
            'fname'   => 'Sana',
            'lname'   => 'kobish',
            'email'   => 'sana@gmail.com',
            'phone'   => '0978956523',
            'address' => 'street102',
            'city'    => 'latakia',
            'password'=>  Hash::make('12345678'),
        ]);

        $user3 = User::create([
            'fname'   => 'ahmad',
            'lname'   => 'mazen',
            'email'   => 'ahmad@gmail.com',
            'phone'   => '0978451254',
            'address' => 'street9',
            'city'    => 'Homs',
            'password'=> Hash::make('12345678'),
        ]);

        $user4 = User::create([
            'fname'   => 'mohamad',
            'lname'   => 'mohamad',
            'email'   => 'mohamad@gmail.com',
            'phone'   => '0985632532',
            'address' => 'building10',
            'city'    => 'Aleppo',
            'password'=>  Hash::make('12345678'),
        ]);
    }
}
