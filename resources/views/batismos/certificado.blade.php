

    {{-- <div id="ancora"> --}}

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
                <b> Certificamos que <span style="text-decoration: underline;">{{$consulta->nome}},</span>
                    foi Batizado(a) em {{$data->format('d/m/Y')}}, em Nome do pai, do filho
                    e do Espirito Santo, Conforme os mandamentos do Senhor Jesus Cristo. </b>
                    <br/>
                    <b style="margin-top: 40px; color:goldenrod">Atos 1:8</b>
                    {{-- @php dd($data->format('d/m/Y'))@endphp --}}
                </div>

                <h1 style="text-align: center; margin-top:-38px; margin-left:-70px;                     text-decoration: underline;
                    text-decoration: underline; font-family:didot">Comunidade Sua Presença</h1>
                
                
                <div>
                    <div id="containerAssPr" >
                        <div style="text-align:center">
                            <b>______________________________________</b><br />
                            <b style="text-align:center; font-size:25px">Pastor Presidente</b>
                        </div>
                    </div>
                    <div id="secretario" >
                        <div style="text-align:center">
                            
                            <b>_______________________________________</b><br />
                            <b style="text-align:center; margin-top:-300px; font-size:25px">Secretário</b>
                        </div>
                    </div>
                </div>
                </div>
                
                <style>
                
                
                
                #pdf {
                    background-size: cover;
                    background-position: center center;
                    background-repeat: no-repeat;
                    background-image: url('./img/artCertificado.png');
                    width: 95%;
                    height: 90%;
                    padding:30px;
                    
                }

                .img{
                        background:repeat;
                        margin-top:50px;
                    }
                 
                    .titulo{
                    text-align:center;
                    font-size:20px;
                    margin-top:-40px;
                }
                .suaPresenca{
                    text-align:center;
                    color: goldenrod;
                    font-size:30px;
                    margin-top:-70px;
                    font-family: Arial;
                    
                    /* text-decoration: bold; */
                }
                .texto{

                    /* text-align:center; */
                    margin-top:-30px;
                    font-size:25px;
                    padding: 80px;
                    /* margin-left: -20px; */
                    text-align: justify;
                    font-family: Arial;
                    /* letter-spacing: 1.5px; */
                }
                #secretario{
                    width: 30%;
                    /* padding-top: 20px; */
                    margin-left:550px;
                    margin-top: -300px
                }
                #containerAssPr{
                    width: 40%;
                    margin-top: 50px;
                    margin-left: 50px
                }
            
    

    </style>


