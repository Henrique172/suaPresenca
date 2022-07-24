<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batismos extends Model
{
    use HasFactory;

    public function atualizar($request){ 

            membros::where('id', $request->membro_id)->update(['certificado' => 1]);
            membros::where('id', $request->membro_id)->update(['batizado' => 1]);
            membros::where('id', $request->membro_id)->update(['dataBatismo' => $request->data]);
    }
}
