
<div id="pdf"  style="margin: 0 auto">
{{-- @section('title', 'Lista de Chamada') --}}

<?php
	$image = '/img/papelTimbrado.jpg';
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');
	$data = new DateTime(); 
	// dd(strftime('%A', strtotime($data->format('m/d/Y'))));
?>
<img src="{{ public_path($image) }}"  width="100%" />

<div class="fundo">
	<h2>LISTA DE PRESENCA DE <?= strftime('%A', strtotime($data->format('m/d/Y'))) == 'Domingo'? 'TODOS OS': 'TODAS AS' ?>  {{ strtoupper( strftime('%A', strtotime($data->format('m/d/Y')))); }} DO MES</h2>
	@php 
$timestamp = strtotime("+7 days");
$data    = date("Y/m/d");
$dataSemana = date("d-m-Y", strtotime($data) + (7 * 24 * 60 * 60));
$dataDuasSemana = date("d-m-Y", strtotime($dataSemana) + (7 * 24 * 60 * 60));
$dataTresSemana = date("d-m-Y", strtotime($dataDuasSemana) + (7 * 24 * 60 * 60));
$dataQuatroSemana = date("d-m-Y", strtotime($dataTresSemana) + (7 * 24 * 60 * 60));

// dd($danta);
$repeticao = 1;
@endphp
<div class="row">
	<div class='col-sm-8 col-md-8'>
		<br />
		<br />
		<br />
		<table class='table' >
			<tr >
				<th>NOME</th>
				<th style="transform: rotate(90deg); font-size:10.5px; width:50px; padding-bottom:20">{{date("d/m/Y")}}</th>
				<th style="transform: rotate(90deg); font-size:10.5px; width:50px; padding-bottom:20">{{$dataSemana}}</th>
				<th style="transform: rotate(90deg); font-size:10.5px; width:50px; padding-bottom:20">{{$dataDuasSemana}}</th>
				<th style="transform: rotate(90deg); font-size:10.5px; width:50px; padding-bottom:20">{{$dataTresSemana}}</th>
				{{-- <th style="transform: rotate(90deg); font-size:10.5px; width:50px; padding-bottom:20">{{$dataQuatroSemana}}</th> --}}
					{{-- <th>NAO</th> --}}
				</tr>
				@foreach ($find as  $value):
				
			   <tr >
				   <td style='width:460px; font-size:11px'>{{strtoupper($value->nome)}}</td> </td>
				   <td ></td>
				   <td></td>
				   <td></td>
				   {{-- <td>eduluz197...</td> --}}
				   <td>
					   
				   </td>
				   @endforeach
			   </tr> 
		</table>
		
	</div>
	
	
</div>
</div>
<style>

	td{
		border: 1px solid black;
		padding:10px;
	}
	h1{ 
		text-align: center;
	}
	table{ 
		/* padding-right:60px */
	}
	
	.pdf img{
		width: 80%;    
		height: 20%;
		
	}
	
	.fundo{
		margin-top: -980px;
		/* background-image: "/img/papelTimbrado.jpg"; */
} 

</style>
