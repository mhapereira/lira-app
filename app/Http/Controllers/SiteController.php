<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use App\Models\Contato;
use App\Models\Evento;
use App\Models\Galeria;
use App\Models\Instituto;
use App\Models\Theme;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        // Recupera todas as galerias do banco de dados
        $comunicados = Comunicado::where('status', 'ativo')->get();
        $eventos = Evento::where('status', 'ativo')->get();
        $galeria = Galeria::where('status', 'ativo')->get();
        $contatos = Contato::find(1);
        $instituto = Instituto::find(1);
        $theme = Theme::find(1);

        // Retorna a view 'welcome' com as galerias
        return view('welcome', ['theme' => $theme, 'comunicados' => $comunicados, 'eventos' => $eventos, 'galeria' => $galeria, 'instituto' => $instituto, 'contatos' => $contatos]);
    }

    public function instituicao()
    {
        // Recupera todas as galerias do banco de dados
        $comunicados = Comunicado::where('status', 'ativo')->get();
        $eventos = Evento::where('status', 'ativo')->get();
        $galeria = Galeria::where('status', 'ativo')->get();
        $contatos = Contato::find(1);
        $instituto = Instituto::find(1);

        // Retorna a view 'welcome' com as galerias
        return view('instituto', ['comunicados' => $comunicados, 'eventos' => $eventos, 'galeria' => $galeria, 'instituto' => $instituto, 'contatos' => $contatos]);
    }
}
