

<div id="pdf"  style="margin: 0 auto">
    <div class="titulo">
        <h1>CERTIFICADO DE BATISMO</h1>
    </div>
    <div class="suaPresenca">
        <h2>SUA PRESENÇA</h2>
    </div>

    <div class="texto">
        <b>Certificamos que <span style="text-decoration: underline;">{{$consulta->nome}},</span>
            <br /> foi Batizado(a) em XX de Abril de XXXX, em Nome do pai, do filho
                    e do Espirito Santo, Conforme os mandamentos do Senhor Jesus Cristo.</b>
    </div>
  
</div>

<style>
    #pdf {
        width: 90%;
        border: 1px solid red;
        padding-left:80px
    }
    .titulo{
        text-align:center;
        font-size:25px;
        margin-top:-70px;
    }
    .suaPresenca{
        text-align:center;
        color: red;
        font-size:45px;
        margin-top:-90px;
        font-family: Arial;
        /* text-decoration: bold; */
    }
    .texto{
        /* text-align:center; */
        font-size:30px;
        margin-left: 20px;
        text-align: justify;
        font-family: Arial;
        letter-spacing: 1px;
    }

</style>


