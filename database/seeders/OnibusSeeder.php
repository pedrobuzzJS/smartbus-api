<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Onibus;
use Illuminate\Database\Seeder;

class OnibusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Onibus::create([
            'nome' => 'Onibus 2',
            'marca' => 'Marcopolo',
            'ano' => '2015',
            'user_id' => 1,
            'ativo' => 1,
            'latitude' => '-27.238556',
            'longitude' => '-49.676167'
        ]);
        Onibus::create([
            'nome' => 'Onibus 2',
            'marca' => 'Mercedes',
            'ano' => '2017',
            'user_id' => 2,
            'ativo' => 1,
            'latitude' => '-27.222194',
            'longitude' => '-49.648583'
        ]);
        Onibus::create([
            'nome' => 'Onibus 3',
            'marca' => 'Porshe',
            'ano' => '2016',
            'user_id' => 3,
            'ativo' => 1,
            'latitude' => '-27.206333',
            'longitude' => '-49.629833'
        ]);
    }
}
