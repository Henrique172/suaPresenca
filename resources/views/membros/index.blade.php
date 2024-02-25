@extends('layouts.main')

@section('title', 'Membros Sua Presença')

@section('content')
<h1 class="text-center">Área de Membros</h1>

@auth
  <div class="col-md-10 text-end" style="margin-top:20px; margin-bottom:30px">
    <a href="/membroForm" class="btn btn-danger">Adicionar Membro</></a>
  </div>
  @endauth
<div class="col-md-12">
  {{-- ESSE - 1 (ABAIXO)E DO OFERTANTE QUE ESTA CADASTRADO NA LISTA DE MEMBROS --}}
 <b style="padding-left: 20px;"> Membros ativos:</b> {{ count($find) - $qntdCrianca - count($membrosInativo) - 1 }} <b style="padding-left: 20px; color:red"> Membros Inativos:</b> {{ count($membrosInativo) }} <b style="padding-left: 80px; color:blue"> Crianças:</b> {{ $qntdCrianca }}
</div>

<table class="table col-md-12" id="tableMembro">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">FOTO</th>
      <th scope="col" class="col-md-4">NOME</th>
      <th scope="col" class="col-md-3">ENDEREÇO</th>
      <th scope="col" class="col-md-2">CELULAR</th>
      <th scope="col">DATA NASCIMENTO</th>
      <th scope="col">MEMBRO DESDE</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @php 
      // $pintaCrianca = $qntdCrianca <> ''? 'blue':'';
      $i = 1;
      
      @endphp
      @foreach($find as $membro)
      @php 
      $ativo = $membro->status == 1? 'line-through': '';
      $color = $membro->status == 1? 'red':'';
      $inativo = $membro->status == 1? 'Inativo':'Ativo';

      $dataNasc = new datetime($membro->dataNascimento);
      $date = $dataNasc->format('Y');

      

      // dd(date('Y')  - $date < 10);

      $corCrianca = date('Y')  - $date < 10 ? '#add8e6':'';
      @endphp
    {{-- ##TIRANDO O OFERTANTE DA LISTA DE MEMBROS( SO SERVE PARA CADASTRAR OFERTA )  --}}
    @if($membro->nome <> 'OFERTANTES')
    <tr style="text-decoration: {{ $ativo }}; 
                color:{{ $color }}; 
                background-color: {{ $corCrianca}}">
      <th scope="row" >{{ $i ++ }}</th>
      <td>
          <a href="img/membros/{{$membro->foto}}">
          <img src="img/membros/{{$membro->foto}}" alt="{{$membro->nome}}" width="50" style="border-radius: 50px; height:50px">
        </a>
        </td>
      <td>{{mb_strtoupper($membro->nome)}}</td>
      <td>{{$membro->endereco}}</td>
      <td>{{$membro->celular}}</td>
      {{-- {{ dd( date('d/m/Y', strtotime($membro->dataNascimento))) }} --}}

      <td>{{ date('d/m/Y', strtotime($membro->dataNascimento)) }}</td>
      <td>{{ date('Y', strtotime($membro->dataMembro)) }}</td>
      <td><a style="font-size:10px" href="/membros/edit/{{ $membro->id }}" class="btn btn-info"><ion-icon name="pencil">Editar</ion-icon></a></td>
    </tr>
    @endif 
    @endforeach
  </tbody>
</table>

@endsection





{{-- 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 --}}