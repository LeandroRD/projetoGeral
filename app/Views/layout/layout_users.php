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


<!-- Criado a secao conteudo com as 4 linhas de h1 abaixo -->

<!-- ======================================================== -->
<h1>Estou no layout 1</h1>
<h1>Estou no layout 2</h1>
<?php $this-> renderSection('conteudo')?>
<h1>Estou no layout 3</h1>
<h1>Estou no layout 4</h1>
<!-- ======================================================== -->





<!-- LINK JAVASCRIPT -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery-3.5.1.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>

  
</body>
</html>