<?php

namespace Database\Seeders;

use App\Models\Loginstatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoginstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {       
            $status = new Loginstatus();
            $status->name  =   'Login';
            $status->save();

            $status1 = new Loginstatus();
            $status1->name  =   'Logout';
            $status1->save();
    
    
    }
}
