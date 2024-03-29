

<div id="pdf"  style="margin: 0 auto">

    
    @php
    // dd($consulta['consultaDizimos']);
        // $consulta = $consulta['consultaDizimos'];
            $image = '/img/papelTimbrado.jpg';
            $data = new dateTime($consulta ? $consulta[0]->data :'');
            // dd($consulta[0]);

            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
           

            // dd($data);
            @endphp
            <img src="{{ public_path(). $image }}" alt="" width="100%">
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
                        @foreach($find->dizimos as $dizimos)
                            <tr>
                                <td scope="row">{{$i ++ }}</td>
                                <td>{{mb_strtoupper($dizimos->membro->nome)}}</td>
                                <td>R$ {{number_format($dizimos->valor ,2,",",".")}}</td>
                                <td>{{$find->tipo == 0 ? 'Oferta': 'Dizimo'}}</td>
                            </tr>
                            @php 
                                $dizimos->tipo == 1 ? $totalDizimo += $dizimos->valor :  $totalTotal += $dizimos->valor ;                          
                                $totalArrecadado = $totalArrecadado += $dizimos->valor;
                            @endphp
                            @endforeach
                            @endforeach
                            <br />
                        </table>
                        <div class="total">
                            <b>Total Dizimo: </b>R$ {{number_format($totalDizimo, 2,",",".")}}
                            <b>Total Oferta: </b>R$ {{number_format($totalTotal, 2,",",".")}}
                            <b>Total Arrecadado: </b>R$ {{number_format($totalArrecadado, 2,",",".")}}
                            
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
    margin-top: -950px;
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
    font-size: 15px;
}
.total b{
    padding-left: 25px;
    font-size: 17px;
}
.assinatura b{
    padding-left: 20px;
}

.assinatura{
    text-align:center;
}
.page-break{
   page-break-after: always;
}

</style>


