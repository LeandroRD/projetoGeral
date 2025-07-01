<h1 class="text-center my-4" style="font-size:2.5rem; letter-spacing:2px; color:#343a40;">Lista de Fornecedores</h1>

<div class="container" style="max-width:950px;">
    <a href="<?php echo site_url('fornecedores'); ?>" class="btn btn-outline-secondary mb-3">
        <i class="bi bi-person-plus"></i> Novo Fornecedor
    </a>
    <div class="card shadow-lg rounded-4 border-0">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0 text-center table-bordered" style="border-collapse: separate; border-spacing: 0;">
                <thead class="table-primary">
                    <tr>
                        <th style="width:60px;">ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th style="width:180px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($fornecedores)): ?>
                        <?php foreach($fornecedores as $fornecedor): ?>
                            <tr style="border-bottom:2px solid #dee2e6;">
                                <td class="fw-bold text-primary"><?php echo $fornecedor['id']; ?></td>
                                <td><?php echo esc($fornecedor['nome']); ?></td>
                                <td><?php echo esc($fornecedor['email']); ?></td>
                                <td><?php echo esc($fornecedor['telefone']); ?></td>
                                <td>
                                    <a href="<?php echo site_url('fornecedores/editar/'.$fornecedor['id']); ?>" class="btn btn-outline-warning btn-sm me-2 rounded-pill px-3">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </a>
                                    <a href="<?php echo site_url('fornecedores/excluir/'.$fornecedor['id']); ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="return confirm('Tem certeza que deseja excluir este fornecedor?');">
                                        <i class="bi bi-trash"></i> Excluir
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="text-center text-muted">Nenhum fornecedor cadastrado.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .table-primary th {
        background: linear-gradient(90deg, #0d6efd 60%, #0dcaf0 100%);
        color: #fff;
        border: none;
        text-align: center;
    }
    .table-bordered th, .table-bordered td {
        border: 1.5px solid #dee2e6 !important;
        text-align: center;
        vertical-align: middle;
    }
    .btn-outline-warning {
        color: #ffc107;
        border-color: #ffc107;
    }
    .btn-outline-warning:hover {
        background: #ffc107;
        color: #fff;
    }
    .btn-outline-danger {
        color: #dc3545;
        border-color: #dc3545;
    }
    .btn-outline-danger:hover {
        background: #dc3545;
        color: #fff;
    }
    .btn-outline-secondary {
        color: #343a40;
        border-color: #343a40;
    }
    .btn-outline-secondary:hover {
        background: #343a40;
        color: #fff;
    }
    .card {
        border-radius: 1.5rem;
    }
</style>
