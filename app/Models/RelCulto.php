<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;

class RelCulto extends Model
{
    use HasFactory;
    protected $table = 'relCultos';

    public function relCultoDizimo($request){   
       $data = new DateTime($request->data);
        // dd($data->format('Y-m-d'));
        
        $consulta = DB::table('relCultos')
        ->leftjoin('dizimos', 'relCultos.data', '=','dizimos.data')
        ->leftjoin('membros', 'dizimos.membro_id', '=','membros.id')
        ->where('relCultos.data', $data->format('Y-m-d'))
        ->get();

        // $consultaDizimos = DB::table('dizimos')
        // ->where('dizimos.data', $data->format('Y-m-d'))
        // ->get();

        // dd($consulta);

        return($consulta);
       
    }

    public function relId($request){
        $find = Model::find($request->id);

        // dd($find);

        $data = new DateTime($find->data);
        // dd($data->format('Y-m-d'));
        
        $consulta = DB::table('relCultos')
        ->leftjoin('dizimos', 'relCultos.data', '=','dizimos.data')
        ->leftjoin('membros', 'dizimos.membro_id', '=','membros.id')
        ->where('relCultos.data', $data->format('Y-m-d'))
        ->get();

        // $consultaDizimos = DB::table('dizimos')
        // ->where('dizimos.data', $data->format('Y-m-d'))
        // ->get();

        // dd($consulta);

        return($consulta);


    }

}






 // $consulta = DB::table('relCultos')
        // ->join('dizimos', 'relCultos.data', '=', 'dizimos.data')
        // ->where('relCultos.data', $data->format('Y-m-d'))
        // ->get();
        // dd($consulta);