@extends('layouts.main')

@section('title', 'Editar Relatorio de Culto')

@section('content')
<form action="/rel/update/{{ $relatorio->id }}" method="post" >
  @csrf
  @method('PUT')
  <div class="container col-sm-10">
    <div class="row">
      @php $data = new dateTime($relatorio->data); @endphp 
      {{-- <div class="form-row"> --}}
        <h2 class="text-center">Editando Relatorio do dia  {{ $data->format('d/m/Y') }}</h2>
        <h2 class="text-center">IGREJA COMUNIDADE SUA PRESENÇA</h2>
        <br />
        <br />
        <br />
        <div class="form-group col-md-4">
          <label>Pregador</label>
          <input type="text" class="form-control" name="pregador" placeholder="Pregador da Noite" value="{{ $relatorio->pregador }}">
        </div>
        <div class="form-group col-md-5">
          <label>Endereço</label>
          <input type="text" readonly="readonly" name="endereco" value="AC 104 CONJ. A LOTE 18 - SANTA MARIA" class="form-control">
        </div>
      {{-- </div> --}}
      <div class="form-group col-sm-3">
        <label>Visitantes</label>
        <input type="number" name="visitantes" class="form-control" placeholder="Qtds de Visitantes" value="{{ $relatorio->visitantes }}">
      </div>
      <div class="form-group col-sm-3">
        <label>Qntd Membros</label>
        <input type="number" name="qtds_membros" class="form-control" placeholder="Qtd Pessoas" value="{{ $relatorio->qtds_membros }}" >
      </div>
        <div class="form-group col-md-3">
          <label >Horario</label>
          <input type="text" name="horario" class="form-control" placeholder="Horario de Inicio" value="{{ $relatorio->horario }}">
        </div>
      <div class="form-group">
        <br />
      </div>
      <br />
      <div class=" text-center">

        <button type="submit" class="btn btn-warning">Editar Relatório</button>
      </div>
    </div>
    </div>
</form>






<script>

  //<![CDATA[
// $(window).on('load', function () {
//     $('#preloader .inner').fadeOut();
//     $('#preloader').delay(150).fadeOut('slow'); 
//     $('body').delay(150).css({'overflow': 'visible'});
// })
//]]>

</script>

<style>
  .container{
    padding: 50px
  }
</style>

@endsection