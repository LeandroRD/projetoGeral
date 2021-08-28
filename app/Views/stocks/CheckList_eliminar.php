<?php
	$this->extend('Layout/layout_users');
    // tratar o id do produto a editar
    helper('funcoes');
    $id_itemCheck = $itemCheck['id_servico'];
    // $Checklist =  $itemCheck['check_list'];
    // $id_servico = $itemCheck['id_servico'];
?>

<?php $this->section('conteudo')?>
    <div class="row mt-2">
		<div class="col-12 text-center">
			<h3> Check List - Eliminar</h3>
        </div>
        <div class="row col-md-6 col-md-offset-3 col-12 mt-3  card card-claro"> 
            <div class=" p-4 text-center ">
                <br>
                <h4 class="cor-alerta-del">Tem a certeza que prentende eliminar este Check List completo ???!!</h4>  
                <br>
                <h4> <b><?php echo $itemCheck['servicos'] ?></h4></b> 
                <br>
                <!-- botoes -->
                <div class=" col-md-10 col-md-offset-1 ">
                    <div class="col-md-5 col-md-offset-1 marg-fundo">
                        <a class="btn cor-botao-secondary btn-200 marg-fundo" href="<?php echo site_url('stocks/cotacoes') ?>">Não</a>
                    </div>
                    <div class="col-md-5  ">
                        <a class="btn btn-primary btn-200" href="<?php echo site_url('stocks/CheckList_eliminar/'.$id_itemCheck.'/sim')?> ">Sim</a>
                    </div>
                </div>
            </div>
            <br><br><br>
        </div>
    </div>
<?php $this->endSection()?>