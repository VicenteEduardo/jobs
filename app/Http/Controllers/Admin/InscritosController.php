<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Candidaturas;
use App\Models\CategoriaVagas;
use App\Models\Perfil;
use App\Models\User;
use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscritosController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function index()
    {




        if (Auth::user()->level == "Administrador-Master") {
            $reponse['vagaPublocadas'] = Vaga::get();
        } else {
            $reponse['vagaPublocadas'] = Vaga::where('fk_user', Auth::user()->id)->get();
        }
        $this->Logger->log('info', 'Entrou  em Lista de Vagas Publicadas');
        return view('admin.inscritos.list.index', $reponse);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->level == "Administrador-Master") {
            $reponse['canditados'] = Candidaturas::with('canditados')->where('fk_vaga', $id)->get();;
            $reponse['total'] = Candidaturas::with('canditados')->where('fk_vaga', $id)->count();
        } else {
            $reponse['canditados'] = Candidaturas::with('canditados')->where('fk_vaga', $id)->where('fk_publicador', Auth::user()->id)->get();;
            $reponse['total'] = Candidaturas::with('canditados')->where('fk_vaga', $id)->where('fk_publicador', Auth::user()->id)->count();
        }

        $reponse['tituloEmprego'] = Vaga::find($id);
        $id_vagas = Candidaturas::where('fk_vaga', $id)->first()->fk_vaga;
        $reponse['numVagas'] = Vaga::find($id_vagas);
        $reponse['categoriaVagas'] = CategoriaVagas::where('fk_categoria', $id_vagas)->get();
        $this->Logger->log('info', 'Entrou  inscritos a vagas com o id' . $id);
        return view('admin.inscritos.show.index', $reponse);
    }


    public function negar($id)
    {
        if (Candidaturas::find($id)->status == "Negado") {

            return redirect()->back()->with('Negado', '1');
        }
        $this->Logger->log('info', 'Negaou candidato inscrito na vaga com identificador' . $id);


        if (Candidaturas::find($id)->status == "Aprovado") {

            $numvagas = Vaga::where('id', Candidaturas::find($id)->fk_vaga)->first();
            $numVgas =  $numvagas->tempoVaga = $numvagas->tempoVaga + 1;

            Vaga::find(Candidaturas::find($id)->fk_vaga)->update([
                'tempoVaga' => $numVgas,
            ]);
        }
        Candidaturas::find($id)->update([
            'status' => "Negado",
        ]);
        return redirect()->back()->with('edit', '1');
    }

    public function aprovar($id)
    {
        if (Candidaturas::find($id)->status == "Aprovado") {

            return redirect()->back()->with('aprovado', '1');
        } else {

            $numvagas = Vaga::where('id', Candidaturas::find($id)->fk_vaga)->first();

            if ($numvagas->tempoVaga == 1) {
                Candidaturas::find($id)->update([
                    'status' => "Aprovado",

                ]);
                $this->Logger->log('info', 'Aprovou candidato inscrito na vaga com identificador' . $id);
                Vaga::find(Candidaturas::find($id)->fk_vaga)->update([
                    'tempoVaga' => 0,
                ]);
            }
            $numVgas =  $numvagas->tempoVaga = $numvagas->tempoVaga - 1;

            if ($numVgas <= 0) {
                return redirect()->back()->with('error_vagas', '1');
            } else {
                Vaga::find(Candidaturas::find($id)->fk_vaga)->update([
                    'tempoVaga' => $numVgas,
                ]);

                Candidaturas::find($id)->update([
                    'status' => "Aprovado",
                ]);
                $this->Logger->log('info', 'Aprovou candidato inscrito na vaga com identificador' . $id);

                return redirect()->back()->with('edit', '1');
            }
        }
    }

    public function pendente($id)
    {
        if (Candidaturas::find($id)->status == "Pendente") {

            return redirect()->back()->with('Pendente', '1');
        }
        if (Candidaturas::find($id)->status == "Aprovado") {

            $numvagas = Vaga::where('id', Candidaturas::find($id)->fk_vaga)->first();
            $numVgas =  $numvagas->tempoVaga = $numvagas->tempoVaga + 1;

            Vaga::find(Candidaturas::find($id)->fk_vaga)->update([
                'tempoVaga' => $numVgas,
            ]);
        }
        Candidaturas::find($id)->update([
            'status' => "Pendente",
        ]);
        $this->Logger->log('info', 'Colocou o status pendente candidato inscrito na vaga com identificador' . $id);
        return redirect()->back()->with('edit', '1');
    }
    public function curriculo($id)
    {
        $reponse['curriculo'] = Perfil::where('fk_user', $id)->first();
        $curriculo = Perfil::where('fk_user', $id)->count();
        if ($curriculo <= 0) {
            return redirect()->back()->with('curriculoError', '1');
        } else {
            $this->Logger->log('info', 'Vizualizou o perfil com o identificador' . $id);
            return view('admin.curriculo.index', $reponse);
        }
    }


    public function filtar(Request $request)
    {
        return redirect('admin/inscritos/filtrar/' . $request->categoria[0] . '/' . $request->id_vaga);
    }

    public function filtroResultado($categoria, $id)
    {


        if (Auth::user()->level == "Administrador-Master") {
            $reponse['canditados'] = Candidaturas::with('canditados')->where('nomeCategoria', $categoria)->where('fk_vaga', $id)->get();
            $reponse['total'] = Candidaturas::with('canditados')->where('nomeCategoria', $categoria)->where('fk_vaga', $id)->count();
        } else {
            $reponse['canditados'] = Candidaturas::with('canditados')->where('nomeCategoria', $categoria)->where('fk_vaga', $id)->where('fk_publicador', Auth::user()->id)->get();
            $reponse['total'] = Candidaturas::with('canditados')->where('nomeCategoria', $categoria)->where('fk_vaga', $id)->where('fk_publicador', Auth::user()->id)->count();
        }

        $reponse['tituloEmprego'] = Vaga::find($id);
        $id_vagas = Candidaturas::where('fk_vaga', $id)->first()->fk_vaga;
        $reponse['numVagas'] = Vaga::find($id_vagas);
        $reponse['categoriaVagas'] = CategoriaVagas::where('fk_categoria', $id_vagas)->get();
        $this->Logger->log('info', 'Entrou  inscritos a vagas com o id' . $id);
        return view('admin.inscritos.show.index', $reponse);
    }
}
