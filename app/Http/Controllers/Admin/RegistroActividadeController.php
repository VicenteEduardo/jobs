<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroActividadeController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function show($id)
    {

        if (Auth::user()->level != 'Administrador-Master' && Auth::user()->id != $id) {
            return redirect()->route('admin.home')->with('NoAuth', '1');
        } else {

            $response['user'] = User::find($id);
            $response['logs'] = Log::where('USER_ID', $id)->orderBy('id', 'desc')->get();
            $this->Logger->log('info', 'Listou utilizador com o id '.$id);
            return view('admin.registroActividades.index', $response);
        }
    }
}
