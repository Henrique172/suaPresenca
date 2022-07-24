<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Membros;
use App\Models\User;
use File;

class MembrosController extends Controller
{
    

    public function index(){

        $find = Membros::all();


        return view('membros.index', ['find' => $find]);
    }

    public function add (Request $request){
        
        $membro = new Membros;
        

        $membro->nome = $request->nome;
        $membro->dataMembro = $request->dataMembro;
        $membro->dataNascimento = $request->dataNascimento;
        $membro->endereco = strtoupper($request->endereco);
        $membro->celular = $request->celular;
        $membro->batizado = $request->batizado;
        $membro->certificado = 0;
        $membro->status = 0;

        // dd($request->batizado);


        // image Upload
        if($request->hasFile('foto') && $request->file('foto')->isValid()){

            $requestImage = $request->foto;
            $extension =$requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $requestImage->move(public_path('img/membros'), $imageName);

            $membro->foto = $imageName;

        }

        $membro->save();

        return redirect('/membros')->with('msg', 'Membro Cadastrado com Sucesso!');

    }

    public function edit($id){
        $membro = Membros::findOrFail($id);

        // dd($membro);

        return view ('membros.edit', ['membro' => $membro]);
    }

    public function update(Request $request){

        $find =  Membros::findOrFail($request->id);
        
        $membros = new Membros;
        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            
            $requestImage = $request->foto;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $requestImage->move(public_path('img/membros'), $imageName);

            
        }

        // DELETA FOTO ANTIGA PARA ADICIONAR A NOVA
        // SE FOR ALTERADA DELETA A ANTIGA
        if(isset($imageName)){
            File::delete('img/membros/'.$find->foto);
        }
        
        
        // $membros->edit($request, $imageName);
        // dd($imageName);
        
        
        
        Membros::findOrFail($request->id)->update($request->all());
        Membros::findOrFail($request->id)->update(['foto' => isset($imageName) ? $imageName: $find->foto ]);
        
        if($request->all()['acesso_privilegiado'] == 1){
            $user = new User;
            dd($request->all()['nome']);
            dd($user->name = $request->all()['nome']);

            
            }

        // $membro = new Membros;


        return redirect('/membros')->with('msg', 'Membro '.$find->nome .' Editado !');
    }

}
