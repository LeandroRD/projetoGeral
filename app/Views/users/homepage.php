<?php 
    $this->extend('Layout/layout_users');
    $s = session();
?>

<?php $this->section('conteudo')?>
    
    <?php echo view('users/userbar') ?>
    
    <div>Olá, <?php echo $s->name.'('.$s->id_user.')'?></div>
    <div>O meu perfil é de: <?php echo $s->profile?></div>
    <br><br>
    <a href="<?php echo site_url('users/op1')?>" class="btn btn-primary btn-200 mt-3">Operação 01</a>
    <a href="<?php echo site_url('users/op2')?>" class="btn btn-primary btn-200 mt-3">Operação 02</a>
    <?php if(isset($admin)): ?>
        <a href="<?php echo site_url('users/admin_users')?>" class="btn btn-primary btn-200 mt-3">Gestão de utilizadores</a>
    <?php endif;?>

<?php $this->endSection()?>
    
