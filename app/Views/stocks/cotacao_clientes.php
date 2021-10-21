<?php
$this->extend('Layout/layout_users');
helper('funcoes');
?>
<?php $this->section('conteudo') ?>
<div class="row mt-1">
	<div class="col-12 ">
		<h1>Cotação_Lista_Clientes</h1>
		<input type="hidden" name="id_cot" value="<?php echo $id_cot ?>">
		<div class="row ">
			<!-- botao adicionar -->
			<div class="col-6  marg-esq-20"><a href="<?php echo site_url('stocks/clientes_adicionar') ?>" class="btn btn-primary">Adicionar Clientes...</a></div>
		</div>
		<br>
		<div class="table-responsive  marg-topo">
			<!-- caixa de mensagens erro e sucesso -->
			<?php if (isset($error)) : ?>
				<div class="col-md-6 col-md-offset-3 alerta-apagando alert alert-danger p-3 text-center">
					<?php echo $error ?>
				</div>
			<?php endif; ?>
			<?php if (isset($success)) : ?>
				<div class="col-md-6 col-md-offset-3 alerta-apagando alert alert-success p-3 text-center">
					<?php echo $success ?>
				</div>
			<?php endif; ?>
			<table class="table  table-striped2  marg-topo" id="tabela_fornecedor">
				<thead class="cabeca-tabela">
					<th>ID</th>
					<th>Razão Social</th>
					<th class="text-center">Município</th>
					<th class="text-center">Estado</th>
					<th class="text-center ">Ações</th>
				</thead>
				<tbody>
					<?php foreach ($clientes as $cliente) : ?>
						<tr>
							<td><?php echo $cliente['id_cliente'] ?></td>
							<td><?php echo $cliente['razao_social_cli'] ?></td>
							<td class="text-center"><?php echo $cliente['municipio_cli']  ?> </td>
							<td class="text-center"><?php echo $cliente['estado']  ?> </td>
							<td class="text-center">
								<!-- botoes editar/deletar -->
								<a class="btn btn-primary btn-sm btn-100" href="<?php echo site_url('stocks/cliente_cotacao_editar/'.aesEncrypt($cliente['id_cliente']).'/'.$id_cot) ?>">
									<i class="fa fa-pencil me-2"></i>Editar
								</a>
								
								<!-- <a class="btn btn-danger btn-sm btn-100" href="<?php echo site_url('stocks/cliente_eliminar/' . aesEncrypt($cliente['id_cliente'])) ?>">
									<i class="fa fa-trash me-2"></i> Eliminar
								</a> -->
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $this->endSection() ?>