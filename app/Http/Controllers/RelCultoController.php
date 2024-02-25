<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RelCulto;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



class RelCultoController extends Controller
{

    private $relCultoModel;


    public function __construct(RelCulto $relCultoModel)
    {
        $this->relCultoModel = $relCultoModel;
    }

    public function index()
    {

        return RelCulto::with('dizimos')->orderBy('data', 'desc')->get();
    }

    public function edit($id)
    {
        $relatorio = RelCulto::findOrFail($id);

        // dd($relatorio);

        return view('relCulto.edit', ['relatorio' => $relatorio]);
    }

    public function update(Request $request)
    {
        RelCulto::findOrFail($request->id)->update($request->all());
        return redirect('/relCultoIndex')->with('msg', 'Relatorio Editado !');
    }

    public function store(Request $request)
    {
        try {
            // Defina o fuso horário para a data recebida
            $data = Carbon::parse($request->data)->setTimezone(config('app.timezone'));
    
            // Verifique se a data já existe no banco de dados
            $dataExistente =  $this->relCultoModel
                ->where('data', $data->format('Y-m-d'))
                ->first();
    
            if ($dataExistente) {
                return response()->json(['error' => 'Erro! Data já existente no banco'], 422);
            }
    
            // Ajuste o fuso horário novamente antes de salvar no banco de dados
            $request->merge(['data' => $data->setTimezone('UTC')]);
    
            $dadosFormulario = $request->all();
            // Atribui os valores ao modelo
            $this->relCultoModel->fill($dadosFormulario);
            $this->relCultoModel->qtds_total = $request->visitantes + $request->qtds_membros;
            $this->relCultoModel->save();
    
            return response()->json(['message' => 'Relatório cadastrado com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao cadastrar membro', 'error' => $e->getMessage()], 500);
        }
    }
    
    public function relatorioIndex()
    {
        $find = DB::table('relCultos')->orderByDesc("relCultos.data")->paginate(10);
        return view('relCulto.relatorio.index', ['find' => $find]);
    }



    public function relCultoDizimo($id)
    {
        // dd($id);
        $consulta =  RelCulto::where('id', $id)->with('dizimos', 'dizimos.membro')->get();
        if (isset($consulta[0])) {
            $pdf = PDF::loadView('relCulto.relatorio.pdfNormal', compact('consulta'));

            // Montando nome do pdf a ser salvo
            $nomeRelatorio = 'Relatorio de Culto + Dizimo';

            // Retornar o PDF para ser aberto no front-end
            return response($pdf->output(), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $nomeRelatorio . '.pdf"',
            ]);
        }

        return response()->json(['message' => 'Nenhum relatório registrado para essa data'], 404);
    }

    public function relId(Request $request)
    {

        
        $model = new RelCulto;
        $consulta = $model->relId($request);
        
        
        if (isset($consulta[0])) {
            
            $pdf = PDF::loadView('relCulto.relatorio.pdfNormal', compact('consulta'));
            
            // Montando nome do pdf a ser salvo
            $nomeRelatorio = 'Relatorio de Culto + Dizimo';

            return $pdf->setPaper('a4')->stream($nomeRelatorio);
        }
    }
    public function relMeia(Request $request)
    {

        $model = new RelCulto;
        $consulta = $model->relId($request);
        // $consulta = $consulta['consulta'];

        // dd($consulta);

        if (isset($consulta[0])) {
            $pdf = PDF::loadView('relCulto.relatorio.pdfMeiaFolha', compact('consulta'));

            // Montando nome do pdf a ser salvo
            $nomeRelatorio = 'Relatorio de Culto + Dizimo';

            return $pdf->setPaper('a4')->stream($nomeRelatorio);
        }
    }
}
