@extends('dashboard.main')
@section('title', 'Dashboard Sua Presença')

@section('contentDashboard')

<div class="container_relatorio">
    <div class="row">
        <div class="col-sm-12" style="margin-top:15px">
             <div class="col-sm-6 " style="margin:0 auto; ">
                <h1 class="text-center" style="color:#AAA">RELATÓRIO DE CULTO</h1>
            </div>
            <div class="col-sm-6 " >
                
                <br/>
                <br/>
                <br/>
                
            </div>
            <div class="col-sm-6" id="menuRelatorio">


            <button class="accordion">Relatorio de Culto</button>
                <div class="panel">

                    <form action="/relCultoDizimo" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Digite a Data</label>
                            <input type="date" class="form-control"  name="data">
                        </div>
                        <br />
                         <input type="submit" class="btn btn-success" value="Buscar">
                    </form>
                </div>
                    <br />

            </div>
        </div>
    </div>
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
    
    .active, .accordion:hover {
      background-color: #ccc; 
    }
    
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