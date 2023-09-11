<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'name' => 'ARSENIK',
            'tel' => '089504957223',
            'email' => 'gerabaharsenik@gmail.com',
            'address' => 'Kulon Progo, Yogyakarta',
        ]);
    }
}
