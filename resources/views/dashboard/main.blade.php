@extends('layouts.main')

@section('content')
        <nav nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">


            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <div class="sb-sidenav-menu-heading">Menus</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="">
                                    Todos Menus  </a>

                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#">Eventos</a>
                                    <a class="nav-link" href="#">Membros</a>
                                    <a class="nav-link" href="#">Contato</a>
                                    <a class="nav-link" href="#">Galeria</a>
                                </nav>
                            </div>

                            {{-- <div class="sb-sidenav-menu-heading">Batismo</div> --}}
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#batismo" aria-expanded="false" aria-controls="">
                                    Batismos  </a>

                            <div class="collapse" id="batismo" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/batismoIndex">Inicio</a>
                                    <a class="nav-link" href="#">Certificados</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#dizimo" aria-expanded="false" aria-controls="">
                                    Dizimos  </a>

                            <div class="collapse" id="dizimo" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/relatorioDizimo">Relatorios</a>
                                    <a class="nav-link" href="/dizimoCadastroIndex">Cadastrar</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#relCulto" aria-expanded="false" aria-controls="">
                                    Relatorio de Culto  </a>

                            <div class="collapse" id="relCulto" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/relIndex">Adicionar</a>
                                    <a class="nav-link" href="/relCultoIndex">Relatorio</a>
                                </nav>
                            </div>


                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @if(@session('msg'))
                        {{-- <p class="msg">{{session('msg')}}</p> --}}
                        @endif

                    @yield('contentDashboard')
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            {{-- <div class="text-muted">Copyright &copy; Your Website 2022</div> --}}
                            <div>
                                {{-- <a href="#">Privacy Policy</a> --}}
                                &middot;
                                {{-- <a href="#">Terms &amp; Conditions</a> --}}
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
@endsection 