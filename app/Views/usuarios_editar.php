<h1 style="font-size:2.5rem; text-align:center; margin-top:2rem;">Editar Usuário</h1>

<div style="max-width:400px;margin:2rem auto;">
    <form method="post" action="<?php echo site_url('users/atualizar/'.$usuario['id']); ?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo esc($usuario['nome']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo esc($usuario['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Nova Senha (opcional)</label>
            <input type="password" class="form-control" id="senha" name="senha">
        </div>
        <button type="submit" class="btn btn-success w-100">Salvar Alterações</button>
        <a href="<?php echo site_url('users/listar'); ?>" class="btn btn-secondary w-100 mt-2">Cancelar</a>
    </form>
</div>
