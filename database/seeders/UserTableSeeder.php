<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=new User;
        $user->name = "John Doe";
        $user->email = "John@gmail.com";
        $user->password = bcrypt("password");
        $user->save();

        $user=new User;
        $user->name = "cam Doe";
        $user->email = "cam@gmail.com";
        $user->password = bcrypt("password");
        $user->save();
    }
}
