<?php
	$this->extend('Layout/layout_users')
?>

<?php $this->section('conteudo')?>
    <div class="row mt-2">
		<div class="col-12 text-center ">
			<h3>Familias - Adicionar/Serviços</h3>
        </div>
        <div class="col-md-6 col-md-offset-3 marg-fundo card card-claro">
            <form action="<?php echo site_url('stocks/familia_adicionar_servicos') ?>" method="post">
                <!-- caixa de mensagens -->
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger alerta-apagando p-3 text-center">
                        <?php echo $error ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($success)): ?>
                    <div class="alert alert-success alerta-apagando p-3 text-center">
                        <?php echo $success ?>
                    </div>
                <?php endif; ?>
                <div class=" marg-fundo" >
                    <label>Familia a que pertence:</label>
                    <select class="form-control" name="select_parent">
                        <option value="0">Nenhuma</option>
                        <?php foreach($familias as $familia):?>
                            <option value="<?php echo $familia['id_familia_servicos'] ?>"><?php echo $familia['designacao_servicos'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="mt-3 marg-fundo">
                    <label>Designação:</label>
                    <input class="form-control" type="text" name="text_designacao" required placeholder="família">
                </div>
                <!-- botoes -->
                <br>
                <div class="row text-center">
                    <div class="row col-md-10 col-md-offset-2  ">
                        <div class="col-md-5  marg-fundo">
                            <a class=" btn cor-botao-secondary btn-200 marg-fundo" href="<?php echo site_url('stocks/familias_servicos') ?>" class="btn cor-botao-secondary btn-200">Voltar</a>
                        </div>
                        <div class="col-md-5  ">
                            <button class="btn btn-primary btn-200">Salvar</button>
                        </div>
                    </div>        
                </div>
                <br>
            </form>
        </div>
    </div>
<?php $this->endSection()?>