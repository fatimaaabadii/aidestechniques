<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Delegation;

class DelegationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for($i=1 ; $i < 82 ; $i++)
        // {
        //     $delegation = new Delegation;
        //     $delegation->region_id  =   rand(1, 12);
        //     $delegation->label      =   'Delegation '.$i;
        //     $delegation->adress     =   'Adress '.$i;
        //     $delegation->email      =   'delegation'.$i.'@email.com';
        //     $delegation->phone_1    =   '06 00 00 00 '.$i;
        //     $delegation->phone_2    =   '06 00 00 00 '.$i;
        //     $delegation->fix        =   '06 00 00 00 '.$i;
        //     $delegation->save();
        // }

        
    }
}
