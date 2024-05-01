<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
class CreateDepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = ['patents','trademarks','translation'];

        foreach ($departments as $department ) {
            Department::create([
                'department_name' => $department,
            ]);
        }
        
    }
}
