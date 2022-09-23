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

    public function calcularIdade($find){




        
        
        
        
        
        $count = 0;
        foreach ($find as $dados){
            
            $convert = new dateTime($dados->dataNascimento);
            $data = $convert->format('Y-m-d');
            
            
            // separando yyyy, mm, ddd
            list($ano, $mes, $dia) = explode('-', $data);
            
            // data atual
            $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            // Descobre a unix timestamp da data de nascimento do fulano
            $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
            
            // cálculo
            $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
            
            // dd($idade); continue;

            if($idade <  8){
                $count ++;
            }

        }
        
        return $count;
       
        // dd($find[0]->dataNascimento);
    }

}


