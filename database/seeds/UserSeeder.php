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
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=> Hash::make('123456789'),
            'role'=>'admin',
        ]);

    }
}
