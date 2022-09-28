<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RelCulto; 
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



class RelCultoController extends Controller
{
    public function index(){
        // dd('teste');

        return view('relCulto.cadastro');
    }

    public function edit($id){ 
        $relatorio = RelCulto::findOrFail($id);

        // dd($relatorio);

        return view ('relCulto.edit', ['relatorio' => $relatorio]);
    }

    public function update(Request $request){
        // dd($request->id);
        RelCulto::findOrFail($request->id)->update($request->all());

        return redirect('/relCultoIndex')->with('msg', 'Relatorio Editado !');
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

      

        // $senha = Hash::make('aline123'); 

            #verifica se ja tem relatorio de culto naquela data
        if(RelCulto::where('data', date('Y-m-d'))->count() <> 0 ){
            return redirect('/dashboard')->with('msgErro', 'Ja exite Relatório registrado nessa data');

        }else{

            
            if($model->save()){
                return redirect('/dashboard')->with('msg', 'Relatorio registrado');
            }else{
                return redirect('/dashboard')->with('msg', 'Erro ao adicionar Relatorio, Repita Operacao!');
                
            }
        }

        // return view('/dashboard');

        // dd(date('Y-m-d'));
    }
    public function relatorioIndex() {

        // $find = RelCulto::all()->sortByDesc("data")->Paginate(10);
        $find = DB::table('relCultos')->orderByDesc("relCultos.data")->paginate(10);
        // $find = RelCulto::all()->sortByDesc("data")->Paginate(10);

        // dd($find);  

        return view('relCulto.relatorio.index',['find' => $find]);
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

    public function relId(Request $request){
        
        $model = new RelCulto;
        $consulta = $model->relId($request);


        if(isset($consulta[0])){
            

            $pdf = PDF::loadView('relCulto.relatorio.pdf', compact('consulta'));
            
            // dd($consulta);
            // Montando nome do pdf a ser salvo
            $nomeRelatorio = 'Relatorio de Culto + Dizimo';

    
                
                return $pdf->setPaper('a4')->stream($nomeRelatorio);



        }
        // dd($consulta);

    }
}
