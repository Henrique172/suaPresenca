@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Todos Eventos</h1>
</div>


<div class="col-md-10 offset-md-1 dashboard-events-container">
        <div class="col-md-12 text-end">
                <a href="/events/create" class="btn btn-success">Criar Eventos</></a>
        </div>
        @if(count($events) >0)
        <table class="table">
                <thead>
                        <th scope="col">#</th>
                        <th scope="col">Imagens</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Data Criaçao</th>
                </thead>
                <tbody>
                        @foreach ($events as $event)
                        
                        <tr>
                                <td scope="row" id="id">{{ $loop->index +1 }}</td>
                                <td> <a href="/events/{{$event->id}}"> <img src="/img/events/{{$event->image}}"  alt="{{ $event->title }}" style="width:60px; border-radius:30px"> </a> </td>
                                <td><span style="text-transform: uppercase;">{{ $event->title }}</span></td> 
                                <td> {{ $event->user->name }}</span></td>
                                <td> {{ date('d/m/Y'), strtotime( $event->date) }}
                                        {{-- <a href="#"> <ion-icon name="pencil-outline" class="btn btn-primary"></ion-icon></a> 
                                   
                                        <form action="/events/del/{{$event->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                                ssdsd<ion-icon name="trash-outline"></ion-icon>
                                        </button>
                                   </form> --}}
                                </td>
                        </tr>
                        
                        @endforeach
                </tbody>
        </table>
        @else
        <p>Voce ainda nao tem eventos criado, <b><a href="/events/create"> Criar Evento</a></b></p>
        @endif
</div>
@endsection