<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class RegistroEmpresaController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function index()
    {
        $response['empresasSolocitacoes'] =  Empresa::get();
        $this->Logger->log('info', 'Entrou em Solicitações de Empresas');
        return view('admin.registro.list.index', $response);
    }



    public function negar($id)
    {
        Empresa::find($id)->update([
            'status' => "Negado",
        ]);
        $this->Logger->log('info', 'Negou solicitação da empresa com o id ' . $id);
        return redirect()->back()->with('edit', '1');
    }

    public function aprovar($id)
    {
        Empresa::find($id)->update([
            'status' => "Aprovado",
        ]);
        $this->Logger->log('info', 'Aprovou solicitação da empresa com o id ' . $id);
        return redirect()->back()->with('edit', '1');
    }

    public function pendente($id)
    {
        Empresa::find($id)->update([
            'status' => "Pendente",
        ]);
        $this->Logger->log('info', 'Colocou o status Pendente da  solicitação da empresa com o id ' . $id);
        return redirect()->back()->with('edit', '1');
    }
}
