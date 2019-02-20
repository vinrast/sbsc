<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
      User::create([
        'name'            => 'vincen santaella',
        'email'           => 'vinrast@gmail.com',
        'password'        => Hash::make('secret'),
        'avatar'          => 'image_profile.jpg',
        'department_id'   => 1
      ]);

      DB::table('role_user')->insert([
        'user_id' => 1,
        'role_id' =>1
      ]);
    }
}
