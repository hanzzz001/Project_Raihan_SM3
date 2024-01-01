<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class Userdata extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('123'),
                'level' => 1,
                'email' => 'raihan22ti@mahasiswa.pcr.ac.id',
            ],
            [
                'name' => 'pembeli',
                'username' => 'pembeli',
                'password' => bcrypt('123'),
                'level' => 2,
                'email' => 'mawaddah22ti@mahasiswa.pcr.ac.id',
            ],
           
        ];

        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
