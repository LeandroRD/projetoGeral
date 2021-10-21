<?php
$this->extend('Layout/layout_users');
helper('funcoes');

?>
<?php $this->section('conteudo') ?>
<div class="marg-dir-esq-20px ">
	<div class="row marg-topo-menos-15  ">
		<div class="col-6 text-start  ">
			<div class="col-6 align-self-end">
				<h1>Check List Editar </h1>
			</div>
		</div>
		<div class="col-6 text-start  ">
			<div class="col-6 align-self-end"><a href="<?php echo site_url('stocks/cotacoes') ?>" class="btn  cor-botao-secondary  btn-150   ">Voltar</a> </div>
		</div>
		<br>
		<span class="tamanho-1em">Adicionar novos itens no check-list.</sp>
			<form action="<?php echo site_url('stocks/ItemCheckList_adicionar') ?>" method="post">
				<div class="row">
					<div class="col-md-6">
						<input class="form-control col-md-6" type="text" name="text_novoItemCheckList" id="text_checkList">
					</div>
					<div class="col-md-4">
						<button onclick=" enviar_item_novo('') " class="btn btn-primary btn-200">Adicionar Novo item...</button>
					</div>
				</div>
				
				<input type="hidden" name="id_servico" value="<?php echo $get_checkList['id_servico']  ?>"> </input>
				<!-- caixa de alertas -->
				<br>
				<div class="col-md-6 col-md-offset-3">
					<?php if (isset($error)) : ?>
						<div class="alert alert-danger alerta-apagando p-3 text-center">
							<?php echo $error ?>
						</div>
					<?php endif; ?>
					<?php if (isset($success)) : ?>
						<div class="alert alert-success alerta-apagando p-3 text-center">
							<?php echo $success ?>
						</div>
					<?php endif; ?>
				</div>
			</form>
			<br>
			<div class="col-md-8">
				<div class="d-inline2 ">
					<strong class="tamanho-1_5em">Check List: &nbsp;&nbsp;</strong>
				</div>
				<div class="d-inline2">
					<span class="cor-alerta3"><strong> <?php echo $get_checkList['servicos'] ?></strong></span>
				</div>
			</div>
			<div class="col-md-12 table-responsive  marg-topo ">
				<table class="table table-striped2 " id="tabela_familias">
					<thead class="  cabeca-tabela">
						<th class="text-center">ID</th>
						<th class="text-center">Check List's</th>
						<th class="text-center">Ações</th>
					</thead>
					<tbody>
						<?php foreach ($checklists_editar as $checklist) : ?>
							<tr>
								<td class="text-center"><?php echo $checklist['id_checklist'] ?></td>
								<td class="text-center"><?php echo $checklist['check_list'] ?></td>
								<td class="text-center">
									<a class=" btn btn-primary btn-sm btn-100" href="<?php echo site_url('stocks/itemCheck_editar/'.$checklist['id_checklist'].'/'.$checklist['check_list'])  ?>">
										<i class="fa fa-pencil me-2"></i> Editar
									</a>
									<a class="btn btn-danger btn-sm btn-100" href="<?php echo site_url('stocks/itemCheck_eliminar/'.$checklist['id_checklist'].'/'.$checklist['check_list'] ) ?>">
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