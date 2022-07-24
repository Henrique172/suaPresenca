<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


            <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
            <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
        
         {{-- Font google  --}}
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        {{-- bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        {{-- Styles public --}}
        <link rel="stylesheet" href="/css/styles.css">
        <link href="css/stylesLandPage.css" rel="stylesheet" />
        <link href="css/stylesDashboard.css" rel="stylesheet" />

        <title>@yield('title')</title>

    </head>
    <header>
        <div class="radio">
            <iframe src="https://stmip.com/player_topo_novo.php?cor=000000&porta=7178&codigo=30&servidor=8" frameborder="0" width="100%" height="65" scrolling="no" noresize></iframe>
            
            {{-- <audio controls class="col-md-10">
                <source src="https://stmip.com/play.php?porta=7178" type="audio/ogg">
            </audio> --}}
        </div>
        <button  class=" btn btn-primary navbar-toggle collapsed" data-toggle="collapse" data-target="#menuMobile">
            <span class="icon-bar" ></span>
            <span class="icon-bar" ></span>
            <span class="icon-bar" ></span>
        </button>
        <nav class="navbar navbar-expand-lg navbar-light col-md-12" style="background-color:rgb(11, 10, 10);" >
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    {{-- <img src="/img/suaPresenca.jpeg" alt="Sua Presenca essa e a nossa marca"> --}}
                </a>
                <div class="collapse navbar-collapse" id="#menuMobile">
                <ul id="menuMobile">
                    {{-- @guest --}}
                    <li class="nav-item">
                        <a href="/" class="nav-link">Inicio</a>
                    </li>
                </div>
                    <li class="nav-item">
                        <a href="/galeria" class="nav-link">Galeria</a>
                    </li>
                    <li class="nav-item">
                        <a href="/sobre" class="nav-link">Quem Somos</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contato" class="nav-link">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a href="/dizimo" class="nav-link">Dizimo/Oferta</a>
                    </li>
                    {{-- @endguest  --}}
                    @auth
                    @if (Auth::user()->perfil == 2 && 9)
                    <li class="nav-item">
                        <a href="/dashboardEventos" class="nav-link">Eventos</a>
                    </li>
                    @endif
                    @if (Auth::user()->perfil == 1 && 9)
                    <li class="nav-item">
                        <a href="/membros" class="nav-link">Membros</a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">Dashboard</a>
                    </li>
                    @endif
                    
                    
                    <li class="nav-item" style="padding-left: 40px;">
                        <form action="/logout" method="post">
                            @csrf
                            <a href="/logout"
                            class="nav-link"
                            onclick="event.preventDefault();
                                          this.closest('form').submit();">Sair
                            <b>|{{ auth()->user()->name }}</b>
                        </a>
                    </form>
                </li>
                <a href="/dashboard">
                    <img src="/img/logo.jpeg" style=" width:50px; border-radius: 40px; height:50px;">
                </a>
                        @endauth
                     @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="/register" class="nav-link">registrar</a>
                        </li> --}}
                        @endguest
                    {{-- <li class="nav-item">
                        <a href="/" class="nav-link">Cadastrar</a>
                    </li> --}}
                </ul>
            </div>
        </nav>

    </header>
    <body>
        <main>
            {{-- {{-- <div class="container-fluid"> --}}
                <div class="row">
                    <div class="col-md-12"> 
                        
                        @if(@session('msg'))
                        <p class="msg">{{session('msg')}}</p>
                        @endif
                        
                        @yield('content')
                    {{-- {{-- </div> --}}
                </div>
            </div> 
        </main>

    <footer>
        <p>Comunidade Sua Presenca &copy 2012</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    </body>
</html>
<style></style>