<?php 
    $this->extend('Layout/layout_users');
    $s = session();
?>

<?php $this->section('conteudo')?>   
    <br><br>
    <div class="row ">
        <div class=" text-center  col-md-4 ard card-claro col-md-offset-4">
            <div>Olá, <?php echo $s->name?></div>
            <div class="row"></div>
            <div>O seu perfil é de: <span class="font3"><?php echo $s->profile?></span></div>
        </div>    
    </div>    
    <div class="row marg-topo text-center">
        
    </div>
<?php $this->endSection()?>
    
