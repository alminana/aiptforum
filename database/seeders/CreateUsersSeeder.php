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
        for ($i=0; $i < 2; $i++) { 
            $inc = $inc+1;
            User::create([
                'name' => 'AIPT Test',
                'username' => 'AIPT_Test'.$inc,
                'gender' => 'male',
                'email' => 'Test@aiptlaw.com'.$inc,
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
