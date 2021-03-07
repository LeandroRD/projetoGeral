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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css')?>">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css')?>">
    <!-- DATATABLE -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/datatables.min.css')?>">
    
    <!-- ESTE LINK eu copie do projeto Compras porque do joao ribeiro nao vem a seta -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center bg-dark text-light p-3">
            <h3>Projeto Geral - Stocks</h3>
        </div>
    </div>
    <div class="row mb-5">
    <div class="col-2   ">
        <div class=" mt-3 mb-3">
            <div class="mb-1 mt-1">
                <a  href="<?php echo site_url('stocks/familias')?>" >Familias</a>
            </div>
            <div class="mb-1 mt-1">
                <a  href="<?php echo site_url('stocks/movimentos')?>" >Movimentos</a>
            </div>
            <div class="mb-1 mt-1">
                <a  href="<?php echo site_url('stocks/produtos')?>" >Produtos</a>
            </div>
            <div class="mb-1 mt-1">
                <a  href="<?php echo site_url('stocks/taxas')?>" >Taxas</a>   
            </div>
        </div>
        
    </div>
        <div class="col-10 ">
            <?php $this-> renderSection('conteudo')?>
        </div>
    </div>
</div>





<!-- LINK JAVASCRIPT -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/app.js')?>"></script>
<script src="<?php echo base_url('assets/js/datatables.min.js')?>"></script>  
</body>
</html>