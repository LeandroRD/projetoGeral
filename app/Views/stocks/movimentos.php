<?php
	$this->extend('Layout/layout_users');
?>

<?php $this->section('conteudo')?>
	<div class="row mt-2">
		<div class="col-12 ">
			<h1>Movimentos: </h1>
			<div class="col-6 marg-fundo ">
				<!-- botao adicionar -->
				<a href="<?php echo site_url('stocks/movimento_adicionar')?>"class="btn btn-primary btn-200 ">Adicionar Movimentos...</a>
			</div>
			<div class="col-6 ">
				<!-- botao baixar  -->
				<a href="<?php echo site_url('stocks/movimento_baixar')?>"class="btn btn-primary btn-200">Baixar Movimentos...</a>
			</div>
			<hr>
			<div class="table-responsive  marg-topo">
				<table class="table table-striped2" id="tabela_movimentos">
					<thead class="cabeca-tabela">
						<th>ID Produto</th>
						<th>Designação</th>
						<th>Quantidade</th>
						<th>Data Movimentação</th>
						<th>Observações</th>
					</thead>
					<tbody>
					 	<?php foreach($movimentos as $movimento): ?>
							<tr>
								<td><?php echo $movimento['id_produto']  ?></td>
								<td><?php echo $movimento['designacao']  ?></td>
								<td><?php echo $movimento['quantidade']  ?></td>
								<td><?php echo $movimento['data_movimento']  ?></td>
								<td><?php echo $movimento['observacoes']  ?></td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php $this->endSection()?>

