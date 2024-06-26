<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrcamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('orcamento')->insert([
                'cliente' => $faker->numberBetween(1, 20),
                'produto' => $faker->numberBetween(1, 20),
                'formaPagamento' => $faker->randomElement(['dinheiro', 'cartao']),
                'valor' => $faker->randomFloat(2, 1, 1000),
                'dataPedido' => $faker->date,
                'qtdProduto' => $faker->numberBetween(1, 100),
                'servico' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
