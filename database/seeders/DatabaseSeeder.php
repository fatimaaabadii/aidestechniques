<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RegionSeeder::class,
            TypeofequipementSeeder::class,
            TypeofcoverageSeeder::class,
            DisabilitieSeeder::class,
            DelegationSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            EquipementSeeder::class,
            BeneficierSeeder::class,
            DemandSeeder::class,
            StockSeeder::class,
        ]);
    }
}
