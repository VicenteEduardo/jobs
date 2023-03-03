<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Vaga;
use Illuminate\Http\Request;

class VagasPublicadasController extends Controller
{

    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function index()
    {
        $reponse['vagaPublocadas'] = Vaga::get();
        $this->Logger->log('info', 'Entrou em Listas de Vagas Publicadas');
        return view('admin.vagasPublicadas.index', $reponse);
    }


    public function destroy($id)
    {

        $this->Logger->log('info', 'Apagou uma vaga com o identificador'.$id);
        Vaga::find($id)->delete();
        return  redirect()->back()->with('destroy', '1');
    }
}
