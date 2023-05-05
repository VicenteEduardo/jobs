<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\CategoriaCliente;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function create()
    {
        $reponse['perfilCliente'] = Perfil::where('fk_user', Auth::user()->id)->first();
        $this->Logger->log('info', 'Entrou em editar Perfil');
        return view('admin.perfil.create.index', $reponse);
    }

    public function store(Request $request)
    {



        $request->validate([
            'nomeCliente' => 'required|string|max:255',
            'bi' => 'required|string|max:14',
            'dataNascimento' => 'required|',
            'nacionalidade' => 'required|string|max:100',
            'residencia' => 'required',
            'telefone' => 'required|max:9',
            'email' => 'required',

            'ablilitacoesLiteriais' => 'required',
            'formacacaoProfissional' => 'required',
            'fotoPerfil' => 'required|mimes:jpg,png,gif,SVG,EPS',

        ]);

        $year = date('Y');


        if ($year - date('Y', strtotime($request->dataNascimento))   >= 18) {


            if ($middle = $request->file('fotoPerfil')) {
                $file = $middle->storeAs('fotoPerfil', 'fotoPerfil-' . uniqid(rand(1, 5)) . "." . $middle->extension());
            } else {
                $file =  Perfil::where('fk_user', Auth::user()->id)->fotoPerfil;;
            }

            $perfil =  Perfil::where('fk_user', Auth::user()->id)->count();
            if ($perfil <= 0) {
                $Perfil = Perfil::create([
                    'fk_user' => Auth::user()->id,
                    'nomeCliente' => $request->nomeCliente,
                    'bi' => $request->bi,
                    'dataNascimento' => $request->dataNascimento,
                    'nacionalidade' => $request->nacionalidade,
                    'residencia' => $request->residencia,
                    'telefone' => $request->telefone,
                    'whatssap' => $request->whatssap,
                    'email' => $request->email,
                    'ablilitacoesLiteriais' => $request->ablilitacoesLiteriais,
                    'formacacaoProfissional' => $request->formacacaoProfissional,
                    'explerienciaProfissional' => $request->explerienciaProfissional,
                    'idiomas' => $request->idiomas,
                    'fotoPerfil' => $file
                ]);
                for ($a = 0; $a < count($request->categoria); $a++) {
                    CategoriaCliente::create([
                        'nomeCategoria' => $request->categoria[$a],
                        'fk_cliente' => Auth::user()->id,
                    ]);
                }
            } else {
                $Perfil = Perfil::where('fk_user', Auth::user()->id)->update([
                    'fk_user' => Auth::user()->id,
                    'nomeCliente' => $request->nomeCliente,
                    'bi' => $request->bi,
                    'dataNascimento' => $request->dataNascimento,
                    'nacionalidade' => $request->nacionalidade,
                    'residencia' => $request->residencia,
                    'telefone' => $request->telefone,
                    'whatssap' => $request->whatssap,
                    'email' => $request->email,
                    'ablilitacoesLiteriais' => $request->ablilitacoesLiteriais,
                    'formacacaoProfissional' => $request->formacacaoProfissional,
                    'explerienciaProfissional' => $request->explerienciaProfissional,
                    'idiomas' => $request->idiomas,
                    'fotoPerfil' => $file
                ]);

                for ($a = 0; $a < count($request->categoria); $a++) {
                    CategoriaCliente::where('fk_cliente', Auth::user()->id)->update([
                        'nomeCategoria' => $request->categoria[$a],
                        'fk_cliente' => Auth::user()->id
                    ]);
                }
            }
            $this->Logger->log('info', 'Editou  Perfil');
            return redirect()->route('admin.perfil.create')->with('edit', '1');
        } else {
            return redirect()->back()->with('year', 1);
        }
    }
}
