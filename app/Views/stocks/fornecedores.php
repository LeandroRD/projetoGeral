<?php
$this->extend('Layout/layout_users');
helper('funcoes');
?>
<?php $this->section('conteudo') ?>

<div class="row mt-1">
	<div class="col-12 ">
		<h1>Fornecedores</h1>
		<div class="row ">
			<!-- botao adicionar -->
			<div class="col-6  marg-esq-20"><a href="<?php echo site_url('stocks/fornecedores_adicionar') ?>" class="btn btn-primary">Adicionar Fornecedor...</a></div>
		</div>
		<!-- caixa de mensagens erro e sucesso -->
		<?php if (isset($error)) : ?>
			<div class="col-md-6 col-md-offset-3 alerta-apagando alert alert-danger p-3 text-center">
				<?php echo $error ?>
			</div>
		<?php endif; ?>
		<?php if (isset($success)) : ?>
			<div class=" col-md-6 col-md-offset-3 alerta-apagando alert alert-success p-3 text-center">
				<?php echo $success ?>
			</div>
		<?php endif; ?>
		<!-- <br> -->

		<div class="table-responsive  marg-topo col-md-12">
			<table class="table  table-striped2  marg-topo" id="tabela_fornecedor">
				<thead class="cabeca-tabela">
					<th>ID</th>
					<th>Razão Social</th>
					<th>Serviços</th>
					<th class="text-center">Município</th>
					<th class="text-center">Estado</th>
					<th class="text-center ">Ações</th>
				</thead>
				<tbody>
					<?php foreach ($fornecedores as $fornecedor) : ?>
						<tr>
							<td><?php echo $fornecedor['id_for'] ?></td>
							<td><?php echo $fornecedor['razao_social'] ?></td>
							<td><?php echo $fornecedor['nome_servico'] ?></td>
							<td class="text-center"><?php echo $fornecedor['municipio']  ?> </td>
							<td class="text-center"><?php echo $fornecedor['estado']  ?> </td>
							<td class="text-center">
								<!-- botoes editar/deletar -->
								<a class="btn btn-primary btn-sm btn-100" href="<?php echo site_url('stocks/fornecedor_editar/' . aesEncrypt($fornecedor['id_for'])) ?>">
									<i class="fa fa-pencil me-2"></i>Editar
								</a>
								<a class="btn btn-danger btn-sm btn-100" href="<?php echo site_url('stocks/fornecedor_eliminar/' . aesEncrypt($fornecedor['id_for'])) ?>">
									<i class="fa fa-trash me-2"></i> Eliminar
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $this->endSection() ?>