<h1 style="font-size:2.5rem; text-align:center; margin-top:2rem;">Editar Fornecedor</h1>

<div style="max-width:400px;margin:2rem auto;">
    <form method="post" action="<?php echo site_url('fornecedores/atualizar/'.$fornecedor['id']); ?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Fornecedor</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo esc($fornecedor['nome']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo esc($fornecedor['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo esc($fornecedor['telefone']); ?>">
        </div>
        <button type="submit" class="btn btn-success w-100">Salvar Alterações</button>
        <a href="<?php echo site_url('fornecedores/listar'); ?>" class="btn btn-secondary w-100 mt-2">Cancelar</a>
    </form>
</div>
