@extends('layouts.main')

@section('title', 'Comunidade Sua Presenca')

@section('content')
<div class="col-md-10 text-end" style="margin-top:20px; margin-bottom:30px">
  <a href="/galeriaForm" class="btn btn-success">Adicionar Imagem</></a>
</div>
<div class="col-md-12 offset-md-1" id="cards">
    <div class="row">

@foreach ($findAll as $find)
<div class="card " style="width: 18rem;">
    <img src="/img/galeria/{{ $find->image }}"  width="20px" height="250px" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ $find->title }}</h5>
      <a href="/galeria/ {{$find->id}}"><div class="btn btn-danger">Ver Fotos</div></a>
    </div>
  </div>
  @endforeach
    </div>
</div>
@endsection