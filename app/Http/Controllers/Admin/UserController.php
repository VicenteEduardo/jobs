<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $response['users'] = User::get();
        $this->Logger->log('info', 'Entrou em Listas Utilizadores');
        return view('admin.user.list.index', $response);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (Auth::user()->level != 'Administrador-Master' && Auth::user()->id != $id) {
            return redirect()->route('admin.home')->with('NoAuth', '1');
        } else {

            $response['user'] = User::find($id);
            $response['logs'] = Log::where('USER_ID', $id)->orderBy('id', 'desc')->get();
            $this->Logger->log('info', 'Listou utilizador com o id '.$id);
            return view('admin.user.details.index', $response);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->level != 'Administrador-Master' && Auth::user()->id != $id) {
            return redirect()->route('admin.home')->with('NoAuth', '1');
        } else {

            $response['user'] = User::find($id);
            //Logger
            $this->Logger->log('info', 'Entrou em editar um Utilizador com o identificador' . $id);
            return view('admin.user.edit.index', $response);
        }
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
        if (Auth::user()->level != 'Administrador-Master' && Auth::user()->id != $id) {
            return redirect()->route('admin.home')->with('NoAuth', '1');
        } else {

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'username'=> 'required|string|max:255',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $user = User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'level' => $request->level,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
            $this->Logger->log('info', 'Editou dados do utilizador com o id'.$id);
            return redirect()->route('admin.home')->with('edit', '1');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $count = User::count();


        if ($count > 1) {

            //Logger
            $this->Logger->log('info', 'Eliminou um Utilizador com o identificador ' . $id);

            User::find($id)->delete();
            return redirect()->back()->with('destroy', '1');
        } else {
            return redirect()->back();
        }
    }
}
