<?php
	$this->extend('Layout/layout_users')
?>

<?php $this->section('conteudo')?>
    <div class="row mt-2">
		<div class="col-12 text-center ">
			<h3>Taxas - Adicionar</h3>
			<hr>
        </div>
        <div class="col-md-6 col-md-offset-3">
            <form action="<?php echo site_url('stocks/taxas_adicionar') ?>" method="post">
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger p-3 text-center alerta-apagando">
                        <?php echo $error ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($success)): ?>
                    <div class="alert alert-success p-3 text-center alerta-apagando">
                        <?php echo $success ?>
                    </div>
                <?php endif; ?>
               
                <div class="mt-3">
                    <label>Designação:</label>
                    <input class="form-control" 
                           type="text" 
                           name="text_designacao" 
                           required >
                </div>
                <div class="mt-3 marg-fundo">
                    <label>Valor da taxa (%):</label>
                    <input class="form-control" 
                           type="number"
                           name="text_valor"
                           step="0.01"
                           min = "0"
                           max = "100"
                           placeholder="0.00" 
                           required >
                </div>
                
                <div class="row col-md-12 text-center  ">
                        <div class="col-md-5 col-md-offset-1 marg-fundo">
                        <a href="<?php echo site_url('stocks/taxas') ?>" class="btn cor-botao-secondary btn-200">Cancelar</a>
                        </div>
                        <div class="col-md-5  ">
                        <button class="btn btn-primary btn-200">Salvar</button>
                        </div>
                    </div>  
            </form>
        </div>
    </div>
<?php $this->endSection()?>