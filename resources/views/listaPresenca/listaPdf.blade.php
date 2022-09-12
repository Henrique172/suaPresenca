
@extends('layouts.main')

@section('title', 'Lista de Chamada')

@section('content')
<h1 class="text-center">Lista de Presenca</h1>

@php 
$timestamp = strtotime("+7 days");
// dd(date('d/m/Y', $timestamp));
$repeticao = 1;
@endphp
<div class="row">
	<div class='col-sm-8 col-md-8'>
		
		<table class='table' >
			<tr >
				<th>NOME</th>
				<th>{{date('d/m/Y', $timestamp)}}</th>
					{{-- <th>NAO</th> --}}
				</tr>
				@foreach ($find as  $value):
				
			   <tr >
				   <td style='width:620px'>{{$value->nome}}</td> </td>
				   <td></td>
				   {{-- <td>eduluz197...</td> --}}
				   <td>
					   
				   </td>
				   @endforeach
			   </tr> 
		</table>
		
	</div>
	
	
</div>
<style>

	td{
		border: 1px solid black;
		padding:10px
	}
	h1{ 
		text-align: center;
	}

</style>
@endsection
