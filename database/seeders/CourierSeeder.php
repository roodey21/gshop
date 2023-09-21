<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $couriers = [
            ['Ambil di Toko', 'ADT'],
            ['POS Indonesia', 'POS'],
            ['Lion Parcel', 'LION'],
            ['Ninja Xpress', 'NINJA'],
            ['ID Express', 'IDE'],
            ['SiCepat Express', 'SICEPAT'],
            ['SAP Express', 'SAP'],
            ['Nusantara Card Semesta', 'NCS'],
            ['AnterAja', 'ANTERAJA'],
            ['Royal Express Indonesia', 'REX'],
            ['JTL Express', 'JTL'],
            ['Sentral Cargo', 'SENTRAL'],
            ['Jalur Nugraha Ekakurir', 'JNE'],
            ['Citra Van Titipan Kilat', 'TIKI'],
            ['RPX Holding', 'RPX'],
            ['Pandu Logistics', 'PANDU'],
            ['Wahana Prestasi Logistik', 'WAHANA'],
            ['J&T Express', 'JNT'],
            ['Pahala Kencana Express', 'PAHALA'],
            ['Solusi Ekspres', 'SLIS'],
            ['Expedito*', 'EXPEDITO'],
            ['Rayspeed*', 'RAY'],
            ['21 Express', 'DSE'],
            ['First Logistics', 'FIRST'],
            ['Star Cargo', 'STAR'],
            ['IDL Cargo', 'IDL']
        ];

        foreach ($couriers as $courier) {
            \App\Models\Courier::create([
                'name' => $courier[0],
                'code' => strtolower($courier[1]),
                'status' => true,
            ]);
        }
    }
}
