<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countryList = collect([
            new CountryData('España', 'Madrid', 40.4168, -3.7038),
            new CountryData('España', 'Barcelona', 41.3851, 2.1734),
            new CountryData('Reino Unido', 'Londres', 51.5074, -0.1278),
            new CountryData('Reino Unido', 'Edimburgo', 55.9533, -3.1883),
            new CountryData('Estados Unidos', 'Nueva York', 40.7128, -74.0060),
            new CountryData('Estados Unidos', 'Los Ángeles', 34.0522, -118.2437),
        ]);

        $countryList->each(function (CountryData $countryData) {
            Country::create([
                'country' => $countryData->country,
                'city' => $countryData->city,
                'lat' => $countryData->lat,
                'long' => $countryData->long,
            ]);
        });
    }
}

// create a country class with a constructor with country, city, lat, and long
class CountryData
{
    public function __construct(
        public string $country,
        public string $city,
        public float $lat,
        public float $long
    ) {
    }
}
