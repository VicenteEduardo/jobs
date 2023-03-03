<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class EmpresaController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function index()
    {
       $response['empresaPerfil']= Empresa::where('fk_user',Auth::user()->id)->get();
       $this->Logger->log('info', 'Entrou  em Minhas empresas cadastradas');
       return view('admin.perfilEmpresa.list.index',$response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->Logger->log('info', 'Entrou  em  cadastrar Minhas empresas cadastradas');
    return view('admin.perfilEmpresa.create.index');
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
            'nomeEmpresa' => 'required|string|max:255|unique:empresas',
            'nif' => 'required|string|max:14|unique:empresas',
            'telefone' => 'required|max:9',
            'email' => 'required|unique:empresas',
            'localizacao' => 'required',
            'imagem' => 'required|mimes:jpg,png,gif,SVG,EPS',

              ]);
        if ($middle = $request->file('imagem')) {
            $file = $middle->storeAs('imagem', 'imagem-' . uniqid(rand(1, 5)) . "." . $middle->extension());
        } else {
            $file =  null;
        }

        Empresa::create([
            'fk_user' => Auth::user()->id,
            'nomeEmpresa' => $request->nomeEmpresa,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'localizacao' => $request->localizacao,
            'residencia' => $request->residencia,
            'telefone' => $request->telefone,
            'imagem'=> $file ,
        'nif'=> $request->nif,
        'status'=>"Pendente"
        ]);
        $this->Logger->log('info', 'Cadastrou uma empresa com o nome'.$request->nomeEmpresa);
        return redirect()->route('admin.perfilEmpresa.index')->with('create', '1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Empresa::find($id)->delete();
        $this->Logger->log('info', 'Apagou uma empresa com o '.$id);
        return  redirect()->route('admin.perfilEmpresa.index')->with('destroy', '1');
    }
}
