@extends('dashboard.main')
@section('title', 'Dashboard Sua Presença')

@section('contentDashboard')

<div class="content"  style="margin: 0 auto">

    {{-- <table class=""> --}}
        @php
            $data = date('m/Y', strtotime($consulta[0]->data));
            // dd($data);
        @endphp

        <h3 style="text-align:center">Relatorio de Dizimo de {{ $consulta[0]->nome ?  $consulta[0]->nome : $data }}</h3>
        @foreach($consulta as $find)
        <ul>
            <li>Dizimo no valor de {{$find->valor}} no dia {{ $find->data }}</li>
        </ul>
        @endforeach
    {{-- </table> --}}
</div>


    @endsection
