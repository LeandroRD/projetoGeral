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
				<div class="col-6 text-end"><a href=""class="btn btn-primary">Adicionar familia...</a></div>
			</div>
			
			<table class="table table-stripped">
				<thead class="table-dark">
					<th>ID</th>
					<th>Familia</th>
					<th>Ações</th>
				</thead>
				<tbody>
					<?php foreach($familias as $familia):?>
						<tr>
							<td><?php echo $familia['id_familia'] ?></td>
							<td><?php echo $familia['designacao'] ?></td>
						</tr>

					<?php endforeach;?>


				</tbody>
			</table>
		</div>
	</div>
	

<?php $this->endSection()?>

