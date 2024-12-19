<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1 ; $i < 10 ; $i++)
        {
            $stock = new Stock();
            $stock->equipement_id  =   rand(1, 9);
            $stock->delegation_id  =   rand(1, 9);
            $stock->quantity      =   '10'.$i;            
            $stock->save();
    }
}
}
