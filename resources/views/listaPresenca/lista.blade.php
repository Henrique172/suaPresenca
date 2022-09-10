
@extends('layouts.main')

@section('title', 'Membros Sua Presença')

@section('content')
<h1 class="text-center">Lista de Presenca</h1>
<?php
foreach ($find as  $value){
	echo $value['nome']; 
	echo '<br />';
}
?>
@endsection