@extends('dashboard.main')
@section('title', 'Dashboard Sua Presença')

@section('contentDashboard')

<div class="content"  style="margin: 0 auto">

    {{-- <table class=""> --}}
        @php
            // dd($consulta);
            $data = new dateTime(!$consulta ? $consulta[0]->data :'');
        @endphp

        <h3 style="text-align:center"> {{ isset($consulta[0]) ?  'Relatorio de Dizimos do mes '. $data->format('m'). ' de '. $data->format('Y') : 'Nao a dizimo cadastrado nesse mes' }}</h3>
        @foreach($consulta as $find)
        @php $date = new dateTime($find->data)  @endphp<br />
        <ul>
            <li>{{ $find->nome }} valor de {{$find->valor}} no dia {{ $date->format('d/m/Y') }}</li>
        </ul>
        @endforeach
    {{-- </table> --}}
</div>


    @endsection
