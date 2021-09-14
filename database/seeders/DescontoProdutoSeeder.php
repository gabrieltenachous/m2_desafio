<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DescontoProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desconto_produtos')->insert([
            ['desconto_id' => 1, 'produto_id' => 1, 'total' => 90],
        ]);
    }
}
