@extends('layouts.main')
@php $title = 'Descricao do Evento'.' '. $event->title @endphp
@section('title', $title )

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/events/{{$event->image}}" class="img-fluid" alt="{{ $event->title }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{$event->title}}</h1>
                <p class="event-city">
                    <ion-icon name="location-outline"></ion-icon>
                    {{ $event->city }}
                </p>
                <p class="event-participants">
                    <ion-icon name="people-outline"></ion-icon>
                        X Participantes 
                </p>
                <p class="event-owner">
                    <ion-icon name="star-outline"></ion-icon>
                    <b>Criado por:</b>  {{ $event->user->name }}
                </p>
                <div class="col-md-12" id="description-container">
                    <h3>Sobre o Evento: </h3>
                    <p class="event drescription">{{ $event->description }}</p>
                </div>
                <a href="#" class="btn btn-primary" id="event-submit">Confirmar Presenca</a>
                @isset($event->items)
                <h3>O Evento conta com:</h3>
                <ul id="items-list">
                    @foreach($event->items as $item) 
                    <li style="text-transform: uppercase;"><ion-icon name="play-outline"></ion-icon><span>{{ $item }}</span></li>
                    @endforeach
                </ul>
                @endisset
            </div>
        </div>
    </div>

@endsection