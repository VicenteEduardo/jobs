<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Vaga;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function index()
    {
        $reponse['empregos'] =   Empresa::paginate(6);

        $reponse['totalempregos'] = Empresa::count();
        $this->Logger->log('info', 'Entrou  em Procurar Vagas');
        return view('admin.empresas.list.index', $reponse);
    }


    public function store(Request $request)
    {
        return redirect("admin/empresas/show/$request->emprego");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res = Empresa::where('nomeEmpresa', urldecode($id))->count();
        if ($res > 0) {
            try {
                $response['empregos'] = Empresa::where('nomeEmpresa', urldecode($id))->paginate(6);
                $response['totalempregos'] = Empresa::where('nomeEmpresa', urldecode($id))->count();
                $this->Logger->log('info', 'Entrou  em Empresas Cadastradas com id' . $id);
                return view('admin.empresas.detalis.index', $response);
            } catch (\Throwable $th) {
                return redirect()->route('admin.empresas.index')->with('notFond', '1');
            }
        }
        return redirect()->route('admin.empresas.index')->with('notFond', '1');
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
