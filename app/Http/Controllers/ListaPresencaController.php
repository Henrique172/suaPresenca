<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membros;

class ListaPresencaController extends Controller
{
    public function index(){
        // die('foi');

        return view('listaPresenca.index');
    }

    public function gerarLista(){ 
        $find = Membros::all()->sortBy("nome");


        return view('listaPresenca.lista', ['find' => $find]);
        }
    }
