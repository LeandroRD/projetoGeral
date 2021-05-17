<?php
	$this->extend('Layout/layout_users');
?>

<?php $this->section('conteudo')?>
	<div class="text-end ">
        <?php echo view('users/userbar') ?>
    </div>

	<div class="row mt-2">
		<div class="col-12 ">
			<h1>Movimentos: </h1>
			<div class="col-6 marg-fundo ">
				<!-- botao adicionar -->
				<a href="<?php echo site_url('stocks/movimento_adicionar')?>"class="btn btn-primary btn-200 ">Adicionar Movimentos...</a>
			</div>
			<div class="col-6 ">
				<!-- botao baixar  -->
				<a href="<?php echo site_url('stocks/movimento_baixar')?>"class="btn btn-primary btn-200">Baixar Movimentos...</a>
			</div>
			<hr>
			<div class="table-responsive  marg-topo">
				<table class="table table-striped" id="tabela_movimentos">
					<thead class="table-dark">
						<th>ID Produto</th>
						<th>Designação</th>
						<th>Quantidade</th>
						<th>Data Movimentação</th>
						<th>Observações</th>
					</thead>
					<tbody>
					 	<?php foreach($movimentos as $movimento): ?>
							<tr>
								<td><?php echo $movimento['id_produto']  ?></td>
								<td><?php echo $movimento['designacao']  ?></td>
								<td><?php echo $movimento['quantidade']  ?></td>
								<td><?php echo $movimento['data_movimento']  ?></td>
								<td><?php echo $movimento['observacoes']  ?></td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script>
		$(document).ready( function () {
	    $('#tabela_movimentos').DataTable({"language": {
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

