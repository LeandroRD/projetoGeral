<?php
$this->extend('Layout/layout_users');
helper('funcoes');

?>
<?php $this->section('conteudo') ?>
<div class="marg-dir-esq-20px  ">
	<div class="row marg-topo-menos-15  ">
		<div class="col-6 text-start  ">
			<div class="col-6 align-self-end">
				<p>
				<h1>Cotações - aguardo de propostas: </h1>
			</div>
			<!-- botoes ADICIONAR e SEM_FORNECEDOR -->
			<div class="mt-2 mb-2 marg-topo-10 "><a href="<?php echo site_url('stocks/checkLists') ?>" class="btn btn-primary btn-200">Adicionar Nova Cotação</a></div>
			<div class="mt-2 mb-2 marg-topo-10 "><a href="<?php echo site_url('stocks/cotacoes_semFornecedor') ?>" class="btn cor-botao-azul-claro btn-200">Cotações sem Fornecedor</a></div>
			<div class="mt-2 mb-2 marg-topo-10 "><a href="<?php echo site_url('stocks/cotacoes_aprovadas') ?>" class="btn  btn-200 cor-botao-verde">Cotações Aprovadas</a></div>
		</div>
		<!-- caixa de alertas -->
		<div class="col-md-6 col-md-offset-3 marg-topo-10">
			<?php if (isset($error)) : ?>
				<div class="alert alert-danger text-center alerta-apagando">
					<?php echo $error ?>
				</div>
			<?php endif; ?>
			<?php if (isset($sucess)) : ?>
				<div class="alert alert-success text-center alerta-apagando">
					<?php echo $sucess ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="table-responsive  marg-topo col-md-12 ">
			<table class="table table-striped2 " id="tabela_familias">
				<thead class="  cabeca-tabela">
					<th class="text-center">ID</th>
					<th class="text-center">Data</th>
					<th class="text-center">Hora</th>
					<th class="text-center">Escopo</th>
					<th class="text-center">Proposta</th>
					<th class="text-center">Fornecedor</th>
					<th class="text-center">Ações</th>
				</thead>
				<tbody>
					<?php foreach ($cotacoes as $cotacao) : ?>
						<tr>
							<td class="text-center"><?php echo $cotacao['id_cot'] ?></td>
							<td class="text-center  " style="padding-left: 80px">
								<div class="text-center  ">
									<input disabled class="bordaTransparente" type="date" name="" id="" value="<?php echo $cotacao['cot_data']?>">
								</div>
								<div class="tudo_transp">
									<?php echo $cotacao['cot_data'] ?>
								</div>
							</td>
							<td class="text-center"><?php echo $cotacao['cot_hora'] ?></td>
							<td class="text-center"><?php echo $cotacao['escopo'] ?></td>
							<td class="text-center"><?php echo $cotacao['detalhes'] ?></td>
							<td class="text-center"><?php echo $cotacao['razaoSocial'] ?></td>
							<!-- botoes editar | deletar | enviar novo fornecedor-->
							<td class="text-center">
								<a class="btn btn-primary btn-sm btn-100 marg-topo-5" href="<?php echo site_url('stocks/cotacao_editar/' . aesEncrypt($cotacao['id_cot'])) ?>">
									<i class="fa fa-pencil me-2"></i> Editar
								</a>
								<a class="btn btn-danger btn-sm btn-100 marg-topo-5" href="<?php echo site_url('stocks/cotacao_eliminar/' . aesEncrypt($cotacao['id_cot'])) ?>">
									<i class="fa fa-trash me-2"></i> Eliminar
								</a>
								<a class="btn cor-botao-laranja btn-sm btn-180 marg-topo-5" href="<?php echo site_url('stocks/cotacao_outroFornecedor/' . aesEncrypt($cotacao['id_cot'])) ?>">
									<i class="fa fa-reply-all me-2 "></i> <span> Enviar p/mais fornecedores</span>
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