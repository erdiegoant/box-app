<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countryList = collect([
            new CountryData('Venezuela', 'Caracas', 4.60971, -66.87919),
            new CountryData('Colombia', 'Bogota', 10.48801, -74.08175),
            new CountryData('Chile', 'Santiago', -33.44889, -70.66927),
            new CountryData('Ecuador', 'Quito', -0.22016, -78.51233),
            new CountryData('Bolivia', 'La Paz (administrativa)', -16.49427, -68.14712),
            new CountryData('Argentina', 'Buenos Aires', -34.61315, -58.37723),
            new CountryData('Estados Unidos', 'Washington D.C.', 38.89511, -77.03637),
            new CountryData('Canadá', 'Ottawa', 45.41117, -75.69812),
            new CountryData('España', 'Madrid', 40.4167, -3.70327),
            new CountryData('Francia', 'París', 48.8567, 2.3510),
            new CountryData('Haití', 'Puerto Príncipe', 18.53917, -72.335),
            new CountryData('Cuba', 'La Habana', 23.13194, -82.36416),
            new CountryData('Turquía', 'Ankara', 39.92077, 32.85411),
            new CountryData('Emiratos Árabes Unidos', 'Abu Dhabi', 24.46667, 54.36667),
            new CountryData('Albania', 'Tirana', 41.33165, 19.8318),
            new CountryData('Islandia', 'Reykjavik', 64.13548, -21.89541),
            new CountryData('Ucrania', 'Kiev', 50.45466, 30.5238),
            new CountryData('Alemania', 'Berlín', 52.52437, 13.41053),
            new CountryData('Sudáfrica', 'Pretoria', -25.74486, 28.18783),
            new CountryData('Egipto', 'El Cairo', 30.06263, 31.24967),
            new CountryData('Guatemala', 'Ciudad de Guatemala', 14.64072, -90.51327),
            new CountryData('Canarias', 'Santa Cruz de Tenerife', 28.46824, -16.25462),
            new CountryData('Puerto Rico', 'San Juan', 18.46633, -66.10572),
            new CountryData('México', 'Ciudad de México', 19.4326, -99.1332),
            new CountryData('Brasil', 'Brasilia', -15.77972, -47.92972),
            new CountryData('Perú', 'Lima', -12.04637, -77.04279),
            new CountryData('Italia', 'Roma', 41.90278, 12.49636),
            new CountryData('Grecia', 'Atenas', 37.98381, 23.72754),
            new CountryData('Rusia', 'Moscú', 55.75583, 37.61778),
            new CountryData('China', 'Pekín', 39.9042, 116.4074),
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
