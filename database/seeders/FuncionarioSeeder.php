<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('funcionario')->insert([
                'nome' => $faker->name,
                'dataNascimento' => $faker->date,
                'cpf' => $faker->unique()->numerify('###########'),
                'endereco' => $faker->numberBetween(1, 20),
                'telefone' => $faker->phoneNumber,
                'email' => $faker->email,
                'funcao' => $faker->jobTitle,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
