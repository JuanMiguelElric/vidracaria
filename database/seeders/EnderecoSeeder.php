<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        

        foreach (range(1, 80) as $index) {
            DB::table('endereco')->insert([
                'rua' => $faker->streetName,
                'numero' => $faker->buildingNumber,
                'estado' => $faker->stateAbbr,
                'cidade' => $faker->city,
                'complemento' => $faker->sentence,
                'cep' => $faker->postcode,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
        }
    }
}
