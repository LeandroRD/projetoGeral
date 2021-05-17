<?php
	$this->extend('Layout/layout_users');
    // tratar o id do produto a editar
    helper('funcoes');
    $id_taxa = aesEncrypt($taxa['id_taxas']);
?>

<?php $this->section('conteudo')?>
    <div class="row mt-2">
		<div class="col-12 text-center">
			<h3>Taxas - Eliminar</h3>
        </div>
        <div class="row col-md-6 col-md-offset-3 col-12 mt-3  card card-claro"> 
            <div class="card p-4 text-center ">
                <h5>Tem a certeza que prentende eliminar a taxa !?</h5>  
                <h3> <b><?php echo $taxa['designacao']." = ".$taxa['percentagem'] . '%' ?></h3></b> 
                <div class=" col-md-10 col-md-offset-1 ">
                    <div class="col-md-5 col-md-offset-1 marg-fundo">
                        <a class="btn cor-botao-secondary btn-200 marg-fundo" href="<?php echo site_url('stocks/taxas') ?>">Não</a>
                    </div>
                    <div class="col-md-5  ">
                        <a class="btn btn-primary btn-200" href="<?php echo site_url('stocks/taxas_eliminar/'.$id_taxa.'/sim')?> ">Sim</a>
                    </div>
                </div>     
            </div>
        </div>
    </div>
<?php $this->endSection()?>