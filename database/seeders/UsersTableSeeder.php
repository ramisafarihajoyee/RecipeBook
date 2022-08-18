<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Illuminate\Database\Seeders\Eloquent;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'              =>  'Ramisa Fariha Joyee',
            'email'             =>  'ramisa.fariha.joyee@g.bracu.ac.bd',
            'password'          =>  Hash::make('joyee'),
            'remember_token'    =>  str_random(10),
        ]);
    }
}
