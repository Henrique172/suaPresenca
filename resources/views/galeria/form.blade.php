@extends('layouts.main')

@section('title', 'Adicionar fotos')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Adicionar Fotos </h1>
    <form action="/galeriaAdd" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Faca o Upload da Imagem</label><br />
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <br />
        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Titulo da Foto">
        </div>
        <div class="form-group">
            <label for="title">Descricao:</label>
            <textarea class="form-control" id="description" name="description" placeholder="Descricao da foto">
            </textarea>
        </div>
        <br />
        <input type="submit" class="btn btn-primary" value="Adicionar Foto">
    </form>
</div>
@endsection