<?php
	$this->extend('Layout/layout_stocks');
    // tratar o id do produto a editar
    helper('funcoes');
    $id_familia = aesEncrypt($familia['id_familia']);
?>

<?php $this->section('conteudo')?>
    <div class="row mt-2">
		<div class="col-12 text-center ">
			<h3>Família - Eliminar</h3>
			<hr>
        </div>
        <div class="col-12 mt-3">
            <div class="card p-4 text-center bg-warning">
                <h4>Tem a certeza que prentende eliminar o Produto ?!</h4>  
                <h3> <b><?php echo $familia['designacao'] ?></h3></b> 
                <div class="row">
                    <div class="row col-md-6 col-md-offset-3 ">
                        <div class="col-md-5 col-md-offset-1 marg-fundo">
                            <a class=" btn cor-botao-secondary btn-200 marg-fundo" href="<?php echo site_url('stocks/familias') ?>">Não</a>
                        </div>
                        <div class="col-md-5  ">
                            <a class=" btn btn-primary btn-200 marg-leftmenos20px" href="<?php echo site_url('stocks/familia_eliminar/'.$id_familia.'/sim')?> ">Sim</a>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection()?>