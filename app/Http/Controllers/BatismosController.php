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
    public function index()
    {
        $membros = new Membros();
        // $findMembro = $membros->where('id', 1)->get();
        $findMembro = Membros::where('certificado', '0')->get();
        $count = Membros::where('batizado', '1')->get();

        // dd($findMembro);


        return view('/batismos.index', ['membros' => $findMembro, 'count' => $count]);
    }

    public function relatorio(request $request)
    {

        $membros = new Membros();

        $consulta = $membros->relatorioBatizdo($request);


        $pdf = PDF::loadView('batismos.pdf', compact('consulta'));
        // dd($find);
        // Montando nome do pdf a ser salvo
        $nomeRelatorio = 'Relatorio_de_Batismo';



        return $pdf->setPaper('a4')->stream($nomeRelatorio);
    }

    public function gerarCertificado(request $request)
    {

        $membros = new Membros();
        $batismo = new Batismos();
        $CertificadosGerados = new CertificadosGerados();


        if ($request->id) {
            
            $consulta =  $membros->find($request->id);

            $data = DateTime::createFromFormat('d/m/Y', $request->dataBatismo);

            $nomeRelatorio = 'Certificado de Batismo ' . $consulta->nome;
            $CertificadosGerados->add($request, $nomeRelatorio, $consulta->id);
            $batismo->atualizar($request);



            $pdf = PDF::loadView('batismos.certificado', compact('consulta', 'data'));


            $gerado =  $pdf->setPaper('a4', 'landscape')->stream($nomeRelatorio);
            $output = $pdf->output();
            $filePath = public_path('certificado/' . $nomeRelatorio . '.pdf');
            file_put_contents($filePath, $output);

            // Adicione o nome do arquivo ao JSON de resposta
            return response()->json([
                'success' => true,
                'filename' => $nomeRelatorio,
            ]);
        }
    }

    public function  gerarCertificadoCliente()
    {

        // alert('DIGITE SEU NOME');

        $valor1 = "Primeiro Valor";
        $valor2 = "Segundo Valor";

        // Passando as variáveis para a view
        return view('/batismos/certificadoCliente', compact('valor1', 'valor2'));
        // return view('/batismos/certificadoCliente');

    }

    public function certificadoPublic(request $request)
    {
        dd('testando certificadoPublic');
    }
}
