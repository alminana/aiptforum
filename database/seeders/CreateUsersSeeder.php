<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inc = 0;
        for ($i=0; $i < 100; $i++) { 
            $inc = $inc+1;
            User::create([
                'name' => 'Abdallah Ibrahim',
                'username' => 'AIPT_Abdallah_Ibrahim'.$inc,
                'gender' => 'male',
                'email' => 'abdallanasr505@gmail.com'.$inc,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'department_id' =>2,
                'manger_id' => null,
                'seniority' => 'manger',
                'img_path' => null,
                'status'=>1,
                'login_status'=>1,
            ]);
        }
       
    }
}
