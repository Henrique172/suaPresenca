<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Membros;
use App\Models\Dashboard;

class DashboardController extends Controller
{
    public function index(){

        $membro = new Membros;
        $batizado = new Dashboard;

        $findMmebro = Membros::all();
        $countBatizados = $batizado->contarBatizdos();

        // dd($countBatizdos);
        


        // pega qts aniversariante no mes
        $niverMes = 0;
        foreach($findMmebro as $find){
            $data = date('m', strtotime($find->dataNascimento));

            if(date('m') == $data){

                $niverMes ++;
            }
        }
        // dd($niverMes);

        $user = auth()->user();

        return view ('dashboard.index', ['user' => $user, 
                     'findMmebro'=> $findMmebro, 
                     'niverMes' => $niverMes, 
                     'countBatizado' => $countBatizados]);

    }
    public function eventosAll(){
        $event = new Event;

        $todosEventos = Event::all();

        // dd($todosEventos);
        $user = auth()->user();
        $events = $user->events;


        return view ('dashboard.eventos', ['events' => $todosEventos]);

    }

    public function niverMes(){
        $membros = new Membros;
        $mesAtual = date('m');

        $find = Membros::all();
        
        // foreach($find as $value)
        // $mesNiver = date('m', strtotime($value->dataNascimento));
        // if(date('m') == $mesNiver){
            
            
        // }
        return view('dashboard.niverMes', ['find' => $find]);
        
        // die('parou antes de retornar');

        // return view('dashboard.niverMes', ['find' => $find]);
        
    }
}
