<?php

namespace Database\Seeders;

use App\Models\Disabilitie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisabilitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1 ; $i < 10 ; $i++)
        {
            $disabilitie = new Disabilitie();
            $disabilitie->label      =   'Disabilitie '.$i;

            $disabilitie->delegation_id  =   rand(1, 9);
            $disabilitie->save();
        }
    }
}
