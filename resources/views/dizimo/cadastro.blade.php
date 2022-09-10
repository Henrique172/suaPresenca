@extends('dashboard.main')
@section('title', 'Dashboard Sua Presença')

@section('contentDashboard')

<div class="formDizimo">
  <div class="row">
    <div class="col-md-12 " style="border-top: 5px solid red; margin: 0 auto">

      
      <h2 class="text-center">CADASTRO DE DIZIMO DO DIA {{ date('d/m/Y') }} </h2>
      <form action="/dizimoAdd" method="post" enctype="multipart/form-data">
        @csrf

        <div class="col-sm-5" style=" margin: 0 auto">
          <select name='membro_id' class="form-control">
            <option  disabled selected>Selecione o Membro</option>
            @foreach($membros as $value)
            <p>--------------------------</p>
            <option value='{{ $value->id }}'>{{$value->nome}}</option>
            @endforeach
         </select>
        </div>

        <br />
        <input name="data" type="hidden" value="{{ date('d/m/Y') }}"/>

        <div class="form-group col-sm-2" style=" margin: 0 auto">
          <label for="title">Valor do Dizimo</label>
          <label for="dinheiro">R$</label>
          <input type="Text" class="form-control" id="valor" name="valor" size="12"placeholder="Digite o Valor"onKeyUp="mascaraMoeda(this, event)"  value="">

          {{-- <input type="text" class="form-control" id="valor" name="valor" placeholder="EX:. 124.65"> --}}
        </div>
        <br />
        <div class="form-group col-sm-2" style=" margin: 0 auto">
          <select name="tipo" class="form-control col-sm-12">
            <option value="0">Oferta</option>
            <option value="1">Dizimo</option>
          </select>
        </div>
        <br />
        <div class="text-center" style="padding-bottom:30px">

          <input type="submit" class="btn btn-warning" value="Registrar">
        </div>
      </form>
    </div>
  </div>
</div>

</div>
    
    @endsection

    <script>
      String.prototype.reverse = function(){
  return this.split('').reverse().join(''); 
};

function mascaraMoeda(campo,evento){
  var tecla = (!evento) ? window.event.keyCode : evento.which;
  var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
  var resultado  = "";
  var mascara = "##.###.###,##".reverse();
  for (var x=0, y=0; x<mascara.length && y<valor.length;) {
    if (mascara.charAt(x) != '#') {
      resultado += mascara.charAt(x);
      x++;
    } else {
      resultado += valor.charAt(y);
      y++;
      x++;
    }
  }
  campo.value = resultado.reverse();
}
    </script>