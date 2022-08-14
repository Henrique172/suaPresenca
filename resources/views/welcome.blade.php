@extends('layouts.main')

@section('title', 'Comunidade Sua Presenca')
   
    
            
@section('content')
<div id="search-container" >
    {{-- <h1>Busque um Evento</h1> --}}
    {{-- <form action="/" method="get">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar Evento....">
    </form> --}}
    
    {{-- <img src="/img/logo-preta.jpg" alt="sua presenca" width="100%" height=""> --}}

      
      <div class="slide-content" >
          <img class="mySlides" src="img/vetorLogoSuaPresenca.png" style="width:100%; height:100%">
          {{-- <img class="mySlides" src="/img/logoVermelha.jpg" style="width:100%">
          <img class="mySlides" src="/img/logoBranca.jpg" style="width:100%"> --}}
        </div>
        
    </div>


<div id="events-container" class="col-md-12" >
   
    
    {{-- <div>Normal</div>
<div class="example">Rotated</div> --}}


    @if($search)
    <h2>Buscando por: <b>{{ $search }}</b></h2>
    @else 
    <h2 style="color:rgb(8, 4, 115); font-family:Bradley Hand">SUA PRESENCA NEWSss1 <hr> </h2>
    {{-- <h2>AGENDA</h2> --}}
    {{-- <h2>Proximos Eventos</h2> --}}
    <p class="subtitle" style="font-size:25px">Os eventos da nossa igreja você encontra aqui</p>
    @endif 

    <div id="card-container" class="row">
        @foreach ($events as $event)
        <div class="card col-md-3">
            <img src="/img/events/{{$event->image}}"  alt="{{ $event->title }}">
            <p class="card-date">{{ date('d/m/Y'), strtotime($event->date) }}</p>
            <h5 class="card-title">{{ $event->title }}</h5>
            {{-- <p class="card-participants">X Participantes</p> --}}
            {{-- <a href="/events/{{$event->id}}" class="btn btn-primary">Saber Mais</a> --}}
            
        </div>
        @endforeach
        @if(count($events) == 0)

        <p>Nao ha eventos disponivel no momento</p>
        @endif
    </div>
</div>

   
<script>
    var myIndex = 0;
    carousel();
    
    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 3000); // Change image every 2 seconds
    }
    </script>
@endsection





