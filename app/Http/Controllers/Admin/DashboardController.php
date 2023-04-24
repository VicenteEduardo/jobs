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





            //candidaturas
            $reponse['jancanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '01')->where('fk_cliente', Auth::user()->id)->count());
            $response['jancanditados'] = json_encode($reponse['jancanditados']);
            $reponse['fevcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '02')->where('fk_cliente', Auth::user()->id)->count());
            $response['fevcanditados'] = json_encode($reponse['fevcanditados']);
            $reponse['marcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '03')->where('fk_cliente', Auth::user()->id)->count());
            $response['marcanditados'] = json_encode($reponse['marcanditados']);
            $reponse['abrcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '04')->where('fk_cliente', Auth::user()->id)->count());
            $response['abrcanditados'] = json_encode($reponse['abrcanditados']);
            $reponse['maiocanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '05')->where('fk_cliente', Auth::user()->id)->count());
            $response['maiocanditados'] = json_encode($reponse['maiocanditados']);
            $reponse['juncanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '06')->where('fk_cliente', Auth::user()->id)->count());
            $response['juncanditados'] = json_encode($reponse['juncanditados']);
            $reponse['julcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '07')->where('fk_cliente', Auth::user()->id)->count());
            $response['julcanditados'] = json_encode($reponse['julcanditados']);
            $reponse['agocanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '08')->where('fk_cliente', Auth::user()->id)->count());
            $response['agocanditados'] = json_encode($reponse['agocanditados']);
            $reponse['setcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '09')->where('fk_cliente', Auth::user()->id)->count());
            $response['setcanditados'] = json_encode($reponse['setcanditados']);
            $reponse['outcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '10')->where('fk_cliente', Auth::user()->id)->count());
            $response['outcanditados'] = json_encode($reponse['outcanditados']);
            $reponse['novcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '11')->where('fk_cliente', Auth::user()->id)->count());
            $response['novcanditados'] = json_encode($reponse['novcanditados']);
            $reponse['dezcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '12')->where('fk_cliente', Auth::user()->id)->count());
            $response['dezcanditados'] = json_encode($reponse['dezcanditados']);


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


            //candidaturas
            $reponse['jancanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '01')->where('fk_publicador', Auth::user()->id)->count());
            $response['jancanditados'] = json_encode($reponse['jancanditados']);
            $reponse['fevcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '02')->where('fk_publicador', Auth::user()->id)->count());
            $response['fevcanditados'] = json_encode($reponse['fevcanditados']);
            $reponse['marcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '03')->where('fk_publicador', Auth::user()->id)->count());
            $response['marcanditados'] = json_encode($reponse['marcanditados']);
            $reponse['abrcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '04')->where('fk_publicador', Auth::user()->id)->count());
            $response['abrcanditados'] = json_encode($reponse['abrcanditados']);
            $reponse['maiocanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '05')->where('fk_publicador', Auth::user()->id)->count());
            $response['maiocanditados'] = json_encode($reponse['maiocanditados']);
            $reponse['juncanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '06')->where('fk_publicador', Auth::user()->id)->count());
            $response['juncanditados'] = json_encode($reponse['juncanditados']);
            $reponse['julcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '07')->where('fk_publicador', Auth::user()->id)->count());
            $response['julcanditados'] = json_encode($reponse['julcanditados']);
            $reponse['agocanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '08')->where('fk_publicador', Auth::user()->id)->count());
            $response['agocanditados'] = json_encode($reponse['agocanditados']);
            $reponse['setcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '09')->where('fk_publicador', Auth::user()->id)->count());
            $response['setcanditados'] = json_encode($reponse['setcanditados']);
            $reponse['outcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '10')->where('fk_publicador', Auth::user()->id)->count());
            $response['outcanditados'] = json_encode($reponse['outcanditados']);
            $reponse['novcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '11')->where('fk_publicador', Auth::user()->id)->count());
            $response['novcanditados'] = json_encode($reponse['novcanditados']);
            $reponse['dezcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '12')->where('fk_publicador', Auth::user()->id)->count());
            $response['dezcanditados'] = json_encode($reponse['dezcanditados']);

            return view('admin.home.index', $response);
        }

        if (Auth::user()->level == "Administrador-Master") {
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

            $response['cliente'] = User::where('level', '=', 'cliente')->count();
            $response['Administrador'] = Empresa::where('status', '=', 'Aprovado')->count();
            $response['vagas'] = Vaga::count();


            //candidaturas
            $reponse['jancanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '01')->count());
            $response['jancanditados'] = json_encode($reponse['jancanditados']);
            $reponse['fevcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '02')->count());
            $response['fevcanditados'] = json_encode($reponse['fevcanditados']);
            $reponse['marcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '03')->count());
            $response['marcanditados'] = json_encode($reponse['marcanditados']);
            $reponse['abrcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '04')->count());
            $response['abrcanditados'] = json_encode($reponse['abrcanditados']);
            $reponse['maiocanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '05')->count());
            $response['maiocanditados'] = json_encode($reponse['maiocanditados']);
            $reponse['juncanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '06')->count());
            $response['juncanditados'] = json_encode($reponse['juncanditados']);
            $reponse['julcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '07')->count());
            $response['julcanditados'] = json_encode($reponse['julcanditados']);
            $reponse['agocanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '08')->count());
            $response['agocanditados'] = json_encode($reponse['agocanditados']);
            $reponse['setcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '09')->count());
            $response['setcanditados'] = json_encode($reponse['setcanditados']);
            $reponse['outcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '10')->count());
            $response['outcanditados'] = json_encode($reponse['outcanditados']);
            $reponse['novcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '11')->count());
            $response['novcanditados'] = json_encode($reponse['novcanditados']);
            $reponse['dezcanditados'] = json_encode(Candidaturas::with('canditados')->whereMonth('created_at', '=', '12')->count());
            $response['dezcanditados'] = json_encode($reponse['dezcanditados']);

            //empresas


            $reponse['janEmpresa'] = json_encode(Empresa::whereMonth('created_at', '=', '01')->count());
            $response['janEmpresa'] = json_encode($reponse['jancanditados']);
            $reponse['fevEmpresa'] = json_encode(Empresa::whereMonth('created_at', '=', '02')->count());
            $response['fevEmpresa'] = json_encode($reponse['fevcanditados']);
            $reponse['marEmpresa'] = json_encode(Empresa::whereMonth('created_at', '=', '03')->count());
            $response['marEmpresa'] = json_encode($reponse['marcanditados']);
            $reponse['abrEmpresa'] = json_encode(Empresa::whereMonth('created_at', '=', '04')->count());
            $response['abrEmpresa'] = json_encode($reponse['abrcanditados']);
            $reponse['maioEmpresa'] = json_encode(Empresa::whereMonth('created_at', '=', '05')->count());
            $response['maioEmpresa'] = json_encode($reponse['maiocanditados']);
            $reponse['junEmpresa'] = json_encode(Empresa::whereMonth('created_at', '=', '06')->count());
            $response['junEmpresa'] = json_encode($reponse['juncanditados']);
            $reponse['julEmpresa'] = json_encode(Empresa::whereMonth('created_at', '=', '07')->count());
            $response['julEmpresa'] = json_encode($reponse['julcanditados']);
            $reponse['agoEmpresa'] = json_encode(Empresa::whereMonth('created_at', '=', '08')->count());
            $response['agoEmpresa'] = json_encode($reponse['agocanditados']);
            $reponse['setEmpresa'] = json_encode(Empresa::whereMonth('created_at', '=', '09')->count());
            $response['setEmpresa'] = json_encode($reponse['setcanditados']);
            $reponse['outEmpresa'] = json_encode(Empresa::whereMonth('created_at', '=', '10')->count());
            $response['outEmpresa'] = json_encode($reponse['outcanditados']);
            $reponse['novEmpresa'] = json_encode(Empresa::whereMonth('created_at', '=', '11')->count());
            $response['novEmpresa'] = json_encode($reponse['novcanditados']);
            $reponse['dezEmpresa'] = json_encode(Candidaturas::whereMonth('created_at', '=', '12')->count());
            $response['dezEmpresa'] = json_encode($reponse['dezcanditados']);

            $response['empresaCount'] = json_encode(Empresa::count());
            $response['Vagas'] = Vaga::count();
            $response['candidatos'] =   User::where('level', 'cliente')->count();
            return view('admin.home.index', $response);
        }
    }
}
