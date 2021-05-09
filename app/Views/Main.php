<?php
	$this->extend('Layout/layout_main')
?>

<?php $this->section('conteudo')?>
	<div class="text-end marg-fundo-20">
        <?php echo view('users/user_signup') ?>
    </div>

	

<?php $this->endSection()?>

