@extends('layouts.main')

@section('title', 'Comunidade Sua Presenca')

@section('content')

{{-- <div class="text-center">

    <h1><b>{{ $fotos->title }}</b></h1>
        <p style="font-size:30px; color:#CCC">{{ $fotos->description }}</p>
</div> --}}

<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 280px;
  height: 200px;
}

div.gallery:hover {
  border: 2px solid #777;
  /* width:10%;
  height: 10%; */
}

div.gallery img {
  width: 100%;
  height: 80%;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>
</head>
<body>
  @auth
  @if (Auth::user()->perfil == 2 && 9)
  <div class="col-md-10 text-end" style="margin-top:20px; margin-bottom:30px">
    <a href="/galeriaForm" class="btn btn-success">Adicionar Imagem</></a>
  </div>
  @endif
  @endauth
  @foreach($findAll as $find)
  <div class="gallery" style="margin-top:90px">
    <a target="_blank" href="/img/galeria/{{$find->image}}">
      <img src="/img/galeria/{{$find->image}}" alt="{{$find->title}}" width="600" height="400">
    </a>
    <div class="desc">{{$find->title}}</div>
  </div>
@endforeach


</body>
</html>







@endsection