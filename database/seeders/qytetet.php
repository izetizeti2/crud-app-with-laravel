<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class qytetet extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('qytetet')->insert([
        ['emri' => 'Prishtina'],   
        ['emri' => 'Mitrovica'],   
        ['emri' => 'Peja'],   
        ['emri' => 'Prizreni'],   
        ['emri' => 'Ferizaji'],   
        ['emri' => 'Gjilani'],   
        ['emri' => 'Gjakova']
        ]);
    }
}
