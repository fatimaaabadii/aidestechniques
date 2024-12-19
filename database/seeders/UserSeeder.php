<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Role;
use Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->name             =   'Admin directeur';
        $admin->email            =   'supperadmin@test.com';
        $admin->phone            =   '06 00 00 00 00';
        $admin->ordinal_number   =   'XX00000';
        $admin->password         =   hash::make('password');
        $admin->save();

        $adminRole = new RoleUser;
        $adminRole->user_id = $admin->id;
        $adminRole->role_id =   Role::where('role', '=','Directeur')->first()->id;
        $adminRole->save();


        $technicien = new User();
        $technicien->name             =   'Service technique';
        $technicien->email            =   'servicetechnique@test.com';
        $technicien->phone            =   '06 00 00 00 00';
        $technicien->ordinal_number   =   'XX00001';
        $technicien->password         =   hash::make('password');
        $technicien->save();

        $technicienRole = new RoleUser;
        $technicienRole->user_id = $technicien->id;
        $technicienRole->role_id =   Role::where('role', '=','Technicien')->first()->id;
        $technicienRole->save();


        $coordinateur = new User();
        $coordinateur->name             =   'Coordinateur régional';
        $coordinateur->email            =   'coordinateur@test.com';
        $coordinateur->phone            =   '06 00 00 00 00';
        $coordinateur->ordinal_number   =   'XX00002';
        $coordinateur->password         =   hash::make('password');
        $coordinateur->save();


        $delegate = new User();
        $delegate->name             =   'délégué';
        $delegate->email            =   'delegate@test.com';
        $delegate->phone            =   '06 00 00 00 00';
        $delegate->ordinal_number   =   'XX00003';
        $delegate->password         =   hash::make('password');
        $delegate->save();


        $delegateRole = new RoleUser;
        $delegateRole->user_id = $delegate->id;
        $delegateRole->role_id =   Role::where('role', '=','délégué')->first()->id;
        $delegateRole->delegation_id =   1;
        $delegateRole->save();

        $coaph = new User();
        $coaph->name             =   'coaph';
        $coaph->email            =   'coaph@test.com';
        $coaph->phone            =   '06 00 00 00 00';
        $coaph->ordinal_number   =   'XX00004';
        $coaph->password         =   hash::make('password');
        $coaph->save();


        $coaphRole = new RoleUser;
        $coaphRole->user_id = $coaph->id;
        $coaphRole->role_id =   Role::where('role', '=','Coaph')->first()->id;
        $coaphRole->delegation_id =   1;
        $coaphRole->save();

    }
}
