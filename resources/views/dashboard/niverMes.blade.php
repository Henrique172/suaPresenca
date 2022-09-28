@extends('dashboard.main')
@section('title', 'Dashboard Sua Presença')

@section('contentDashboard')
    {{-- <body class="sb-nav-fixed"> --}}
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Aniversariantes do mes</h1><img src="/img/aniversario.png" alt="" width="300">
                        {{-- <ol class="breadcrumb mb-4"> --}}
                            {{-- <li class="breadcrumb-item active">Dashboard</li> --}}


                            
                             @foreach($find as $niver)
                                {{-- {{ dd($niver->foto) }} --}}
                            <ul>
                                <?php  
                                    $mesNiver = date('m', strtotime($niver->dataNascimento));
                                    if(date('m') == $mesNiver){
                                        $nome = $niver->nome;
                                        if($nome <> 'OFERTANTES'){

                                        echo '<li> ';
                                            ?>
                                        <img src="/img/membros/{{$niver->foto}}" width="40" style="border-radius: 50px">
                                            @php

                                        //    echo" <img src='img/membros/$niver->foto";
                                        echo ' '.  $nome. ' -- '. date('d/m/Y', strtotime($niver->dataNascimento));
                                        echo '</li>';
                                    }
                                    }
                                    @endphp 
                            </ul>
                            @endforeach 

                            {{-- <h1>dskadkl</h1> --}}
                        {{-- </ol> --}}
                    </div>
                </main>
            </div>
        </div>
        @endsection 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>