<?php
	$this->extend('Layout/layout_stocks');
	helper('funcoes');
?>
<?php $this->section('conteudo')?>
	<div class="text-end ">
        <?php echo view('users/userbar') ?>
    </div>

	<div class="row mt-2 ml-3">
		<div class="col-12 ">
			
		
			<!--
				Apresentacao da table com as familias registradas / botao para acionar nova familia
				total de familias
				em cada row de familia, bota para editar e eliminar
			--->
			<div class="row mb-2  ">
				<div class="col-6 align-self-end"><h1>Famílias de produtos: </h1></div>
				<div class="col-6 "><a href="<?php echo site_url('stocks/familia_adicionar')?>"class="btn btn-primary btn-200">Adicionar familia...</a></div>
			</div>
			
			<div class="table-responsive  marg-topo">
				<table class="table table-striped" id="tabela_familias">
					<thead class="table-dark">
						<th>ID</th>
						<th class="text-center">Família</th>
						<th class="text-center" >Parent</th>
						<th class="text-center">Ações</th>
					</thead>
					<tbody>
						<?php foreach($familias as $familia):?>
							<tr>
								<td><?php echo $familia['id_familia'] ?></td>
								<td class="text-center"><?php echo $familia['designacao'] ?></td>
								<td class="text-center"><?php echo $familia['parent'] !=''? $familia['parent']:'-' ?></td>
						
								<td class="text-center">
									<a class="btn btn-primary btn-sm btn-100"href="<?php echo site_url('stocks/familia_editar/'.aesEncrypt($familia['id_familia']))?>">
									<i class="fa fa-pencil me-2"></i>Editar
									</a>
									<!-- <span class="ms-2 me-2">|</span> -->
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
	<script>
	$(document).ready( function () {
    $('#tabela_familias').DataTable({"language": {
    "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    },
    "select": {
        "rows": {
            "_": "Selecionado %d linhas",
            "0": "Nenhuma linha selecionada",
            "1": "Selecionado 1 linha"
        }
    },
    "buttons": {
        "copy": "Copiar para a área de transferência",
        "copyTitle": "Cópia bem sucedida",
        "copySuccess": {
            "1": "Uma linha copiada com sucesso",
            "_": "%d linhas copiadas com sucesso"
        }
    }
}
		});
} );
</script>
<?php $this->endSection()?>



