<?php
	$this->extend('Layout/layout_stocks')
?>
<?php $this->section('conteudo')?>
	<div class="row mt-2">
		<div class="col-12 ">
			<h4>Produtos</h4>
			<hr>	
			<div class="row mb-3">
				<div class="col-6 align-self-end"><h5>Produtos: </h5></div>
				<div class="col-6 text-end"><a href="<?php echo site_url('stocks/familia_adicionar')?>"class="btn btn-primary">Adicionar familia...</a></div>
			</div>
			<table class="table table-striped" id="tabela_produtos">
				<thead class="table-dark">
					<th>ID</th>
					<th>Produto</th>
					<th>Familia</th>
					<th>Preço/unidade</th>
					<th class="text-center">Taxa</th>
					<th class="text-center">Quantidade</th>
					<th class="text-end">Ações</th>
				</thead>
				<tbody>
					<?php foreach($produtos as $produto):?>
						
					<?php endforeach;?>
				</tbody>
			</table>
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

