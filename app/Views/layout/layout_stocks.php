<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Geral - Users</title>
    
    <!-- LINK CSS -->
    <!-- BootStrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css')?>">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css')?>">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center bg-dark text-light p-3">
            <h3>Projeto Geral - Stocks</h3>
        </div>
    </div>
    <div class="row mb-5">
    <div class="col-2   "style="background-color: rgb(200,200,200)">
        <div class="text-center mt-3 mb-3">
            <a href="<?php echo site_url('stocks/metodo1')?>" class="btn btn-primary mb-2 btn-180">botao1</a></br>
            <a href="<?php echo site_url('stocks/metodo2')?>" class="btn btn-primary mb-2 btn-180">botao2</a></br>
            <a href="<?php echo site_url('stocks/metodo3')?>" class="btn btn-primary mb-2 btn-180">botao3</a></br>
            <a href="<?php echo site_url('stocks/metodo4')?>" class="btn btn-primary mb-2 btn-180">botao4</a></br>   
        </div>
        
    </div>
        <div class="col-10 ">
            <?php $this-> renderSection('conteudo')?>
        </div>
    </div>
</div>





<!-- LINK JAVASCRIPT -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery-3.5.1.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/app.js')?>"></script>
  
</body>
</html>