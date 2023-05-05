<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Candidaturas;
use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class RelatorioController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function vaga()
    {

        if (Auth::user()->level == "Administrador-Master") {
            $response['vagaPublocadas'] = Vaga::get();
        } else {
            $response['vagaPublocadas'] = Vaga::where('fk_user', Auth::user()->id)->get();
        }

        $pdf = PDF::loadview('admin.pdf.vaga.index', $response);
        //Logger
        $this->Logger->log('info', 'Imprimiu uma lista de vagas ');
        return $pdf->setPaper('A4', 'landscape')->stream('pdf');
    }
    public function inscritos()
    {

        if (Auth::user()->level == "Administrador-Master") {
            $response['canditados'] = Candidaturas::with('canditados')->paginate(10);
        } else {
            $response['canditados'] = Candidaturas::with('canditados')->where('fk_publicador', Auth::user()->id)->paginate(10);
        }

        $pdf = PDF::loadview('admin.pdf.inscritos.index', $response);
        //Logger
        $this->Logger->log('info', 'Imprimiu uma lista de canditados ');
        return $pdf->setPaper('A4', 'landscape')->stream('pdf');
    }
}
