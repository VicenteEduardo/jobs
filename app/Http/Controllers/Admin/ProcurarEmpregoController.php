<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\CategoriaVagas;
use App\Models\Perfil;
use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcurarEmpregoController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function detalhes($id)
    {

        $response['perfil'] =  Perfil::where('fk_user', Auth::user()->id)->count();
        if ($response['perfil'] <= 0) {

            return redirect()->route('admin.home');
        } else {
            $response['vaga'] =  Vaga::find($id);
         $response['categoriaVagas'] = CategoriaVagas::where('fk_categoria', $id)->get();

            $this->Logger->log('info', 'Entrou em datalhes da   procurar emprego com o id'.$id);
            return view('admin.buscaEmprego.detalhesVaga.index', $response);
        }
    }

    public function index()
    {

        $response['perfil'] =  Perfil::where('fk_user', Auth::user()->id)->count();
        if ($response['perfil'] <= 0) {

            return redirect()->route('admin.home');
        } else {
            $reponse['empregos'] = Vaga::with('categoria')->paginate(6);
            $response['perfil'] =  Perfil::where('fk_user', Auth::user()->id)->count();
            $reponse['totalempregos'] = Vaga::with('categorias')->count();
            $this->Logger->log('info', 'Entrou em Procurar Emprego');
            return view('admin.buscaEmprego.list.index', $reponse);
        }
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
        return redirect("admin/buscar-emprego/show/$request->emprego");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $res = Vaga::with('categoria')->where('tituloEmprego', urldecode($id))->count();
        if ($res > 0) {
            try {
                $response['empregos'] = Vaga::with('categoria')->where('tituloEmprego', urldecode($id))->paginate(6);
                $response['totalempregos'] = Vaga::with('categoria')->where('tituloEmprego', urldecode($id))->count();
                return view('admin.buscaEmprego.detalis.index', $response);

                return view('site.news.single.index', $response);
            } catch (\Throwable $th) {
                return redirect()->route('admin.buscar.index')->with('notFond', '1');
            }
        }
        return redirect()->route('admin.buscar.index')->with('notFond', '1');
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
        //
    }
}
