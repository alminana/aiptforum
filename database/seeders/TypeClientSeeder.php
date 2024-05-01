<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeClient;
use App\Models\Associate;

class TypeClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $TypeClients = ['corporats','individuals','states','others'];

        foreach ($TypeClients as $TypeClient ) {
            TypeClient::create([
                'type_client_name' => $TypeClient,
            ]);
        }

        Associate::create([
            'associate_name'=>'system',
            'img_path'=>null,
            'country_id'=>5,
            'added_by' => 2,
            ]);
    }
}
