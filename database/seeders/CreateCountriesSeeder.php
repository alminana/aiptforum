<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
class CreateCountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  


        $url = 'https://restcountries.com/v3.1/all';
        //$url = 'https://restcountries.com/v3.1/name/Tunisia';
        //dd($url);
        $response = file_get_contents($url);

        if ($response === false) {
            die('Error fetching data');
        }

        $data = json_decode($response, true);

        if ($data === null) {
            die('Error decoding JSON: ' . json_last_error_msg());
        }

        if (!is_array($data)) {
            die('Unexpected data format. Expected an array.');
        }

        foreach ($data as $country) {
            Country::create([
                'country_name' => $country['name']['common'],
                'code' => $country['cca2'] ?? 'N/A',
                'languages' => implode(', ', array_values($country['languages'] ?? ['N/A'])),
            ]);
        }  

        Country::create([
            'country_name' => 'Yemen Aden',
            'code' => 'YE(Aden)',
            'languages' => 'Arabic',
        ]);

        Country::create([
            'country_name' =>'Tanzania (Zanzibar)',
            'code' => 'TZ(Zanzibar)',
            'languages' => 'English, Swahili',
        ]);
       
    }
}
