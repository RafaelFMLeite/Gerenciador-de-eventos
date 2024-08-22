<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Convidado;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        {
            // Cria um usuário com 5 convidados associados
            Usuario::factory()
                ->hasConvidados(5) // Cria 5 convidados para cada usuário
                ->create();
    
            // Se quiser criar vários usuários, você pode usar o seguinte:
            Usuario::factory()
                ->hasConvidados(3) // Cada usuário terá 3 convidados
                ->count(10) // Cria 10 usuários
                ->create();
        }
    }
}
