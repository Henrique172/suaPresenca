@extends('layouts.main')

@section('title', 'Comunidade Sua Presenca')

@section('content')
<div class="row">
    <div id="events-container" class="col-md-12">
        
        <div class="text-center" id="sobre-container">
            
            <h1>Sobre Nos</h1>
            <h2 style="color:rgb(91, 91, 91)">Comunidade Sua Presenca </h2><br />
            <p>A Comunidade Sua Presença nasceu no dia 1 de março de 2012 em 
                obediência a direção do Espírito Santo de Deus.
            </p>
            <div id="descricaoQuemSomos" class="text-center">
                <p style=" text-align: justify;">
                    No principio apenas fomos obedientes, não entendendo e não sabendo qual 
                    seria o porque do Senhor nos separar. Após algum tempo de caminhada 
                    começamos a entender o propósito de Deus e seu desejo,
                    que era nos levar de volta aos fundamentos da palavra. (Jr 6:16)
                </p>
            </div>
        </div>
    </div>
    <div id="fotoAp" class="col-md-12 text-center">
        <h1>Pastor Presidente</h1>
        <h3>Apostolo Celio Gaya</h3>
    </div>
    <div id="foto" class="col-md-12 text-center">
        <img src="/img/apPequeno.png" alt="Apostolo Celio Gaya" >
    </div>
    <br />
    <br />
    @endsection 
    
    </div>
    <style>
        #foto img{
            
        /* width: 200px;
        height: 250px; */
        /* padding-bottom: 50px */
    }
</style>