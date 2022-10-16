

<div id="pdf"  style="margin: 0 auto">

    
    @php

            $image = '/img/papelTimbrado.jpg';
            $data = new dateTime($consulta ? $consulta[0]->data_dizimo :'');

            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            // dd($data);
            strftime('%A %d de %B de %Y', strtotime($data->format('m/d/Y')))

    @endphp
            <img src="{{ public_path(). $image }}" alt="" width="100%">
        <div class="fundo">
            
            <h1 style="text-align:center"> {{ isset($consulta[0]) ?  'Relatorio de Dizimos do Mês de  '.strftime('%B de %Y', strtotime($data->format('m/d/Y'))) : 'Nao a dizimo cadastrado nesse mes' }}</h1>
            <br />
            @php $valor = 0; @endphp
            @foreach($consulta as $find)
            @php 
            $date = new dateTime($find->data)  @endphp
            <ul>
                <li><b>{{ $find->nome }}</b> Valor de <b>R$ {{number_format($find->valor ,2,",",".")}}</b>  no dia  {{ $date->format('d/m/Y') }}</li>
            </ul>
            @php
           
             $find->valor ++;
            //   dd('dddd');
                $total = $valor += $find->valor;
            @endphp
            @endforeach
            <h2>Total: R$ {{ number_format($total ,2,",",".") }}</h2>
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


