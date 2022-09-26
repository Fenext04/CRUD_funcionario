<?php

namespace Database\Seeders;
use App\Models\Setor;
use Illuminate\Database\Seeder;

class SetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setores = ["Administrativo", "Escritório", "Estoque", "Vendas"];

        foreach ($setores as $setor){
            Setor::create([
                "nome" => $setor
            ]);
        }
    }
}
