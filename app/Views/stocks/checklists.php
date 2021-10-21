<?php
$this->extend('Layout/layout_users');
helper('funcoes');

?>
<?php $this->section('conteudo') ?>
<div class="marg-dir-esq-20px ">
	<div class="row marg-topo-menos-15  ">
		<div class="col-6 text-start  ">
			<div class="col-6 align-self-end">
				<h1>Lista de Check List's </h1>
			</div>
		</div>
		<div class="col-6 text-start  ">
			<div class="col-6 align-self-end"><a href="<?php echo site_url('stocks/cotacoes') ?>" class="btn  cor-botao-secondary  btn-200   ">Voltar</a> </div>
			<div class="mt-2 mb-2 marg-topo-10 "><a href="<?php echo site_url('stocks/checkList_adicionar') ?>" class="btn btn-primary btn-200">Geração de Check List's</a></div>
		</div>
		<div class=" table-responsive  marg-topo ">
			<div class="col-md-6 col-md-offset-3">
				<?php if (isset($success)) : ?>
					<div class="alert alert-success alerta-apagando p-3 text-center">
						<?php echo $success ?>
					</div>
				<?php endif; ?>
			</div>
			<table class="table table-striped2 " id="tabela_familias">
				<thead class="  cabeca-tabela">
					<th class="text-center">ID</th>
					<th class="text-center">Check List's</th>
					<th class="text-center">Ações</th>
				</thead>
				<tbody>
					<?php foreach ($checklists as $checklist) : ?>
						<tr>
							<td class="text-center"><?php echo $checklist['id_servico'] ?></td>
							<td class="text-center"><?php echo $checklist['servicos'] ?></td>
							<td class="text-center">
								<a class="btn btn-primary btn-sm btn-100" href="<?php echo site_url('stocks/checkLists_editar/' . aesEncrypt($checklist['id_servico'])) ?>">
									<i class="fa fa-pencil me-2"></i> Editar
								</a>
								<a class="btn btn-danger btn-sm btn-100" href="<?php echo site_url('stocks/CheckList_eliminar/' . $checklist['id_servico'])  ?>">
									<i class="fa fa-trash me-2"></i> Eliminar
								</a>
								<a class="btn  btn-sm btn-100 cor-botao-verde" href="<?php echo site_url('stocks/cotacao_adicionar_projeto/' . aesEncrypt($checklist['id_servico'])) ?>">
									<i class="fa fa-trash me-2"></i> Escolher
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