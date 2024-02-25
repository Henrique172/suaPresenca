<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Membros;
use App\Models\User;
use Carbon\Carbon;
use File;
use DateTime;

class MembrosController extends Controller
{

    private $membroModel;


    public function __construct(Membros $membrosModel)
    {
        $this->membroModel = $membrosModel;
    }

    public function show($id)
    {
        $membro = $this->membroModel::where('id', $id)->first();
        // dd('aaa', $membro);
        // $membro->dataNascimento = '10/12/2023';
        $data = new DateTime($membro->dataNascimento);
        $dataMembro = new DateTime($membro->dataMembro);
        $membro->dataNascimento = $data->format('d/m/Y');
        $membro->dataMembro = $dataMembro->format('Y');


        return response()->json($membro);
    }

    public function index()
    {
        $models = new Membros;
        $membros = Membros::where('status', 0)
            ->orderBy('nome')
            ->get()
            ->toArray();

        $find = Membros::all()->sortBy("nome");

        $membrosInativo = Membros::where('status', '=', 1)->get();
        $criancas = $models->buscaCriancas($find);
        $aniversarianteMes = $models->obterAniversariantesDoMes($membros);



        $data = ['aniversariante' => $aniversarianteMes, 'find' => $membros,  'criancas' => $criancas, 'membrosInativo' => $membrosInativo];

        return response()->json($data);
    }


    public function store(Request $request)
    {

        try {
            $dataNascimento = Carbon::parse($request->dataNascimento);

            $this->membroModel->nome = strtoupper($request->nome);
            $this->membroModel->dataNascimento = $dataNascimento;
            $this->membroModel->endereco = strtoupper($request->endereco);
            $this->membroModel->celular = $request->celular;
            $this->membroModel->batizado = 0;
            $this->membroModel->certificado = 0;
            $this->membroModel->status = 0;

            if ($request->foto) {
                $base64Data = explode(',', $request->foto)[1];
                $imageData = base64_decode($base64Data);

                // Obtém a extensão do arquivo a partir do tipo MIME
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mimeType = finfo_buffer($finfo, $imageData);
                finfo_close($finfo);
                $extension = explode('/', $mimeType)[1];

                // Gera um hash do nome original da imagem, timestamp atual e a extensão
                $imageName = md5($request->nome . strtotime("now") . "." . $extension);

                $this->membroModel->foto = $imageName;

                file_put_contents(public_path('img/membros/' . $imageName), $imageData);
            }

            $this->membroModel->save();

            return response()->json(['message' => 'Membro cadastrado com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao cadastrar membro', 'error' => $e->getMessage()], 500);
        }
    }


    public function edit($id)
    {
        $membro = $this->membroModel::find(1422);



        return view('membros.edit', ['membro' => $membro]);
    }

    public function update(Request $request)
    {
        try {


            if ($request->foto) {
                if ($request->foto != $this->membroModel->findOrFail($request->id)->foto) {
                    $base64Data = explode(',', $request->foto)[1];
                    $imageData = base64_decode($base64Data);

                    // Obtém a extensão do arquivo a partir do tipo MIME
                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                    $mimeType = finfo_buffer($finfo, $imageData);
                    finfo_close($finfo);
                    $extension = explode('/', $mimeType)[1];

                    // Gera um hash do nome original da imagem, timestamp atual e a extensão
                    $imageName = md5($request->nome . strtotime("now") . "." . $extension);


                    $request->merge(['foto' => $imageName]);

                    // dd($request->all());

                    file_put_contents(public_path('img/membros/' . $imageName), $imageData);
                }
            }
            $dataNascimento = Carbon::parse($request->dataNascimento);
            $request->merge(['dataNascimento' => $dataNascimento]);
            Membros::findOrFail($request->id)->update($request->all());

            return response()->json(['message' => 'Membro atualizado com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar o membro: ' . $e->getMessage()], 500);
        }
    }
}
