
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
	<h2>LISTA DE PRESENÇA DE <?= strftime('%A', strtotime($data->format('m/d/Y'))) == 'domingo'? 'TODOS OS': 'TODAS AS' ?>  {{ strtoupper( strftime('%A', strtotime($data->format('m/d/Y')))); }} DO MES</h2>
	@php 
	// dd(strftime('%A', strtotime($data->format('m/d/Y'))));
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
	<b style="margin-left: 350px">LEGENDAS: <span style="color:rgb(49, 158, 6)">P</span> = Presença <span style="color:red">F</span> = Falta <span style="color:rgb(255, 255, 4)">V</span> = Viajando</b>
	<div class='col-sm-8 col-md-8'>
		<br />
		<br />
		<br />	
		<table class='table' >
			<b> Quantidade de Membros: {{ count($find) }}</b> 
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
				@php 
				$dataNasc = new datetime($value->dataNascimento);
				$date = $dataNasc->format('Y');
				$corCrianca = date('Y')  - $date < 10 ? '#add8e6':'';
				@endphp

			{{-- ESSE IF ABAIXO SERVE PARA TIRAR O OFERTANTES DA LISTA DE MEMBRO --}}
				@if($value->nome <> 'OFERTANTES')
			   <tr style=" background-color: {{ $corCrianca}}">
				   <td style='width:460px; font-size:11px'>{{mb_strtoupper($value->nome)}}</td> </td>
				   <td ></td>
				   <td></td>
				   <td></td>
				   {{-- <td>eduluz197...</td> --}}
				   <td>
					   
				   </td>
				   @endif
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
		margin-top: -1030px;
		/* background-image: "/img/papelTimbrado.jpg"; */
} 

</style>
