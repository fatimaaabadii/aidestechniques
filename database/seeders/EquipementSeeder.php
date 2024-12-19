<?php

namespace Database\Seeders;

use App\Models\Equipement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1 ; $i < 10 ; $i++)
        {
            $equipement = new Equipement();
            $equipement->type_id  =   rand(1, 9);
            $equipement->label      =   'Delegation '.$i;
            $equipement->barcode     =   'XXXXXXXXXXXXXXXX'.$i;
            
            $equipement->save();
    }
}
}
