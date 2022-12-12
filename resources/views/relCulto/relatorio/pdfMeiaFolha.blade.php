
<meta charset="utf-8"/>
<div id="pdf"  style="margin: 0 auto">

    
    @php
    // dd($consulta['consultaDizimos']);
    // dd($consulta);
        // $consulta = $consulta['consultaDizimos'];
            $image = '/img/papelTimbrado.jpg';
            $data = new dateTime($consulta ? $consulta[0]->data :'');

            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
           

            // dd($data);
            @endphp
            <img src="{{ public_path(). $image }}" alt="" width="100%" height="50%">
            <div class="fundo">
                <h1 style="text-align:center; font-size:17px">  RELATORIO DE CULTO + DIZIMOS <br />{{  strftime('%A %d de %B de %Y', strtotime($data->format('m/d/Y'))); }}</h1>
            <hr/>
                <div class="relatorioCulto">
                        <b>Pregador:</b> {{ $consulta[0]->pregador }}      
                        <b>Horario:</b> {{ $consulta[0]->horario }}
                        <b>Visitantes:</b> {{ $consulta[0]->visitantes }}
                        <b>Pessoas Presentes:</b> {{ $consulta[0]->qtds_total }} 
                     </div>
                    <hr/>
                    <hr/>
                     <table class="table">
                           <tr>
                             <th scope="col"style="width:30px">#</th>
                             <th scope="col" style="width:300px">Nome</th>
                             <th scope="col" style="width:90px">Valor</th>
                             <th scope="col">Dizimo / Oferta ?</th>
                           </tr>
                           @php 
                                $i = 1;
                                $totalDizimo = 0; 
                                $totalTotal = 0; 
                                $totalArrecadado = 0; 
                           @endphp




                     @foreach($consulta as $find)
                     {{-- @php if($find->valor <> ''):@endphp --}}
                     @if($i == 8)
                     {{-- @php dd($find); @endphp --}}
                     <div style="display: block; page-break-before: always;"></div>
                     @endif
                            <tr>
                                <td scope="row">{{$i ++ }}</td>
                                <td>{{mb_strtoupper($find->nome)}}</td>
                                <td>R$ {{number_format($find->valor ,2,",",".")}}</td>
                                <td>{{$find->tipo == 0 ? 'Oferta': 'Dizimo'}}</td>
                            </tr>
                            @php 
                                $find->tipo == 1 ? $totalDizimo += $find->valor :  $totalTotal += $find->valor ;                          
                                $totalArrecadado = $totalArrecadado += $find->valor;
                            @endphp
                            {{-- @php endif; @endphp --}}
                            @endforeach
                            <br />
                        </table>
                        <div class="total">
                            <b>Total Dizimo: </b>R$ {{number_format($totalDizimo, 2,",",".")}}
                            <b>Total Oferta: </b>R$ {{number_format($totalTotal, 2,",",".")}}
                            <b>Total Arrecadado: </b>R$ {{number_format($totalArrecadado, 2,",",".")}}
                            <b>10% Davi Rebollo: </b>R$ {{number_format($totalDizimo * 10 / 100, 2,",",".")}}
                        </div>
                        <br />
                        <br />
                        <br />
                        <br />
                        <div class="assinatura">
                            <b>________________________________________</b><br />
                            <b>Aline - Tesoureiro Responsável</b>
                        </div>



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
    margin-top: -500px;
} 
.relatorioCulto b{
    padding: 10px; 
}
.table td{
    text-align: left;
    border: 0.1px solid black;
    padding:5px
}
.table{
    /* text-align: center */
}
.total {
    font-size: 13px;
}
.total b{
    padding-left: 15px;
    font-size: 14px;
}
.assinatura b{
    padding-left: 20px;
}

.assinatura{
    text-align:center;
}


</style>


