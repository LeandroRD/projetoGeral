<?php 
    $this->extend('Layout/layout_users');
    $s = session();
?>

<?php $this->section('conteudo')?>
    
    <?php echo view('users/userbar') ?>
    
    
    
    <div>Olá, <?php echo $s->name.'('.$s->id_user.')'?></div>
    <div>O meu perfil é de: <?php echo $s->profile?></div>
    
    
    <div class="row ">
        
        <div class="col-md-12  col-lg-8 offset-lg-2    ">
            
            <div class="row">
                
                <div class=" col-md-4 col-xs-4 col-lg-4 col-sm-4 text-center mt-2">
                    <a href="<?php echo site_url('users/op1')?>" class="btn btn-primary btn-200">Operação 01</a>
                </div>
                
                <div class="col-md-4 col-xs-4 col-lg-4 col-sm-4 text-center mt-2">
                    <a href="<?php echo site_url('users/op2')?>" class="btn btn-primary btn-200">Operação 02</a>
                </div>
                
                <?php if(isset($admin)): ?>
                    <div class="col-md-4 col-xs-4 col-lg-4 col-sm-4 text-center mt-2">
                        <a href="<?php echo site_url('users/admin_users')?>" class="btn btn-primary btn-200">Gestão de utilizadores</a>
                    </div>
                <?php endif;?>

            </div> 
        </div>   
        
    </div>

    <a href="<?php echo site_url('users/logout')?>">Logout</a>

<?php $this->endSection()?>
    
