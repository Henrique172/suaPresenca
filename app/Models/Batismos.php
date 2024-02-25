<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batismos extends Model
{
    use HasFactory;

    public function atualizar($membro)
    {
        $data = DateTime::createFromFormat('d/m/Y', $membro->dataBatismo);

        
        $teste =  membros::where('id', $membro->id)->update([
            'certificado' => 1,
            'batizado' => 1,
            'dataBatismo' => $data
            
        ]);
        // dd('teste', $teste);
    }
}
