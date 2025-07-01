<h1 style="font-size:3rem; text-align:center; margin-top:2rem;">USUÁRIOS</h1>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success text-center">
        <?php echo session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<div style="max-width:400px;margin:2rem auto;">
    <form method="post" action="<?php echo site_url('users/cadastrar'); ?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Cadastrar</button>
    </form>
    <a href="<?php echo site_url('users/listar'); ?>" class="btn btn-primary w-100 mt-3">Ver lista de usuários</a>
</div>
