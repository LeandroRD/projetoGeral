<?php
	$this->extend('Layout/layout_users');
	helper('funcoes');
?>
<?php $this->section('conteudo')?>
	<div class="marg-dir-esq-20px ">
		<div class="row marg-topo-menos-15  ">
			<div class="col-6 text-start  ">
				<div class="col-6 align-self-end"><h1>Lista de Cotações (Fornecedor): </h1></div>
			</div>	
			<div class="table-responsive  marg-topo ">
				<table class="table table-striped2 " id="tabela_familias">
					<thead class="  cabeca-tabela">
						<th class="text-center">ID</th>
						<th class="text-center">Escopo</th>
						<th class="text-center" >Detalhes</th>
						<th class="text-center">Fornecedor</th>
						<th class="text-center">Ações</th>
					</thead>
					<tbody>
						<?php foreach($cotacoes as $cotacao):?>
							<tr>
								<td class="text-center"><?php echo $cotacao['id_cot'] ?></td>
								<td class="text-center"><?php echo $cotacao['escopo'] ?></td>
								<td class="text-center"><?php echo $cotacao['detalhes'] ?></td>
								<td class="text-center"><?php echo $cotacao['razaoSocial'] ?></td>
								<!-- botoes editar deletar -->
								<td class="text-center">
									<a class="btn btn-primary btn-sm btn-100"href="<?php echo site_url('stocks/cotacao_editar_fornecedor/'.aesEncrypt($cotacao['id_cot']))?>">
									<i class="fa fa-pencil me-2"></i>Editar
									</a>
									<a class="btn btn-danger btn-sm btn-100" href="<?php echo site_url('stocks/cotacao_eliminar_fornecedor/'.aesEncrypt($cotacao['id_cot']))?>">
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
<?php $this->endSection()?>



