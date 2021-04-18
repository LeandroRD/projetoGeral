<?php 
    $this->extend('Layout/layout_users');
    $s = session();
?>

<?php $this->section('conteudo')?>
    
    <div class="text-right ">
        <?php echo view('users/userbar') ?>
    </div>
    
    
    
    <br><br>
    <div class="row ">
        
            <div class=" padding-dir-esq-10  col-md-2 card card-claro col-md-offset-5">
            <div>Olá, <?php echo $s->name?></div>
            <div class="row"></div>
            <div>O seu perfil é de: <span class="font3"><?php echo $s->profile?></span></div>
            </div>

        
        </div>
    
        <div class="row marg-topo text-center">
        <div class="col-md-6 col-md-offset-3 ">
            <a href="<?php echo site_url('users/op1')?>" class="btn btn-primary btn-200 mt-3 marg-topo">Operação 01</a>
            <a href="<?php echo site_url('users/op2')?>" class="btn btn-primary btn-200 mt-3 marg-topo">Operação 02</a>
            <?php if(isset($admin)): ?>
                <a href="<?php echo site_url('users/admin_users')?>" class="btn btn-primary btn-200 mt-3 marg-topo">Gestão de utilizadores</a>
            <?php endif;?>
        
        
        </div>
    </div>
    

<?php $this->endSection()?>
    
