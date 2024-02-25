<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

            {{-- <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
            <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
            <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"  > --}}

        {{-- Styles public --}}
        <link rel="stylesheet" href="/css/styles.css">
        <link href="css/stylesLandPage.css" rel="stylesheet" />
        <link href="css/stylesDashboard.css" rel="stylesheet" />

        <title>@yield('title')</title>

    </head>
    <header>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<div class="row">
  <div class="col-sm-12">

 
<div class="topnav" id="myTopnav">
  <a href="/" class="active">Inicio</a>
  <a href="/galeria">Galeria</a> 
  <a href="/sobre">Quem Somos</a> 
  <a href="/contato">Contato</a>
  <a   href="/" data-toggle="modal" data-target="#modalExemplo">
    Certificado de Batismo
</a>
  {{-- <a href="/geraCertificadoCliente">Certificado</a> --}}
  @auth
  {{-- @if (Auth::user()->perfil == 1 && 9) --}}
  <a href="/dashboardEventos">Eventos</a>
  <a href="/membros">Membros</a>
  {{-- @endif --}}
  @endauth
  <a href="/dizimo">Dizimos/Ofertas</a>
  {{-- @Auth --}}
  @auth
  <a href="/dashboard">Dashboard</a>
  <a class="nav-item" style="padding-left: 40px;">
    <form action="/logout" method="post">
      @csrf
      <a href="/logout"
        class="nav-link"
        onclick="event.preventDefault();
                                          this.closest('form').submit();">Sair
                            <b>|{{ auth()->user()->name }}</b>
                        </a>
                      </form>
                    </a> 
                    
                    @endauth
                    @guest
                    <a href="/login" class="nav-link">Entrar</a>
                    @endguest
                   
                @auth
                <a href="/dashboard">
                    <img src="/img/logo.jpeg" style=" width:50px; border-radius: 40px; height:50px;">
                </a>
                @endauth

  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

</div>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>



    </header>
        <main>
            {{-- {{-- <div class="container-fluid"> --}}
                <div class="row">
                    <div class="col-md-12"> 
                        
                        @if(@session('msg'))
                        <p class="msg">{{session('msg')}}</p>
                        @endif
                        
                        @if(@session('msgErro'))
                        <p class="msgErro">{{session('msgErro')}}</p>
                        @endif
                        
                        @yield('content')
                    </div>
                </div>
            </div> 
        </main>

    <footer>
        <p>Comunidade Sua Presenca &copy 2012</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

</html>



<style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }
    
    .topnav {
      padding-top:20px;
      overflow: hidden;
      /* background-color: rgb(0, 0, 0); */
      
    }
    
    .topnav a {
      float: left;
      display: block;
      color: rgb(255, 255, 255);
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 15px;
      border-radius: 10px;
    }
    
    .topnav a:hover {
      background-color: rgb(196, 27, 27);
      color: rgb(156, 156, 156);
      font-size: 15px;
    }
    
    .topnav a.active {
      background-color: #353535;
      color: white;
      
    }
    
    .topnav .icon {
      display: none;
    }
    
    @media screen and (max-width: 600px) {
      .topnav a:not(:first-child) {display: none;}
      .topnav a.icon {
        float: right;
        display: block;
      }
    }
    
    @media screen and (max-width: 600px) {
      .topnav.responsive {position: relative;}
      .topnav.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
      }
      .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
      }
    }
    </style>
<!-- Sua modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gerar Certificado de Batismo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/certificadoPublic" method="POST">
          <label>Digite o 1º e o ultimo nome</label><br/>
          <input class="form" placeholder="Ex:. maria santos" type="text" name="nome" >
          <br />
          <br />
          <label>Digite a data de nascimento</label><br/>
          <input class="form" placeholder="Ex:. 1998/17" type="text" name="data">
        <br />
        <br />
        <button class="btn btn-primary">Gerar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        {{-- <button type="button" class="btn btn-primary">Gerar</button> --}}
      </div>
    </div>
  </div>
</div>