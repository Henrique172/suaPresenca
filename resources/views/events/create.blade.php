@extends('layouts.main')

@section('title', 'Adicionar Evento')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie seu evento </h1>
    <form action="/events" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem do Evento:</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento">
        </div>
        <div class="form-group">
            <label for="title">Data do Evento:</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento">
        </div>
        <div class="form-group">
            <label for="title">O evento e privado?</label>
            <select class="form-control" name="private" id="private">
                <option value="0">Nao</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Titulo:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Digite um Titulo">
        </div>
        <div class="form-group">
            <label for="title">Descricao:</label>
            <textarea class="form-control" id="description" name="description" placeholder="O que vai acontecer no evento">

            </textarea>
        </div>
        <div class="form-group">
            <label for="title">Adicione itens de infraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="louvor"> Louvor
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="palavra de oferta"> Palavra de Oferta
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="palavra de edificacao"> Palavra de Edificacao
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="pregacao"> Pregacao
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="lanche"> Lanche
                </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Criar evento">
    </form>
</div>
@endsection