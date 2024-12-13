<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData=[
            [
                'name'=>'Admin',
                'email'=>'Admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('admin')
            ],
            [
                'name'=>'Indrawan',
                'email'=>'Indrawan@gmail.com',
                'role'=>'dokter',
                'password'=>bcrypt('indra')
            ],
            [
                'name'=>'Soegiman',
                'email'=>'Soegiman@gmail.com',
                'role'=>'pasien',
                'password'=>bcrypt('soegiman')
            ]
        ];
        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
