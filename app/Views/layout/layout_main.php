<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Geral - Users</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css') ?>">
</head>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center bg-dark text-light p-3">
                <h3>PROJETO GERAL</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5 mb-5">
                <?php $this->renderSection('conteudo'); ?>
            </div>
        </div>
    </div>




</html>