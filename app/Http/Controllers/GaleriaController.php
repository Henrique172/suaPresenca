<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Galeria;

class GaleriaController extends Controller
{
    public function index() {
        
       
        $findAll = \App\Models\Galeria::all();
       


    return view ('galeria.index', ['findAll' => $findAll]);
    }

    public function form(){

        return view ('galeria.form');
        
    }

    public function add ( request $request){

        $galeria = new Galeria;

        $galeria->title = $request->title;
        $galeria->description = $request->description;
        
        // image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){
            
            $requestImage = $request->image;
            $extension =$requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $requestImage->move(public_path('img/galeria'), $imageName);
            
            $galeria->image = $imageName;
            
        }
        $galeria->save();

            return redirect('/galeria')->with('msg', 'Galeria de Fotos Atualizado com Sucesso!');

    }

    public function show($id){
        $galeria = new Galeria;

        $fotos = $galeria->find($id);

        return view ('galeria.show', ['fotos'=> $fotos]);
    }

}
