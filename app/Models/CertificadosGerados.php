<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File;
use App\models\Membros;

class CertificadosGerados extends Model
{
    use HasFactory;

    public function add($request, $nomeArquivo, $id){
        $model = new CertificadosGerados();
        $membros = new Membros();

        $verifica = CertificadosGerados::where('membro_id', $id)->get();
        
        if(isset($verifica[0])){
            // dd($verifica[0]->nome);

            $nomeDelete = public_PATH().'/'.'certificado/'.$verifica[0]->nome;
            // dd($nomeDelete);

            File::delete($nomeDelete);
            
            Membros::where('id', $id)->update(['dataBatismo' => $verifica[0]->data]);
            CertificadosGerados::where('membro_id', $id)->update(['nome' => $verifica[0]->nome]);
            // CertificadosGerados::where('membro_id', $id)->update(['data' => $verifica[0]->data]);
            
        }else{
            // die('else');
            
                    $model->nome = $nomeArquivo;
                    $model->membro_id = $id;
            
                    $model->save();
        }



    }
}
