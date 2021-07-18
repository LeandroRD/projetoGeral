<?php
	$this->extend('Layout/layout_users');
	
	helper('funcoes');
	
?>
<?php $this->section('conteudo')?>
	<div class="row mt-1">
		<div class="col-12 ">
			<h1>Produtos</h1>
				
			<div class="row ">
				<!-- botao adicionar -->
				<div class="col-6  marg-esq-20"><a href="<?php echo site_url('stocks/produtos_adicionar')?>"class="btn btn-primary">Adicionar Produto...</a></div>
			</div>
			<br>
			<div class="table-responsive  marg-topo">
				<table class="table table-striped2 marg-topo  " id="tabela_produtos">
					<thead class="cabeca-tabela">
						<!-- <th>ID</th> -->
						<th>Produto</th>
						<th>Familia</th>
						<th class="text-end">Preço/unidade</th>
						<th class="text-center">Quantidade</th>
						<th class="text-center">Taxa</th>
						<th class="text-center">Ações</th>
					</thead>
					<tbody>
						<?php foreach($produtos as $produto):?>
							<tr>	
								<td class="align-middle"><?php echo $produto['nome_produto'] ?></td>
								<td class="align-middle"><?php echo $produto['familia'] ?></td>
								<td class="text-end align-middle "><?php echo $produto['preco'] ?></td>
								<td class="text-center align-middle"><?php echo $produto['quantidade'] ?></td>
								<td class="text-center align-middle"><?php echo $produto['taxa'].'('.$produto['percentagem']. ' %) ' ?></td>
								<td class="text-center">
									<a class="btn btn-primary btn-sm btn-100 m-1 align-middle"href="<?php echo site_url('stocks/produtos_editar/'.aesEncrypt($produto['id_produto']) )?>">
										<i class="fa fa-pencil me-2"></i>Editar
									</a>
									<a class="btn btn-danger btn-sm btn-100 m-1" href="<?php echo site_url('stocks/produtos_eliminar/'.aesEncrypt($produto['id_produto']))?>">
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
	    	$('#tabela_produtos').DataTable({
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

