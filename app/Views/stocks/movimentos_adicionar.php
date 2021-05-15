<?php
	$this->extend('Layout/layout_users')
?>

<?php $this->section('conteudo')?>
    <div class="row mt-2">
		<div class="col-12 text-center ">
			<h3>Movimentos - Adicionar</h3>
        </div>
        <div class="col-md-6 col-md-offset-3 marg-fundo card card-claro">
            <form action="<?php echo site_url('stocks/movimento_adicionar') ?>" method="post">
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
                <div class=" marg-fundo" >
                    <label>Produtos</label>    
                    <select class="form-control" name="select_parent">
                        <option value="0">Nenhum</option>
                        <?php foreach($produtos as $produto):?>
                            <option value="<?php echo $produto['id_produto'] ?>"><?php echo $produto['nome_produto'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col-4 marg-fundo">
                    <label>Quantidade:</label>
                    <input  name="text_quantidade" min="0" max="100000"  class="largura-240px form-control " type="number" value="0" required >                
                </div>  
                
                <div class="mt-3 marg-fundo">
                    <label>Observação:</label>
                    <input class="form-control" type="int" name="text_obs" required placeholder="Observação">
                </div>
                <!-- botoes -->
                <br>
                <div class="row text-center">
                    <div class="row col-md-10 col-md-offset-2  ">
                        <div class="col-md-5  marg-fundo">
                            <a class=" btn cor-botao-secondary btn-200 marg-fundo" href="<?php echo site_url('stocks/movimentos') ?>" class="btn cor-botao-secondary btn-200">Cancelar</a>
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