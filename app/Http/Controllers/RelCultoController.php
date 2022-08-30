<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\RelCulto;
use PDF;

class RelCultoController extends Controller
{
    public function index(){
        // dd('teste');

        return view('relCulto.cadastro');
    }

    public function add(request $request){

        $model = new RelCulto;


        $model->pregador = $request->pregador;
        $model->endereco = $request->endereco;
        $model->visitantes = $request->visitantes;
        $model->qtds_membros = $request->qtds_membros;
        $model->horario = $request->horario;
        $model->qtds_total = $request->visitantes + $request->qtds_membros;
        $model->data = date('Y-m-d');
        
        if($model->save()){
            return redirect('/dashboard')->with('msg', 'Relatorio registrado');
        }else{
            return redirect('/dashboard')->with('msg', 'Erro ao adicionar Relatorio, Repita Operacao!');

        }

        // return view('/dashboard');

        // dd(date('Y-m-d'));
    }
    public function relatorioIndex() {

        
        return view('relCulto.relatorio.index');
    }
    


    public function relCultoDizimo(request $request){

        $model = new RelCulto;
        $consulta = $model->relCultoDizimo($request);
        // dd($consulta[0]);

        if(isset($consulta[0])){
            

            $pdf = PDF::loadView('relCulto.relatorio.pdf', compact('consulta'));
            
            // dd($consulta);
            // Montando nome do pdf a ser salvo
            $nomeRelatorio = 'Relatorio de Culto + Dizimo';

    
                
                return $pdf->setPaper('a4')->stream($nomeRelatorio);
            } 
                return redirect('/relCultoIndex')->with('msg', 'Nao há Relatorio registrado nessa data');


        // return view('relCulto.relatorio.pdf',['consulta' => $consulta]);
        // dd($consulta['consultaRelCulto']);

    }
}
