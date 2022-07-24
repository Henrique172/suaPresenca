<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use DateTime;
class Membros extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function relatorioBatizdo($dados){
        
        
        // CONSULTA QUE PEGA TODOS QUE FORAM BATIZADO DO TIPO 1 E COM DATA DE BATIZMOS

        $consulta = DB::table('membros')
        ->where('batizado', '1')
        ->where('dataBatismo', '<>', '')
        ->get();

        // dd($consulta);

        return($consulta);
    }

    public function edit($request, $nameImg){

        $membro = new Membros;

        $membro->nome = strtoupper($request->nome);
        $membro->dataMembro = $request->dataMembro;
        $membro->dataNascimento = $request->dataNascimento;
        $membro->endereco = strtoupper($request->endereco);
        $membro->celular = $request->celular;
        $membro->batizado = $request->batizado;
        $membro->certificado = 0;
        $membro->status = 0;
        $membro->foto = $nameImg;

        dd($membro);
        $membro->save();
    }

}


