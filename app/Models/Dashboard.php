<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    public function contarBatizdos(){

        $batizados = Membros::where('batizado', '1')->get();

        $count = 0;
        foreach($batizados as $find){

                $count ++;
        }


        return($count);
    }
}
