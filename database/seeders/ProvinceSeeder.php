<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://pro.rajaongkir.com/api/province', [
            'key' => env('RAJAONGKIR_API_KEY')
        ]);

        $data = $response->json();

        foreach ($data['rajaongkir']['results'] as $province) {
            Province::create([
                'id' => $province['province_id'],
                'name' => $province['province']
            ]);
        }
    }
}
