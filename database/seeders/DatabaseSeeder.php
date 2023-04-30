<?php

namespace Database\Seeders;

use App\Models\GroupType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'admin',
            'password' => Hash::make('123')
        ]);


        GroupType::updateOrCreate([
            'name' => 'normal',
        ], [
            'price' => 80,
            'days_num' => 2
        ]);

        GroupType::updateOrCreate([
            'name' => 'dense',
        ], [
            'price' => 120,
            'days_num' => 4
        ]);

        GroupType::updateOrCreate([
            'name' => 'all week',
        ], [
            'price' => 200,
            'days_num' => 6
        ]);


        $this->call([
            QuraanSeeder::class,
            TgweedSeeder::class,
            QaidaNooraniahSeeder::class,
            PermissionSeeder::class
        ]);
    }
}
