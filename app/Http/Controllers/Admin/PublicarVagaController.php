<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Candidaturas;
use App\Models\CategoriaCliente;
use App\Models\CategoriaVagas;
use App\Models\Empresa;
use App\Models\SMS;
use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicarVagaController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function index()
    {
        if(Auth::user()->level == "Administrador-Master"){
            $reponse['vagaPublocadas'] = Vaga::get();
        }
        else{
            $reponse['vagaPublocadas'] = Vaga::where('fk_user', Auth::user()->id)->get();
        }

        $this->Logger->log('info', 'Entrou em Lista de Vagas Publicadas');
        return view('admin.publicaVaga.list.index', $reponse);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response['minhasEmpresas'] =  Empresa::where('fk_user', Auth::user()->id)->where('status', '=', 'Aprovado')->get();
        $this->Logger->log('info', 'Entrou em criar  Lista de Vagas ');
        return view('admin.publicaVaga.create.index', $response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'tituloEmprego' => 'required|string|max:255',
            'emailEmprego' => 'required|string|max:200',
            'tempoEmprego' => 'required|',
            'nomeEmresa' => 'required|string|max:100',
            'descricaoEmpreego' => 'required',
            'telefoneEmprego' => 'required|max:12',
            'tempoVaga' => 'required',
            'dataVaga' => 'required',


            'imagemEmprego' => 'mimes:jpg,png,gif,SVG,EPS',
        ]);




        if ($middle = $request->file('imagemEmprego')) {
            $file = $middle->storeAs('photoEmployee', 'photoEmployee-' . uniqid(rand(1, 5)) . "." . $middle->extension());
        } else {
            $file = null;
        }
        $Vaga = Vaga::create([
            'fk_user' => Auth::user()->id,
            'tituloEmprego' => $request->tituloEmprego,
            'emailEmprego' => $request->emailEmprego,
            'tempoEmprego' => $request->tempoEmprego,
            'imagemEmprego' => $file,
            'telefoneEmprego' => $request->telefoneEmprego,
            'nomeEmresa' => $request->nomeEmresa,
            'descricaoEmpreego' => $request->descricaoEmpreego,
            'tempoVaga' => $request->tempoVaga,
            'dataVaga' => $request->dataVaga
        ]);

        for ($a = 0; $a < count($request->categoria); $a++) {
            CategoriaVagas::create([
                'nomeCategoria' => $request->categoria[$a],
                'fk_categoria' => $Vaga->id,
            ]);
            $candidatos = CategoriaCliente::where('nomeCategoria', $request->categoria[$a])->get();

            foreach ($candidatos as $item) {
                Candidaturas::create([
                    'fk_cliente' => $item->fk_cliente,
                    'fk_vaga' => $Vaga->id,
                    'nomeCategoria' => $item->nomeCategoria,
                    'fk_publicador' => Auth::user()->id,
                    'status' => "Pendente",
                ]);

                SMS::create([
                    'fk_cliente' => $item->fk_cliente,
                    'tituloEmprego' =>  $request->tituloEmprego,
                    'nomeCategoria' => $item->nomeCategoria,
                    'nomeEmresa' => $request->nomeEmresa,
                ]);
            }
        }

        $this->Logger->log('info', 'Cadastrou uma vaga com o nome  ' . $request->tituloEmprego);
        return redirect()->route('admin.publicarVagas.index')->with('create', '1');
    }


    public function GetSubCatAgainstMainCatEdit($id)
    {
        echo json_encode(Empresa::where('nomeEmpresa', $id)->first());
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response['vaga'] = Vaga::find($id);
        return view('admin.publicaVaga.detalis.index', $response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vaga::find($id)->delete();
        $this->Logger->log('info', 'Eliminou uma vaga com o id '.$id);
        return  redirect()->route('admin.publicarVagas.index')->with('destroy', '1');
    }
}
