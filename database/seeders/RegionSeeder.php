<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::insert([
            [ "label"       =>  'Tanger-Tétouan-Al Hoceïma'],
            [ "label"   	=>  "L'Oriental"],
            [ "label"   	=>  "Fès-Meknès"],
            [ "label"   	=>  "Rabat-Salé-Kénitra"],
            [ "label"   	=>  "Béni Mellal-Khénifra"],
            [ "label"   	=>  "Casablanca-Settat"],
            [ "label"   	=>  "Marrakech-Safi"],
            [ "label"   	=>  "Drâa-Tafilalet"],
            [ "label"   	=>  "Souss-Massa"],
            [ "label"   	=>  "Guelmim-Oued Noun"],
            [ "label"   	=>  "Laâyoune-Sakia El Hamra"],
            [ "label"   	=>  "Dakhla-Oued Ed-Dahab"],
        ]);
    }
}
