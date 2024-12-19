<?php

namespace Database\Seeders;

use App\Models\Beneficier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeneficierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1 ; $i < 10 ; $i++)
        {
            $beneficier = new Beneficier();
            $beneficier->name      =   'Beneficier '.$i;
            $beneficier->cin      =   'XB00000 '.$i;
            $beneficier->address      =   'Casablanca Nr '.$i;
            $beneficier->email      =   'Benificier '.$i.'@gmail.com';
            $beneficier->phone      =   '060000000 '.$i;   
            $beneficier->type_health_coverage  =   rand(1, 10);
            $beneficier->delegation_id  =   rand(1, 10);
            $beneficier->disabilitie_id  =   rand(1, 10);
            $beneficier->equipement_id =   rand(1, 9);
            $beneficier->save();
        }
    }
}
