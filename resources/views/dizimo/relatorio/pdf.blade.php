

<div id="pdf"  style="margin: 0 auto">

    
    @php

            $image = '/img/papelTimbrado.jpg'; 
            $data = new dateTime(!$consulta ? $consulta[0]->data :'');

    @endphp
            <img src="{{ public_path(). $image }}" alt="" width="100%">
        <div class="fundo">
            
            <h1 style="text-align:center"> {{ isset($consulta[0]) ?  'RELATORIO DE DIZIMO '.$consulta[0]->nome : 'Nao a dizimo cadastrado nesse mes' }}</h1>
            <br />
            @php $valor = 0; @endphp
            @foreach($consulta as $find)
            @php $date = new dateTime($find->data)  @endphp
            <ul>
                <li><b>{{ $find->nome }}</b>{{ $find->tipo == 0?' Oferta':' Dizimo' }} no Valor de <b>R$ {{$find->valor}}</b>  no dia  {{ $date->format('d/m/Y') }}</li>
            </ul>
            @php
            // $find->valor ++;
                $total = $valor += $find->valor;
            @endphp
            @endforeach
            <h2>Total: R$ {{ $total }},00</h2>
        </div>
    </div>
<style>

.pdf img{
    width: 80%;    
    height: 20%;
}
 /* #pdf h1{
    font-size: 120px;
    opacity: 0.1;
    transform: rotate(30deg);
    margin-top:500px;
} */
.fundo{
    margin-top: -950px;
} 

</style>


