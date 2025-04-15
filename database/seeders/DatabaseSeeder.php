<?php

namespace Database\Seeders;

use App\Models\Contato;
use App\Models\Theme;
use App\Models\User;
use App\Models\Instituto;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Mateus Pereira',
            'email' => 'mhapereira99@gmail.com',
            'password' => 'Mh@P!2$24*',
        ]);

        Theme::factory()->create([
            'primary_color' => '#ddd1cb',
            'secondary_color' => '#352b2c',
            'text_color' => '#1a1a1a',
        ]);

        Contato::factory()->create([
            'telefone' => '(16) 3201 9999',
            'whatsapp' => '(16) 9 9999 9999',
            'email' => 'exemplo@exemplo.com',
        ]);

        Instituto::factory()->create([
            'sobre' => ' ',
            'ata' => [],
            'instituto' => [],
            'docs' => [],
            'financeiro' => [],
        ]);
    }
}
