<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
          'admin'   => 1,
          'name'    => 'Moustafa',
          'email'   => 'moustafa_inf@yahoo.com',
          'password'=> bcrypt('moufci'),
          'avatar'  => 'uploads/avatars/avatar.png',
        ]);

        App\User::create([
          'admin'   => 0,
          'name'    => 'Ali',
          'email'   => 'ali@yahoo.com',
          'password'=> bcrypt('123456'),
          'avatar'  => 'uploads/avatars/avatar.png',
        ]);


        App\User::create([
          'admin'   => 0,
          'name'    => 'ahmed',
          'email'   => 'ahmed@yahoo.com',
          'password'=> bcrypt('123456'),
          'avatar'  => 'uploads/avatars/avatar.png',
        ]);
    }
}
