<?php
	$this->extend('Layout/layout_stocks')
?>

<?php $this->section('conteudo')?>
    <div class="row mt-2">
		<div class="col-12 ">
			<h4>Taxas > Editar</h4>
			<hr>
        </div>
        <div class="col-12 mt-3">
        
            <form action="<?php echo site_url('stocks/taxas_editar/'.$taxa['id_taxas']) ?>" method="post">
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger p-3 text-center">
                        <?php echo $error ?>
                    </div>
                <?php endif; ?>
                <div class="mt-3">
                    <label>Nome:</label>
                    <input class="form-control" type="text" name="text_designacao" required value="<?php echo $taxa['designacao'] ?>">
                </div>
                <div class="mt-3">
                <label>Valor da taxa (%):</label>
                <input class="form-control" 
                           type="number"
                           name="text_percentagem"
                           step="0.01"
                           min = "0"
                           max = "100"
                           placeholder="0.00"
                           value="<?php echo $taxa['percentagem'] ?>" 
                           required >
                </div>
                <div class="mt-3">
                    <a href="<?php echo site_url('stocks/taxas') ?>" class="btn btn-secondary btn-150">Cancelar</a>
                    <button class="btn btn-primary btn-150">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
<?php $this->endSection()?>
