<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membros;
use App\Models\Batismos;
use App\Models\CertificadosGerados;
use PDF;
use DateTime;

class BatismosController extends Controller
{
    //
    public function index(){
        $membros = new Membros();
        // $findMembro = $membros->where('id', 1)->get();
        $findMembro = Membros::where('certificado', '0')->get();
        $count = Membros::where('batizado', '1')->get();

        // dd($findMembro);


        return view('/batismos.index',['membros'=> $findMembro, 'count'=>$count]);
    }

    public function relatorio(request $request){ 

        $membros = new Membros();
        
        $consulta = $membros->relatorioBatizdo($request);
        // dd($consulta);

        $pdf = PDF::loadView('batismos.pdf', compact('consulta'));
        // dd($find);
          // Montando nome do pdf a ser salvo
          $nomeRelatorio = 'Relatorio_de_Batismo';
          

            
          return $pdf->setPaper('a4')->stream($nomeRelatorio);
    }

    public function gerarCertificado(request $request){

        $membros = new Membros();
        $batismo = new Batismos();
        $CertificadosGerados = new CertificadosGerados();

        if($request->membro_id){

            $consulta =  $membros->find($request->membro_id);

           $data = new dateTime($consulta->dataBatismo);
        //    dd($data->format('d/m/Y'));

            $nomeRelatorio = 'Certificado de Batismo '. $consulta->nome;
            $CertificadosGerados->add($request, $nomeRelatorio, $consulta->id);
            $batismo->atualizar($request);

            $pdf = PDF::loadView('batismos.certificado', compact('consulta', 'data'));

            // SALVANDO DADOS GERADOS EM TABELA CERRTIFICADO GERADO

            

           $gerado =  $pdf->setPaper('a4', 'landscape')->stream($nomeRelatorio);

            // SALVAR ARQUIVO NA PASTA PUBLIC CERTIIFICADO
            $output = $pdf->output();
            file_put_contents(public_path('certificado/'.$nomeRelatorio.'.pdf'), $output);
            
            
            
            
            return $gerado;
            
        }else{

            return view('/batismoIndex');
        }

    
        // dd($find->nome);
    }
}
