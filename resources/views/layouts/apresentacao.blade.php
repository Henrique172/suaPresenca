
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       
       {{-- <button id="bt" class="btn btn-success ">Entrar no Site</button> --}}
       <div class="row">
           <a id="botao"class="btn btn-success" href="/index">Acessar o Site</a>
        <div class="col-sm-12">
            <img class="mySlides" src="img/vetorLogoSuaPresenca.png" style="width:100%; ">
            
            
            </div>
            <div style=" text-align: center;  "> 
                <div id="text">Seja Bem Vindo!</div>
            </div>  
        </div>
        





    
    <style>

        @keyframes go-back {
        from {
            transform: translateX(20px);
            font-size: 20px;
        }
        to {
            color:blue;
            transform: translateX(0);
        }
        }
        #botao{
            width: 150px;
            margin-left: auto;
            margin-right: auto;
            margin-top:30px
             
        }
        #text{
            animation: go-back 1.5s infinite alternate;
            font-size: 30px;
        }
        button{
            /* font-size: 20px;
            margin-top:40px */
        }
        #bt{
            border-radius: 100px;
            margin-top:400px

        }
        img{
            height: 100%;
            position: fixed;
            text-align: center;
        }
        
    </style>






