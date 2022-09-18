<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Membros;
use DateTime;

class ListaPresencaController extends Controller
{
    public function index(){

        return view('listaPresenca.index');
    }

    public function gerarLista(){ 
        $data =  new dateTime();
        $find = Membros::all()->sortBy("nome");
        $nomeRelatorio = 'Lista_de_Presenca_'.$data->format('m').'_'. $data->format('Y');

        $pdf = PDF::loadView('listaPresenca.listaPdf', compact('find'))
                    ->setOptions(['isHtml5ParserEnabled' => true, 
                                  'isRemoteEnabled' => true]);
        
        
        return $pdf->setPaper('a4')->stream($nomeRelatorio);

        // return view ('listaPresenca.listaPdf',['find' => $find]);


        }
    }
