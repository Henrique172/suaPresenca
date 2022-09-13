<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membros;
use PDF;
use DateTime;

class ListaPresencaController extends Controller
{
    public function index(){
        // die('foi');

        return view('listaPresenca.index');
    }

    public function gerarLista(){ 
        $find = Membros::all()->sortBy("nome");

        $pdf = PDF::loadView('listaPresenca.listaPdf', compact('find'))->setOptions(['defaultFont' => 'sans-serif']);
        
        $data =  new dateTime();
        
        $nomeRelatorio = 'Lista_de_Presenca_'.$data->format('m').'_'. $data->format('Y');
        // dd($nomeRelatorio);
        
        return $pdf->setPaper('a4', 'landscape')->stream($nomeRelatorio);


        }
    }
