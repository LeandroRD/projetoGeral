<?php 
    $this->extend('Layout/layout_users');
    $s = session();
?>

<?php $this->section('conteudo')?>
    <div>Olá, <?php echo $s->name.'('.$s->id_user.')'?></div>

    <a href="<?php echo site_url('users/logout')?>">Logout</a>

<?php $this->endSection()?>
    
