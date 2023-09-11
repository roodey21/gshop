<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://pro.rajaongkir.com/api/city', [
            'key' => env('RAJAONGKIR_API_KEY')
        ]);

        $data = $response->json();

        foreach ($data['rajaongkir']['results'] as $city) {
            City::create([
                'id' => $city['city_id'],
                'province_id' => $city['province_id'],
                'name' => $city['city_name'],
                'type' => $city['type'],
                'postal_code' => $city['postal_code'],
            ]);
        }
    }
}
