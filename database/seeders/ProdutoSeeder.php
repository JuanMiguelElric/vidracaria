<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('produto')->insert([
                'nome' => $faker->word,
                'fornecedor' => $faker->numberBetween(1, 20),
                'descricao' => $faker->sentence,
                'categoria' => $faker->word,
                'dataCompra' => $faker->date,
                'qtdProduto' => $faker->numberBetween(1, 100),
                'preco' => $faker->randomFloat(2, 1, 1000),
                'unidadeMedida' => $faker->randomElement(['kg', 'litro', 'unidade']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
