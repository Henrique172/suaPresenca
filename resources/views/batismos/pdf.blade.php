

<div id="pdf"  style="margin: 0 auto">

    
    @php

            $image = '/img/papelTimbrado.jpg';
            $data = new dateTime(!$consulta ? $consulta[0]->data :'');

    @endphp
            <img src="{{ public_path(). $image }}" alt="" width="100%">
        <div class="fundo">

            
            <h1 style="text-align:center"> {{ isset($consulta[0]) ?  'RELATORIO DE BATIZADOS ' : 'Nao há batizado nesse periodo' }}</h1>
            <br />
            <table class="table table-striped">
                <tr>
                    <td>Nome</td>
                    <td>Data de Batismo</td>
                    <td>Certificado ja foi Gerado</td>
                </tr>
            @foreach($consulta as $find)
            @php 
                $dataBatismo = new dateTime($find->dataBatismo);
            @endphp
                <tr>
                    <td id="nome"><b>{{ $find->nome }}</b> </td>
                    <td><b>{{$dataBatismo->format('d/m/Y')}}</b> </td>
                    <td><b>{{ $find->certificado == 1? 'Sim': 'Nao' }}</b> </td>
                </tr>
                @endforeach 
            </table>
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
table ,tr ,td{

    border: 1px solid #ccc;
    text-align:center;
}
table {
    width: 100%;

}
#nome{
    width: 60%
}

</style>


