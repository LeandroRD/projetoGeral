<?php
	$this->extend('Layout/layout_stocks')
?>

<?php $this->section('conteudo')?>

	<div class="row mt-2">
		<div class="col-12 ">
			<h4>Familias</h4>
			<hr>
			<!--
				Apresentacao da table com as familias registradas / botao para acionar nova familia
				total de familias
				em cada row de familia, bota para editar e eliminar
			--->
			<div class="row mb-3">
				<div class="col-6 align-self-end"><h5>Famílias de produtos: </h5></div>
				<div class="col-6 text-end"><a href="<?php echo site_url('stocks/familia_adicionar')?>"class="btn btn-primary">Adicionar familia...</a></div>
			</div>
			
			<table class="table table-striped">
				<thead class="table-dark">
					<th>ID</th>
					<th>Família</th>
					<th>Parent</th>
					<th class="text-end">Ações</th>
				</thead>
				<tbody>
					<?php foreach($familias as $familia):?>
						<tr>
							<td><?php echo $familia['id_familia'] ?></td>
							<td><?php echo $familia['designacao'] ?></td>
							<td><?php echo $familia['parent'] !=''? $familia['parent']:'-' ?></td>

							<td class="text-end">
								<a href="<?php echo site_url('stocks/familia_editar/'.$familia['id_familia'])?>">Editar</a>
								<span class="ms-2 me-2">|</span>
								<a href="<?php echo site_url('stocks/familia_eliminar/'.$familia['id_familia'])?>">Eliminar</a>
							</td>
						</tr>
					<?php endforeach;?>


				</tbody>
			</table>
		</div>
	</div>
	

<?php $this->endSection()?>

