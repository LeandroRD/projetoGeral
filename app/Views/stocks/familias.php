<?php
	$this->extend('Layout/layout_users');
	helper('funcoes');
?>
<?php $this->section('conteudo')?>
	<div class="marg-dir-esq-20px ">
		<div class="row marg-topo-menos-15  ">
			
		
			<!--
				Apresentacao da table com as familias registradas / botao para acionar nova familia
				total de familias
				em cada row de familia, bota para editar e eliminar
			--->
			<div class="col-6 text-start  ">
				<div class="col-6 align-self-end"><h1>Famílias de produtos: </h1></div>
				<!-- botao adicionar -->
				<div class="mt-2 mb-2 marg-topo "><a href="<?php echo site_url('stocks/familia_adicionar')?>"class="btn btn-primary btn-200">Adicionar familia...</a></div>
			</div>
			
			<div class="table-responsive  marg-topo ">
				<table class="table table-striped2 " id="tabela_familias">
					<thead class="  cabeca-tabela">
						<th class="text-center">ID</th>
						<th class="text-center">Família</th>
						<th class="text-center" >Parent</th>
						<th class="text-center">Ações</th>
					</thead>
					<tbody>
						<?php foreach($familias as $familia):?>
							<tr>
								<td class="text-center"><?php echo $familia['id_familia'] ?></td>
								<td class="text-center"><?php echo $familia['designacao'] ?></td>
								<td class="text-center"><?php echo $familia['parent'] !=''? $familia['parent']:'-' ?></td>
								<!-- botoes editar deletar -->
								<td class="text-center">
									<a class="btn btn-primary btn-sm btn-100"href="<?php echo site_url('stocks/familia_editar/'.aesEncrypt($familia['id_familia']))?>">
									<i class="fa fa-pencil me-2"></i>Editar
									</a>
									<a class="btn btn-danger btn-sm btn-100" href="<?php echo site_url('stocks/familia_eliminar/'.aesEncrypt($familia['id_familia']))?>">
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



