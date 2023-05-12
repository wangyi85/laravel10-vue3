<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\User::factory()->create([
            'name' => 'wang yi',
            'email' => 'jackywang8911@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'william boucher',
            'email' => 'williamboucher9585@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
