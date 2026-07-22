<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organizacao;

class OrganizacaoSeeder extends Seeder
{
    public function run(): void
    {
        $organizacoes = [
            'Credicom',
            'Marcelo Candiotto',
            'Muzzi',
            'outros',
            'Solutti',
        ];

        foreach ($organizacoes as $nome) {
            Organizacao::firstOrCreate([
                'nome' => $nome
            ]);
        }
    }
}
