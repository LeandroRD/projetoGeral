<?php
	$this->extend('Layout/layout_users');
	helper('funcoes');
?>
<?php $this->section('conteudo')?>
	<div class="row mt-1">
		<div class="col-12 ">
			<h1>Fornecedores</h1>	
			<div class="row ">
				<!-- botao adicionar -->
				<div class="col-6  marg-esq-20"><a href="<?php echo site_url('stocks/fornecedores_adicionar')?>"class="btn btn-primary">Adicionar Fornecedor...</a></div>
			</div>
			<br>
			<div class="table-responsive  marg-topo">
				<table class="table  table-striped2  marg-topo" id="tabela_fornecedor">
					<thead class="cabeca-tabela" >
						<th>ID</th>
						<th>Razão Social</th>
						<th>Serviços</th>
						<th class="text-center">Município</th>
						<th class="text-center">Estado</th>
						<th class="text-center ">Ações</th>
					</thead>
					<tbody>
						<?php foreach($fornecedores as $fornecedor):?>
							<tr >
								<td ><?php echo $fornecedor['id_for'] ?></td>
								<td><?php echo $fornecedor['razao_social'] ?></td>
								<td><?php echo $fornecedor['nome_servico'] ?></td>
								<td class="text-center"><?php echo $fornecedor['municipio']  ?> </td>
								<td class="text-center"><?php echo $fornecedor['estado']  ?> </td>
								<td class="text-center">
								<!-- botoes editar/deletar -->
									<a class="btn btn-primary btn-sm btn-100"href="<?php echo site_url('stocks/fornecedor_editar/'.aesEncrypt($fornecedor['id_for']))?>">
										<i class="fa fa-pencil me-2"></i>Editar
									</a>
									<a class="btn btn-danger btn-sm btn-100" href="<?php echo site_url('stocks/fornecedor_eliminar/'.aesEncrypt($fornecedor['id_for']))?>">
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
	    	$('#tabela_fornecedor').DataTable({
				"language": {
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
		});
	</script>
<?php $this->endSection()?>

