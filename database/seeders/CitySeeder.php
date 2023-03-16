<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (($open = fopen(storage_path('app/public') . "/cities.csv", "r")) !== FALSE) {
            $counter = 0;
            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                if($counter > 0){
                    City::factory()->create([
                        'name'          => $data[1],
                        'status'        => 'A',
                        'country_id'    => $data[2]
                    ]);
                }
                $counter++;
            }
        }
    }
}
