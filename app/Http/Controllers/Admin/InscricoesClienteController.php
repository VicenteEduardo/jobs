<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Candidaturas;
use App\Models\CategoriaCliente;
use App\Models\CategoriaVagas;
use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscricoesClienteController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function index()
    {
        $reponse['canditados'] = Candidaturas::with('canditados', 'empresas')->where('fk_cliente', Auth::user()->id)->paginate(6);
        $reponse['total'] = Candidaturas::with('canditados')->where('fk_cliente', Auth::user()->id)->count();
        $this->Logger->log('info', 'Entrou  em Minhas inscrições de vagas');
        return view('admin.inscricoesUsuarios.index', $reponse);
    }

    public function inscricao(Request $request)
    {

        $request->validate([
            'categoria' => 'required',



        ]);
        if(Auth::user()->level == "cliente"){
            $vaga = Vaga::find($request->id_vaga);

            $verificar =  Candidaturas::where('fk_cliente', Auth::user()->id)->where('fk_vaga', $request->id_vaga)->where('nomeCategoria',$request->categoria)->count();
            if ($verificar > 0) {
                return redirect()->route('admin.buscar.index')->with('encontrado', '1');
            } else {

                for ($a = 0; $a < count($request->categoria); $a++) {
                    Candidaturas::create([
                        'fk_cliente' => Auth::user()->id,
                        'fk_vaga' => $vaga->id,
                        'nomeCategoria' => $request->categoria[$a],
                        'fk_publicador' => $vaga->fk_user,
                        'status' => "Pendente"
                    ]);
                    $this->Logger->log('info', 'Se inscreveu em uma vaga com o id'.$vaga->id);
                    return redirect()->route('admin.inscricoesUsuario.index')->with('create', '1');
                }
            }
        }
        else{
            return redirect()->route('admin.home')->with('NoAuth', '1');
        }

    }

    public function destroy($id)
    {
        Candidaturas::find($id)->delete();
        $this->Logger->log('info', 'apagou uma inscrição a vaga com id'.$id);
        return  redirect()->back()->with('destroy', '1');
    }
}
