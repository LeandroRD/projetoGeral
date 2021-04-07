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

        <div class="container-fluid text-center">   
            <div class="row">
                <div class="col-12  text-center bg-dark text-light p-3">
                    <h3>Projeto Geral - Users</h3>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12 ">
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