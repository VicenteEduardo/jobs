<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\AttorneyGeneral;
use App\Models\Direction;
use App\Models\Empresa;
use App\Models\Gallery;
use App\Models\News;
use App\Models\SlideShow;
use App\Models\User;
use App\Models\Vaga;

class HomeController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Response['empresas'] =   Empresa::where('status', '=', 'Aprovado')->get();
        $Response['empresaCadastrada'] =    Empresa::where('status', '=', 'Aprovado')->count();
        $Response['UsuarioCadastrada'] = User::where('level', '=', 'cliente')->count();
        $Response['vagas'] = Vaga::sum('tempoVaga');
        return view('site.home.index', $Response);
    }
}
