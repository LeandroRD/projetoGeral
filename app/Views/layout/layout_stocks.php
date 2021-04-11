<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Geral - Users</title>
    <script src="<?php echo base_url('assets/js/jquery-3.5.1.min.js')?>"></script>
    <!-- LINK CSS -->
    <!-- BootStrap -->
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css')?>">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css')?>">
    <!-- DATATABLE -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/datatables.min.css')?>">
    
    <!-- ESTE LINK eu copiei do projeto Compras porque do joao ribeiro nao vem a seta -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    


    <!-- link novo -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
  body {
    position: relative; 
  }
  .affix {
    top:0;
    width: 100%;
    z-index: 9999 !important;
  }
  .navbar {
    margin-bottom: 0px;
  }

  .affix ~ .container-fluid {
   position: relative;
   top: 50px;
  }
  #section1 {padding:50px;height:2000px; }
  #section2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
  #section3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
  #section41 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
  #section42 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}
  </style>


<body data-spy="scroll" data-target=".navbar" data-offset="50">

<div class="container-fluid text-center" style="background-color:#F44336;color:#fff;height:100px;">
  <h1 >Projeto Geral Stocks</h1>
 </div>


<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      
    </div>
    <div >
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav  ">
          <li>
            <a  href="<?php echo site_url('stocks/familias')?>" >Familias</a>
          </li>
          <li>
            <a  href="<?php echo site_url('stocks/movimentos')?>" >Movimentos</a>
          </li>
          <li>
          <a href="<?php echo site_url('stocks/produtos')?>" >Produtos</a>
          </li>
          <li>
          <a  href="<?php echo site_url('stocks/taxas')?>" >Taxas</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>    

<div id="section1" class="container">
  <?php $this-> renderSection('conteudo')?>
</div>

<!-- LINK JAVASCRIPT -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/app.js')?>"></script>
<script src="<?php echo base_url('assets/js/datatables.min.js')?>"></script> 


<!-- link JS NOVO -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>