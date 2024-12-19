<?php

namespace Database\Seeders;

use App\Models\Typeofequipement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeofequipementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1 ; $i < 10 ; $i++)
        {
            $typeodequipement = new Typeofequipement();
            $typeodequipement->label      =   'TypeEquipement'.$i;
            $typeodequipement->save();
        }
    }
}
