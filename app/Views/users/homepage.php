<?php 
    $this->extend('Layout/layout_users');
    $s = session();
?>

<?php $this->section('conteudo')?>
    <div>Olá, <?php echo $s->name.'('.$s->id_user.')'?></div>
    <div>O meu perfil é de: <?php echo $s->profile?></div>
    
    <div class="row">
        <div class="col-4 text-center"><a href="<?php echo site_url('users/op1')?>" class="btn btn-primary">Operação 01</a></div>
        <div class="col-4 text-center"><a href="<?php echo site_url('users/op2')?>" class="btn btn-primary">Operação 2</a></div>
        
        <?php if(isset($admin)): ?>
        <div class="col-4 text-center"><a href="<?php echo site_url('users/admin_users')?>" class="btn btn-primary">Gestão de utilizadores</a></div>
        <?php endif;?>
    </div>

    <a href="<?php echo site_url('users/logout')?>">Logout</a>

<?php $this->endSection()?>
    
