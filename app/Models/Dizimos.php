<?php

namespace App\Models;
use App\Models\Membros;
use App\Models\Dizimos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;

class Dizimos extends Model
{
    use HasFactory;


    public function buscar($id) {

        $membro = new Membros();
        // $consulta = Membros::findOrFail($id);

        $consulta = DB::table('membros')
        ->join('dizimos', 'membros.id', '=', 'dizimos.membro_id')
        ->where('membros.id', $id)
        ->get();

        return($consulta);

        // dd($consulta);
        // die('CHEGOU');
    }
    public function buscarMes($request){
        
        $membro = new Membros();
        $dizimos = new Dizimos();

        $data = date( '-m-Y', strtotime($request->date));
        
        $dataOne = new dateTime('01'.$data);
        $dataTwo = new dateTime('31'.$data);

        // dd($dataTwo);
        // dd($dateNew = date_create_from_format("d-m-Y", $dataOne));
        
        
        $consulta = $dizimos
        // ->where('data', '>=', $dataOne->format('Y-d-m'))
        // ->where('data', '=', $dataTwo->format('Y-d-m'))
        ->join('membros', 'membros.id', '=', 'dizimos.membro_id') 
        ->whereBetween('data', [$dataOne->format('Y-m-d'), $dataTwo->format('Y-m-d')])
        ->orderBy('data')
        ->get();

        //  dd($consulta);
        

        // $consulta = DB::table('membro')
        // ->join ('dizimo', 'membro.id', '=', 'dizimo.membro_id')
        // ->where('membro.id', $id)
        // ->get();

        return($consulta);
    }

    public function dataPorExtenso(){
        
    }
 
     
}
