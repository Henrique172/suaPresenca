<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

use App\Models\Membros;
use App\Models\Dizimos;
use PDF;

class DizimosController extends Controller
{
    public function index(){
        

        return view('dizimo.index');
    }
    
    public function cadastroIndex(){

        $membros = new Membros();

        $findMembro = $membros->all();
        // dd($findMembro);

        
        return view('dizimo.cadastro', ['membros' => $findMembro]);
    }

    public function add(request $request){ 

        $dizimos = new Dizimos;
        // dd($request->data);
        // dd(date_create_from_format("d/m/Y", $request->data));
        $dizimos->membro_id = $request->membro_id;
        $dizimos->valor = $request->valor;
        $dizimos->tipo = $request->tipo;
        $dizimos->data =  date_create_from_format("d/m/Y", $request->data);

        $dizimos->save();

        return redirect('/dashboard')->with('msg', 'Dizimos cadastrador com Sucesso!');


    }

    public function relatorioIndex(){ 

        $membros = new Membros();
        $findMembro = $membros->all();

        return view('dizimo.relatorio.index', ['membros'=> $findMembro]);
    }

    public function relatorio(request $request){

       new Membros();
       $dizimo = new Dizimos();

       $find = Membros::where('id', $request->membro_id);

    //    dd($request->membro_id);

        $consulta = $dizimo->buscar($request->membro_id);
        
        // dd($consulta[0]);
        if(isset($consulta[0])){

                // dd($consulta[0]->nome);

            // Montando nome do pdf a ser salvo
        $nomeRelatorio = 'Relatorio_'. $consulta[0]->nome;    

            $pdf = PDF::loadView('dizimo.relatorio.pdf', compact('consulta'));
            return $pdf->setPaper('a4')->stream($nomeRelatorio);
            
            // return view('dizimo.relatorio.relatorioMembro', ['consulta' => $consulta]);
        }else{
            return redirect('/relatorioDizimo')->with('msg', 'Nao ha Dizimos Cadastrado Com Membro!');
        }
    }
    public function relatorioMes(Request $request){

        $model = new Dizimos;
        $consulta = $model->buscarMes($request);

        
        if(isset($consulta[0])){
            

        $pdf = PDF::loadView('dizimo.relatorio.pdfMensal', compact('consulta'));
        
        $data = new dateTime($consulta[0]->data);
        
        // Montando nome do pdf a ser salvo
        $nomeRelatorio = 'Relatorio_mensal_mes_'.$data->format('m').'_'. $data->format('Y');

            
            return $pdf->setPaper('a4')->stream($nomeRelatorio);
        }else{
            return redirect('/relatorioDizimo')->with('msg', 'Nao ha Dizimos Cadastrado Nessa Data!');
        }

    }
}
