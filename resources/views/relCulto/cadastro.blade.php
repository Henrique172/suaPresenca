@extends('layouts.main')

@section('title', 'Relatorio de Culto')

@section('content')
<!-- início do preloader -->
<div id="preloader">
  <div class="inner">
     <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
     <div class="bolas">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
     </div>
     </div>
     </div>
<form action="/relCultoAdd" method="POST">
  @csrf
  <div class="container col-sm-10">
    <div class="row">
      
      {{-- <div class="form-row"> --}}
        <h2 class="text-center">IGREJA COMUNIDADE EVANGELICA SUA PRESENÇA</h2>
        <br />
        <br />
        <br />
        <div class="form-group col-md-4">
          <label>Pregador</label>
          <input type="text" class="form-control" name="pregador" placeholder="Pregador da Noite">
        </div>
        <div class="form-group col-md-5">
          <label>Endereço</label>
          <input type="text" readonly="readonly" name="endereco" value="AC 104 CONJ. A LOTE 18 - SANTA MARIA" class="form-control">
        </div>
      {{-- </div> --}}
      <div class="form-group col-sm-3">
        <label>Visitantes</label>
        <input type="text" name="visitantes" class="form-control" placeholder="Qtds de Visitantes">
      </div>
      <div class="form-group col-sm-3">
        <label>Qntd Membros</label>
        <input type="text" name="qtds_membros" class="form-control" placeholder="Qtd Pessoas">
      </div>
        <div class="form-group col-md-3">
          <label >Horario</label>
          <input type="text" name="horario" class="form-control" placeholder="Horario de Inicio">
        </div>
      <div class="form-group">
        <br />
      </div>
      <br />
      <div class=" text-center">

        <button type="submit" class="btn btn-success">Registrar</button>
      </div>
    </div>
    </div>
</form>






<script>

  //<![CDATA[
$(window).on('load', function () {
    $('#preloader .inner').fadeOut();
    $('#preloader').delay(350).fadeOut('slow'); 
    $('body').delay(350).css({'overflow': 'visible'});
})
//]]>

</script>

<style>
  .container{
    padding: 50px
  }



  #preloader {
    position:fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-color:#0a0127; /* cor do background que vai ocupar o body */
    z-index:999; /* z-index para jogar para frente e sobrepor tudo */
}
#preloader .inner {
    position: absolute;
    top: 50%; /* centralizar a parte interna do preload (onde fica a animação)*/
    left: 50%;
    transform: translate(-50%, -50%);  
}
.bolas > div {
  display: inline-block;
  background-color: #fff;
  width: 25px;
  height: 25px;
  border-radius: 100%;
  margin: 3px;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  animation-name: animarBola;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
   
}
.bolas > div:nth-child(1) {
    animation-duration:0.75s ;
    animation-delay: 0;
}
.bolas > div:nth-child(2) {
    animation-duration: 1.75s ;
    animation-delay: 0.12s;
}
.bolas > div:nth-child(3) {
    animation-duration: 0.75s  ;
    animation-delay: 0.24s;
}
.bolas > div:nth-child(4) {
    animation-duration: 0.75s  ;
    animation-delay: 0.36s;
}
 
@keyframes animarBola {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 1;
  }
  16% {
    -webkit-transform: scale(0.1);
    transform: scale(0.1);
    opacity: 0.7;
  }
  33% {
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 1; 
  } 
  49% {
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 1; 
  } 
}
/* end: Preloader */

</style>

@endsection