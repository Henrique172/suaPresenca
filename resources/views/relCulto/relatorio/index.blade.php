@extends('dashboard.main')
@section('title', 'Dashboard Sua Presença')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@section('contentDashboard')
<div class="col-sm-12 text-center" style="margin-top:15px">
    <div class="row">
             <div class="col-sm-12" style="margin:0 auto; ">
                <h1 class="text-center" style="color:#AAA; ">RELATÓRIO DE CULTO</h1>
            </div>
            <div class="col-sm-6 " >
                
                <br/>
                <br/>
                <br/>
                
            </div>
            <div class="col-sm-12" id="menuRelatorio">


            <table class="table" >
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col" style="width:250px">Pregador</th>
                    <th scope="col">Visitantes</th>
                    <th scope="col">Membros</th>
                    <th scope="col">Total Presentes</th>
                    <th scope="col">Horario</th>
                    <th scope="col">Data</th>
                    <th scope="col" style="width:150px">Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($find as $dados)
                    @php $data = new DateTime($dados->data) @endphp
                  <tr>
                    <th scope="row">{{ $i ++}}</th>
                    <td>{{ $dados->pregador }}</td>
                    <td style="text-align: center">{{ $dados->visitantes }}</td>
                    <td style="text-align: center">{{ $dados->qtds_membros }}</td>
                    <td style="text-align: center">{{ $dados->qtds_membros + $dados->visitantes }}</td>
                    <td>{{ $dados->horario }}</td>
                    <td>{{ $data->format('d/m/Y') }}</td>
                    <td>        
                            <button class="btn btn-success"  type="button" id="dropdownMenuButton" data-bs-toggle="collapse" data-bs-target="#collapsePdf{{$dados->id}}"  >PDF</button>

                        <div class="collapse" id="collapsePdf{{$dados->id}}" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav" style="font-size: 10px; padding-top:10px">
                                <a class=" btn btn-primary"  href="relMeia/{{$dados->id}}" target="_blank">Meia Página</a>
                                <a class=" btn btn-danger" href="relId/{{$dados->id}}" target="_blank">Normal</a>
                            </nav>
                        </div>
                            
                            {{-- FUNCAO PARA DEIXAR BOTAO DE EDITAR SO 2 DIAS E DEPOIS SOME --}}
                            @php 
                                $dataHoje = new dateTime();
                                $dataCadastro = new dateTime($dados->data);
                                
                                $diferenca = strtotime($dataHoje->format('d-m-Y')) - strtotime($dataCadastro->format('d-m-Y'));
                                $dias = floor($diferenca / (60 * 60 * 24)); 

                            @endphp
                            @if($dias <= 2)
                            <a href="/rel/edit/{{$dados->id}}" style="font-size:10px" class="btn btn-warning">Editar</a>
                            @endif
                        </div>
                        </div>
                        </td>
                  </tr>
                  @endforeach

                </tbody>
            </table>
            {{ $find->links() }}
              


            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
      $("#myBtn").click(function(){
        $("#myModal").modal();
      });
    });
    </script>
    



  
</div>






<script>
    var acc = document.getElementsByClassName("accordion");
    var i;
    
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
    </script>



    @endsection

<style>
    .accordion {
      background-color: #eee;
      color: #444;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      border: none;
      text-align: center;
      outline: none;
      font-size: 15px;
      transition: 0.9s;
      border-radius: 10px;
    }
    .panel select {
        margin-top: 20px;
    }
    .panel form {
        text-align: center;
    }
    /* .panel input  {
        padd
    } */
    
    /* .active, .accordion:hover {
      background-color: #ccc; 
    } */
    
    .panel {
      padding:  30px;
      display: none;
      background-color: white;
      overflow: hidden;
    }
    #menuRelatorio{
        margin:0 auto;
    }

</style>













 
