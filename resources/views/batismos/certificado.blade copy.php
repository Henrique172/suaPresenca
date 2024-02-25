

<div id="ancora">
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
                    e do Espirito Santo, Conforme os mandamentos do Senhor Jesus Cristo. </b>
                    <br/>
                    <b style="margin-top: 40px; color: red">Atos 1:8</b>
                    {{-- @php dd($data->format('d/m/Y'))@endphp --}}
                </div>
                <h1 style="text-align: center; margin-left:-80px">Comunidade Sua Presença</h1>
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
                #ancora {
                    position: relative;
                    width: 100vw;
                    height: 100vh;
                    margin: 0;
                    padding: 0;
                    overflow: hidden;
                }

                #ancora::before {
                    content: "";
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-image: url('./img/artCertificado.png');
                    background-size: cover;
                    background-position: center center;
                    background-repeat: no-repeat;
                    /* opacity: 0.2; */
                }
                
                
                
                #pdf {
                    /* position: relative; */
                    /* z-index: 1;  */
                    width: 95%;
                    height: 90%;
                    /* border: 1px solid red; */
                    padding:30px;
                    
                }

                .img{
                        /* background-image: url('./img/papel_timbrado_pequeno.jpg'); */
                        background:repeat;
                        margin-top:50px;
                    }
                 
                    .titulo{
                    text-align:center;
                    font-size:25px;
                    margin-top:-40px;
                }
                .suaPresenca{
                    text-align:center;
                    color: red;
                    font-size:35px;
                    margin-top:-90px;
                    font-family: Arial;
                    
                    /* text-decoration: bold; */
                }
                .texto{
                    /* text-align:center; */
                    font-size:28px;
                    padding: 40px;
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
                    margin-top: 150px;
                    /* margin-left:650px */
                }
            
    

    </style>


