

<div id="pdf"  style="margin: 0 auto">
    <div class="img">

        {{-- <img src="./img/papelTimbrado.jpg" alt=""> --}}
        <div class="titulo">
            <h1>CERTIFICADO DE BATISMO</h1>
        </div>
        <div class="suaPresenca">
            <h2>SUA PRESENÇA</h2>
        </div>
        
        <div class="texto">
            <b>Certificamos que <span style="text-decoration: underline;">{{$consulta->nome}},</span>
                foi Batizado(a) em {{$data->format('d/m/Y')}}, em Nome do pai, do filho
                e do Espirito Santo, Conforme os mandamentos do Senhor Jesus Cristo.</b>
                {{-- @php dd($data->format('d/m/Y'))@endphp --}}
            </div>
            <h1 style="text-align: center">Comunidade Sua Presenca</h1>
            <div id="containerAssPr" >
                <div style="text-align:center">
                    
                    <b>______________________________________</b><br />
                    <b style="text-align:center; font-size:25px">Pastor Presidente</b>
                </div>
            </div>
            <div id="secretario" >
                <div style="text-align:center">
                    
                    <b>_______________________________________</b><br />
                    <b style="text-align:center; font-size:25px">Secretario</b>
                </div>
            </div>
        </div>
            
            <style>
                #pdf {
                    width: 95%;
                    height: 90%;
                    border: 1px solid red;
                    padding:30px;
                    /* background-image: url('./img/papelTimbrado.jpg'); */
                    
                }
                .img{
                    background-image: url('./img/papel_timbrado_pequeno.jpg');
                    background:repeat;
                    margin-top:50px
                }
                /* #pdf img {
                    width:100%;
                    height:50%;
                } */
                .titulo{
        text-align:center;
        font-size:25px;
        margin-top:-40px;
    }
    .suaPresenca{
        text-align:center;
        color: red;
        font-size:45px;
        margin-top:-90px;
        font-family: Arial;
        ri
        /* text-decoration: bold; */
    }
    .texto{
        /* text-align:center; */
        font-size:28px;
        /* margin-left: -20px; */
        text-align: justify;
        font-family: Arial;
        letter-spacing: 1.5px;
    }
    #secretario{
        width: 30%;
        /* padding-top: 20px; */
        margin-left:650px;
        margin-top: -300px
    }
    #containerAssPr{
        width: 30%;
        margin-top: 80px;
        /* margin-left:650px */
    }
  
   

</style>


