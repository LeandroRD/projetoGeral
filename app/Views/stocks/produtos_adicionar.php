<?php
	$this->extend('Layout/layout_stocks');
    
    

?>

<?php $this->section('conteudo')?>
<?php
// echo '<pre>';
//     print_r($familias);
//     echo"<br>";
//     print_r($taxas);
//     echo '</pre>';
?>

    <div class="row mt-2">
		<div class="col-12 ">
			<h4>Produtos > Adicionar</h4>
			<hr>
        </div>
        <div class="col-12 mt-3">
            <form action="<?php echo site_url('stocks/produtos_adicionar') ?>" method="post">
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger p-3 text-center">
                        <?php echo $error ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($success)): ?>
                    <div class="alert alert-success p-3 text-center">
                        <?php echo $success ?>
                    </div>
                <?php endif; ?>
                <!-- familias -->
                <div class="mt-3">
                    <label>Família do produto:</label>
                    <select name="combo_familia" class="form-control" >
                        <option value="0">Nenhuma</option>
                        <?php foreach($familias as $familia):?>
                            <option value="<?php echo $familia['id_familia'] ?>"><?php echo $familia['designacao']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <!--designacao-->
                <div class="mt-3">
                    <input type="text" name="text_designacao" class="form-control" placeholder="Designação do produto">
                </div>
    
                <!--  inscricao-->
                <div class="mt-3">
                    <textarea name="text_descricao"  class="form-control" placeholder="Descrição"></textarea>
                </div>
                 <!--  imagem-->
                 <div class="mt-3">
                     <label >Imagem do produto:</label>
                     <input type="file" class="form-control">

                 </div>

                <!--  preço-->
                <div class="row mt-2 mb-2" >
                    <div class="col-2">
                        <label>Preço/Unidade (R$):</label>
                    </div>
                    <div class="col-4">
                        <input style="width: 200px; " name="text-preco" min="0" max="100000" step="0.05" class="form-control " type="number"  >                
                    </div>  
                </div>

                <!--  taxa-->
                <div class="mt-3">
                    <label>Taxa / Imposto:</label>
                    <select name="combo_taxa" class="form-control" >
                        <option value="0">Nenhuma (0 %)</option>
                        <?php foreach($taxas as $taxa):?>
                            <option value="<?php echo $taxa['id_taxas'] ?>"><?php echo $taxa['designacao'].'('.$taxa['percentagem'].' %)'?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <!--  quantidade-->
                <div class="row mt-2 mb-2" >
                    <div class="col-2">
                        <label>Quantidade:</label>
                    </div>
                    <div class="col-4">
                        <input style="width: 200px; " name="text-quantidade" min="0" max="100000"  class="form-control " type="number"  >                
                    </div>  
                </div>
                <!--  detalhes-->
                <div class="mt-2 mb-2">
                    <textarea name="text_detalhes" class="form-control" placeholder="Detalhes" ></textarea>

                </div>
                <div>
                    <a href="<?php echo site_url('stocks/produtos') ?>" class="btn btn-secondary btn-150">Cancelar</a>
                    <button class="btn btn-primary btn-150">Salvar</button>
                </div>
            </form>
        </div>
    </div>
<?php $this->endSection()?>