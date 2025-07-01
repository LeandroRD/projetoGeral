<?php $this->extend('layout/layout_main'); ?>
<?php $this->section('conteudo'); ?>
<div class="text-center my-5">
    <img src="<?php echo base_url('assets/material/logo1.jpg'); ?>" alt="Logo Projeto Geral" style="width:180px; height:180px; object-fit:cover; border-radius:50%; box-shadow:0 0 30px 10px #0dcaf0, 0 0 0 8px #fff; border:5px solid #0d6efd; background:#fff;">
    <h1 style="font-size:3rem; color:#0d6efd; font-weight:900; letter-spacing:2px; margin-top:1.5rem; text-shadow:2px 2px 10px #0dcaf0;">PROJETO GERAL</h1>
</div>
<div class="text-center mb-4">
    <a href="<?php echo site_url('users') ?>" class="btn btn-primary btn-200 me-2">Users</a>
    <a href="<?php echo site_url('fornecedores') ?>" class="btn btn-warning btn-200 ms-2">Fornecedores</a>
</div>
<?php $this->endSection() ?>