<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Province;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $user = User::firstOrCreate([
            'email' => 'admin@admin.com'
        ],
        [
            'name' => 'Admin Toko',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
        ]);

        $role_admin = Role::firstOrCreate(['name' => 'admin']);
        $user->assignRole($role_admin);
        Category::factory(20)->create();
        Product::factory(50)->create();
        $this->call([
            SiteSettingSeeder::class,
            RoleUserSeeder::class,
            CourierSeeder::class,
            ProvinceSeeder::class,
        ]);
    }
}
