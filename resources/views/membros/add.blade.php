@extends('layouts.main')

@section('title', 'Adicionar Membro')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Adicinando Membros</h1>
    
    <form action="/membrosAdd" method="post" enctype="multipart/form-data">
        @csrf
        <br />
        <div class="form-group">
            <label for="image">Foto de Perfil</label>
            <br />
            <input type="file" id="foto" name="foto" class="form-control-file">
        </div>
        <br />
        <div class="form-group">
            <label for="title">Nome Completo</label>
            <input type="text" class="form-control" required id="nome" name="nome" placeholder="Digital o Nome Completo">
        </div>
        <div class="form-group">
            <label for="title">Sou Membros Desde ?</label>
            <input type="date" class="form-control" required id="dataMembro" name="dataMembro">
        </div>
        <div class="form-group">
            <label for="title">Data de Nascimento</label>
            <input type="date" class="form-control" required id="dataNascimento" name="dataNascimento">
        </div>
        <div class="form-group">
            <label for="title">Endereço</label>
            <input type="text" class="form-control" required id="endereco" name="endereco" placeholder="Digite Endereco Completo">
        </div>
        <div class="form-group">
            <label for="title">Celular</label>
            <input type="tel" class="form-control" maxlength="15" required id="celular" name="celular" placeholder="(XX) XXXXX-XXXX ">
        </div>
        
        <div class="form-group col-md-3">
            <label for="title">E batizado ?</label>
            <select name="batizado" class="form-select">
                <option value="0">Nao</option>
                <option value="1">Sim</option>
            </select>
        </div>

        <br />
        {{-- <input name="certificado" type="hidden" value="0"/> --}}
        <input type="submit" class="btn btn-success" value="Criar evento">
    </form>
</div>
@endsection

<script>
    /* Máscaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('celular').onkeyup = function(){
		mascara( this, mtel );
	}
}
</script>