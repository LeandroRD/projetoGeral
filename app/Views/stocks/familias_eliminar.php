<?php
	$this->extend('Layout/layout_stocks')
?>

<?php $this->section('conteudo')?>
    <div class="row mt-2">
		<div class="col-12 ">
			<h4>Familias > Eliminar</h4>
			<hr>
        </div>
        <div class="col-12 mt-3">
        
        <div class="card p-4 text-center bg-warning">
            <h5>Tem a certeza que prentende eliminar a família !?</h5>  
            <h3> <b><?php echo $familia['designacao'] ?></h3></b> 
            <div class="mt-3">
                <a class="btn btn-secondary btn-100" href="<?php echo site_url('stocks/familias') ?>">Não</a>
                <a class="btn btn-primary btn-100" href="<?php echo site_url('stocks/familia_eliminar/'.$familia['id_familia'].'/sim')?> ">Sim</a>
            </div>
        </div>
         

        </div>
    </div>
<?php $this->endSection()?>