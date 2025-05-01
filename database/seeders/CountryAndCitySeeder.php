<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CountryAndCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Load the file from storage/app/public
        $json = Storage::disk('public')->get('CountriesAndCities.json');
        $countries = json_decode($json, true);

        DB::disableQueryLog();

        foreach ($countries as $countryData) {
            $countryId = DB::table('countries')->insertGetId([
                'name' => $countryData['name'],
                'code' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $cities = [];
            foreach ($countryData['cities'] as $cityName) {
                $cities[] = [
                    'country_id' => $countryId,
                    'name' => $cityName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // ✅ Insert cities in chunks of 500 to avoid "too many placeholders" error
            foreach (array_chunk($cities, 500) as $chunk) {
                DB::table('cities')->insert($chunk);
            }
        }
    }
}
