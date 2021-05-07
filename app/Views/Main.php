<?php
	$this->extend('Layout/layout_main')
?>

<?php $this->section('conteudo')?>
	<div class="text-end marg-fundo-20">
        <?php echo view('users/user_signup') ?>
    </div>

	<a href="<?php echo site_url('users')?>"class="btn btn-primary btn-200 mt-2 mp-5">Users</a>
	<a href="<?php echo site_url('cripto')?>"class="btn btn-primary btn-200 mt-2 mp-5">Criptografia</a>
	<a href="<?php echo site_url('stocks')?>"class="btn btn-primary btn-200 mt-2 mp-5">Stocks</a>

<?php $this->endSection()?>

