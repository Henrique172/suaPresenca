@extends('layouts.main')

@section('content')
@section('title', 'Batismo' )
<br />
<h1 class="text-center">Tela Incial de Batismo</h1>
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <b>Quantidade de Batizado: {{ count($count) }}</b>
      </div>
      <br />
      <br />
      <br />
      <div class="col-md-6">
        
        

        <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Relatorio de batizados
                  </button>
                </h5>
              </div>
          
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body text-center" >

                    <form action="/batismoRelatorio" method="post">
                      @csrf
                        {{-- <input name="data" placeholder="Digite a Data" class="form-control" /> --}}
                        <br />
                        <button class="btn btn-primary">Gerar Relatorio</button>
                    </form>
                        
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingOne1">
                <h5 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1">
                    Gerar Certificado
                  </button>
                </h5>
              </div>
          
              <div id="collapseOne1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body text-center" >

                  <div class="panel">

                    <form action="/gerarCertificado" method="post">
                        @csrf
                        <select name='membro_id' class="form-control">
                            <option value="0" disabled selected>Selecione o Membros</option>
                            @foreach($membros as $membro)
                            <option value="{{ $membro->id }}">{{ $membro->nome }}</option>
                            @endforeach
                        </select>
                        <br />
                        <input type="date" name="data" require>
                        <br />
                        {{-- <button class="btn btn-warning">Gerar</button> --}}
                        <br />
                         <input type="submit" class="btn btn-warning" value="Gerar Certificado">
                    </form>
                </div>
                </div>
              </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    <br />
    <br />
    <br />
@endsection