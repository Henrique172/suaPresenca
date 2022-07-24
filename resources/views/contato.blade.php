@extends('layouts.main')

@section('title', 'Comunidade Sua Presenca')

@section('content')

<div id="events-container" class="col-md-12">
<div class="row">
<div class="col-md-12">

    
    <div class="text-center" id="sobre-container">
        
        <h1>Contato</h1>
    </div>
    <div id="contatos" class="col-md-12">
        <b><ion-icon name="call-outline"></ion-icon>Telefone</b>: 61 9.0000-0000
    </div>
    <div id="contatos" class="col-md-12">
        <b><ion-icon name="location-outline"></ion-icon>Endereco</b>: AC 104 Santa Maria Sul
    </div>
    <div id="enderecoMap" class="col-md-12">
        {{-- <p>Endereco do adoratorio</p> --}}
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122706.66393309341!2d-48.10790253451729!3d-16.035195834491727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935980f9e6882dad%3A0xc8727d76236d424c!2sAC-104%20-%20Santa%20Maria%2C%20Bras%C3%ADlia%20-%20DF!5e0!3m2!1spt-BR!2sbr!4v1649997779140!5m2!1spt-BR!2sbr" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
</div>

@endsection