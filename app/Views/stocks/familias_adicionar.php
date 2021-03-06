<?php
	$this->extend('Layout/layout_stocks')
?>

<?php $this->section('conteudo')?>
    <div class="row mt-2">
		<div class="col-12 ">
			<h4>Familias > Adicionar</h4>
			<hr>
        </div>
        <div class="col-12 mt-3">
            <form action="" method="post">
                <div >
                    <label>Familia a que pertence:</label>
                    <select class="form-control" name="" id="">
                        <option value="0">Nenhuma</option>
                        <?php foreach($familias as $familia):?>
                            <option value="<?php echo $familia['id_familia'] ?>"><?php echo $familia['designacao'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="mt-3">
                    <label>Designação:</label>
                    <input class="form-control" type="text" name="text_designacao" required placeholder="família">
                </div>
                <div class="mt-3">
                    <a href="<?php echo site_url('stocks/familias') ?>" class="btn btn-secondary btn-150">Cancelar</a>
                    <button class="btn btn-primary btn-150">Salvar</button>
                </div>
            </form>
        </div>

    </div>




<?php $this->endSection()?>