<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (($open = fopen(storage_path('app/public') . "/country.csv", "r")) !== FALSE) {
            $counter = 0;
            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                if($counter > 0){
                    Country::factory()->create([
                        'name'      => $data[1],
                        'code'      => $data[2],
                        'status'    => 'A'
                    ]);
                }
                $counter++;
            }
        }
    }
}
