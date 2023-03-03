<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasVagasController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function index()
    {

        $response['categorias'] = Categoria::get();
        $this->Logger->log('info', 'Listou categorias');
        return view('admin.categoriaVagas.list.index', $response);
    }

    public function create()
    {
        $this->Logger->log('info', 'entrou em cadastrar  categorias');
        return  view('admin.categoriaVagas.create.index');
    }


    public function store(Request $request)
    {
        $request->validate([

            'categoria' => 'required|string|max:60|unique:categorias',
        ]);


        Categoria::create([

            'categoria' => $request->categoria,

        ]);
        $this->Logger->log('info', 'Cadastrou uma categoria com o nome' . $request->categoria);
        return redirect()->route('admin.categorias.index')->with('create', '1');
    }
    public function destroy($id)
    {
        Categoria::find($id)->delete();
        $this->Logger->log('info', 'Apagou uma categoria com  ' . $id);
        return  redirect()->back()->with('destroy', '1');
    }
}
