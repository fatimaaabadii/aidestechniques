<?php

namespace Database\Seeders;

use App\Models\Demand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1 ; $i < 10 ; $i++)
        {
            $demand = new Demand();
            $demand->delegation_id  =   rand(1, 10);
            $demand->beneficier_id  =   rand(1, 10);
            $demand->equipement_id =   rand(1, 9);
            $demand->save();
        }
    }
}
