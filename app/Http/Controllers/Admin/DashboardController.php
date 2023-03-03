<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Empresager;
use App\Http\Controllers\Controller;
use App\Models\Candidaturas;
use App\Models\Complaint;
use App\Models\Empresa;
use App\Models\Gallery;

use App\Models\News;
use App\Models\Perfil;
use App\Models\Reclamation;
use App\Models\SMS;
use App\Models\User;
use App\Models\Vaga;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    public function index()
    {
        if (Auth::user()->level == "cliente") {
            $jan =  Candidaturas::with('canditados', 'empresas')->where('fk_cliente', Auth::user()->id)->whereMonth('created_at', '=', 01)->count();
            $response['jan'] = json_encode($jan);
            $fev = Candidaturas::with('canditados', 'empresas')->where('fk_cliente', Auth::user()->id)->whereMonth('created_at', '=', 02)->count();
            $response['fev'] = json_encode($fev);
            $mar = Candidaturas::with('canditados', 'empresas')->where('fk_cliente', Auth::user()->id)->whereMonth('created_at', '=', 03)->count();
            $response['mar'] = json_encode($mar);
            $abr = Candidaturas::with('canditados', 'empresas')->where('fk_cliente', Auth::user()->id)->whereMonth('created_at', '=', 04)->count();
            $response['abr'] = json_encode($abr);
            $maio = Candidaturas::with('canditados', 'empresas')->where('fk_cliente', Auth::user()->id)->whereMonth('created_at', '=', 05)->count();
            $response['maio'] = json_encode($maio);
            $jun = Candidaturas::with('canditados', 'empresas')->where('fk_cliente', Auth::user()->id)->whereMonth('created_at', '=', 06)->count();
            $response['jun'] = json_encode($jun);
            $jul = Candidaturas::with('canditados', 'empresas')->where('fk_cliente', Auth::user()->id)->whereMonth('created_at', '=', 07)->count();
            $response['jul'] = json_encode($jul);
            $ago = Candidaturas::with('canditados', 'empresas')->where('fk_cliente', Auth::user()->id)->whereMonth('created_at', '=', '08')->count();
            $response['ago'] = json_encode($ago);
            $set = Candidaturas::with('canditados', 'empresas')->where('fk_cliente', Auth::user()->id)->whereMonth('created_at', '=', '09')->count();
            $response['set'] = json_encode($set);
            $out = Candidaturas::with('canditados', 'empresas')->where('fk_cliente', Auth::user()->id)->whereMonth('created_at', '=', '10')->count();
            $response['out'] = json_encode($out);
            $nov = Candidaturas::with('canditados', 'empresas')->where('fk_cliente', Auth::user()->id)->whereMonth('created_at', '=', 11)->count();
            $response['nov'] = json_encode($nov);
            $dez = Candidaturas::with('canditados', 'empresas')->where('fk_cliente', Auth::user()->id)->whereMonth('created_at', '=', 12)->count();
            $response['dez'] = json_encode($dez);


            $response['smsTotal'] = SMS::where('fk_cliente', Auth::user()->id)->count();
            $response['sms'] = SMS::where('fk_cliente', Auth::user()->id)->get();
            $response['perfil'] =  Perfil::where('fk_user', Auth::user()->id)->count();
            return view('admin.home.index', $response);
        }
        if (Auth::user()->level == "Administrador") {
            $jan = Vaga::where('fk_user', Auth::user()->id)->whereMonth('created_at', '=', 01)->count();
            $response['jan'] = json_encode($jan);
            $fev = Vaga::where('fk_user', Auth::user()->id)->whereMonth('created_at', '=', 02)->count();
            $response['fev'] = json_encode($fev);
            $mar = Vaga::where('fk_user', Auth::user()->id)->whereMonth('created_at', '=', 03)->count();
            $response['mar'] = json_encode($mar);
            $abr = Vaga::where('fk_user', Auth::user()->id)->whereMonth('created_at', '=', 04)->count();
            $response['abr'] = json_encode($abr);
            $maio = Vaga::where('fk_user', Auth::user()->id)->whereMonth('created_at', '=', 05)->count();
            $response['maio'] = json_encode($maio);
            $jun = Vaga::where('fk_user', Auth::user()->id)->whereMonth('created_at', '=', 06)->count();
            $response['jun'] = json_encode($jun);
            $jul = Vaga::where('fk_user', Auth::user()->id)->whereMonth('created_at', '=', 07)->count();
            $response['jul'] = json_encode($jul);
            $ago = Vaga::where('fk_user', Auth::user()->id)->whereMonth('created_at', '=', '08')->count();
            $response['ago'] = json_encode($ago);
            $set = Vaga::where('fk_user', Auth::user()->id)->whereMonth('created_at', '=', '09')->count();
            $response['set'] = json_encode($set);
            $out = Vaga::where('fk_user', Auth::user()->id)->whereMonth('created_at', '=', '10')->count();
            $response['out'] = json_encode($out);
            $nov = Vaga::where('fk_user', Auth::user()->id)->whereMonth('created_at', '=', 11)->count();
            $response['nov'] = json_encode($nov);
            $dez = Vaga::where('fk_user', Auth::user()->id)->whereMonth('created_at', '=', 12)->count();
            $response['dez'] = json_encode($dez);
            $response['empresas'] =  Empresa::where('fk_user', Auth::user()->id)->count();
            return view('admin.home.index', $response);
        }

        if(Auth::user()->level == "Administrador-Master"){
            $jan = Vaga::whereMonth('created_at', '=', 01)->count();
            $response['jan'] = json_encode($jan);
            $fev = Vaga::whereMonth('created_at', '=', 02)->count();
            $response['fev'] = json_encode($fev);
            $mar = Vaga::whereMonth('created_at', '=', 03)->count();
            $response['mar'] = json_encode($mar);
            $abr = Vaga::whereMonth('created_at', '=', 04)->count();
            $response['abr'] = json_encode($abr);
            $maio = Vaga::whereMonth('created_at', '=', 05)->count();
            $response['maio'] = json_encode($maio);
            $jun = Vaga::whereMonth('created_at', '=', 06)->count();
            $response['jun'] = json_encode($jun);
            $jul = Vaga::whereMonth('created_at', '=', 07)->count();
            $response['jul'] = json_encode($jul);
            $ago = Vaga::whereMonth('created_at', '=', '08')->count();
            $response['ago'] = json_encode($ago);
            $set = Vaga::whereMonth('created_at', '=', '09')->count();
            $response['set'] = json_encode($set);
            $out = Vaga::whereMonth('created_at', '=', '10')->count();
            $response['out'] = json_encode($out);
            $nov = Vaga::whereMonth('created_at', '=', 11)->count();
            $response['nov'] = json_encode($nov);
            $dez = Vaga::whereMonth('created_at', '=', 12)->count();
            $response['dez'] = json_encode($dez);

           $response['cliente']= User::where('level','=','cliente')->count();
           $response['Administrador']= User::where('level','=','Administrador')->count();
           $response['vagas'] = Vaga::count();
            return view('admin.home.index', $response);

        }
    }
}
