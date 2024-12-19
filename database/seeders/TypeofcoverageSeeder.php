<?php

namespace Database\Seeders;

use App\Models\Typeofcoverage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeofcoverageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1 ; $i < 10 ; $i++)
        {
            $typeofcoverage = new Typeofcoverage();

            $typeofcoverage->label      =   'Coverage'.$i;

            $typeofcoverage->deleted_id  =   rand(1, 10);

            $typeofcoverage->save();
        }
    }
}
