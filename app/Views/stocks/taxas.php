<?php
	$this->extend('Layout/layout_users');
	helper('funcoes');
?>

<?php $this->section('conteudo')?>
	<div class="row mt-2">
		<div class="col-12 ">
			<h1>Taxas/Impostos: </h1>
			<div class="row mt-2">	
				<div class="col-12 ">
				<!--
					Apresentacao da table com as familias registradas / botao para acionar nova familia
					total de familias
					em cada row de familia, bota para editar e eliminar
				--->
					<div class=" mb-3">
						<div  class="col-6 align-self-end "></div>
						<!-- botao adicionar -->
						<div class="col-6 marg-esq-20 mb-5"><a href="<?php echo site_url('stocks/taxas_adicionar')?>"class="btn btn-primary btn-200">Adicionar taxa...</a></div>
					</div>
					<br>
					<div class="table-responsive  marg-topo">
						<table class="table table-striped2 marg-topo" id="tabela_taxas">
							<thead class="cabeca-tabela">
								<th>ID</th>
								<th>Taxa</th>
								<th class="text-center">Percentual</th>
								<th class="text-center ">Ações</th>
							</thead>
							<tbody>
								<?php foreach($taxas as $taxa):?>
									<tr>
										<td><?php echo $taxa['id_taxas'] ?></td>
										<td><?php echo $taxa['designacao'] ?></td>
										<td class="text-center"><?php echo $taxa['percentagem']  ?> %</td>
										<td class="text-center">
											<a class="btn btn-primary btn-sm btn-100"href="<?php echo site_url('stocks/taxas_editar/'.aesEncrypt($taxa['id_taxas']))?>">
												<i class="fa fa-pencil me-2"></i>Editar
											</a>
											<a class="btn btn-danger btn-sm btn-100" href="<?php echo site_url('stocks/taxas_eliminar/'.aesEncrypt($taxa['id_taxas']))?>">
												<i class="fa fa-trash me-2"></i> Eliminar
											</a>
										</td>
									</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->endSection()?>

