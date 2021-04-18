<?php
	$this->extend('Layout/layout_stocks')
?>

<?php $this->section('conteudo')?>
    
    <div class="row mt-2">
		<div class="col-12 text-center ">
			<h3>Taxa - Editar</h3>
        </div>
        <div class="col-md-6 col-md-offset-3">
            <form action="<?php echo site_url('stocks/taxas_editar/'.$taxa['id_taxas']) ?>" method="post">
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger p-3 text-center">
                        <?php echo $error ?>
                    </div>
                <?php endif; ?>
                <div class="mt-3 marg-fundo">
                    <label>Nome:</label>
                    <input class="form-control" type="text" name="text_designacao" required value="<?php echo $taxa['designacao'] ?>">
                </div>
                <div class="mt-3 marg-fundo">
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
                
                <div class="row text-center ">
                    <div class="row col-md-12  ">
                        <div class="col-md-5 col-md-offset-1 marg-fundo">
                            <a href="<?php echo site_url('stocks/taxas') ?>" class="btn cor-botao-secondary btn-200">Cancelar</a>
                        </div>
                        <div class="col-md-6 marg-fundo ">
                            <button class="btn btn-primary btn-200 ">Atualizar</button>
                        </div>
                    </div>        
                </div>


            </form>
        </div>
    </div>
<?php $this->endSection()?>
