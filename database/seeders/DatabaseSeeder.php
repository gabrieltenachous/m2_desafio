<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        $this->call(CampanhaSeeder::class);
        $this->call(GrupoCidadeSeeder::class);
        $this->call(CidadeSeeder::class);
        $this->call(ProdutoSeeder::class);
        $this->call(DescontoSeeder::class);
        $this->call(DescontoProdutoSeeder::class);
    }
}
