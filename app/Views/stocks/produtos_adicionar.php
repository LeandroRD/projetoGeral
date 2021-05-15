<?php
	$this->extend('Layout/layout_users');
     //limpar campos ao entrar a primeira vez 
     $designacao_produto = '';
     $descricao = '';
     $preco = '';
     $quantidade = '';
     $detalhes = '';

     if($_SERVER['REQUEST_METHOD']=='POST'){
        
        //recolher  dados apos submeter
        $designacao_produto = $_POST['text_designacao'];
        $descricao = $_POST['text_descricao'];
        $preco = $_POST['text_preco'];
        $quantidade = $_POST['text_quantidade'];
        $detalhes = $_POST['text_detalhes'];
     }
?>
<?php $this->section('conteudo')?>
    <div class="row mt-2">
		<div class="col-12 text-center">
			<h3>Produtos - Adicionar</h3>
			<hr>
        </div>
        <div class=" col-md-6 col-md-offset-3 marg-fundo card card-claro">
            <!-- necessario inserir a propriedade enctype="multipart/form-data"
             para submeter arquivo JPG -->
            <form action="<?php echo site_url('stocks/produtos_adicionar') ?>" method="post" enctype="multipart/form-data">
                <?php if(isset($error)): ?>
                    <div class="alerta-apagando alert alert-danger p-3 text-center">
                        <?php echo $error ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($success)): ?>
                    <div class="alerta-apagando alert alert-success p-3 text-center">
                        <?php echo $success ?>
                    </div>
                <?php endif; ?>
                <!-- familias -->
                <div class="mt-3">
                    <label>Família do produto:</label>
                    <select name="combo_familia" class="form-control marg-fundo" >
                        <option value="0">Nenhuma</option>
                        <?php foreach($familias as $familia):?>
                            <option value="<?php echo $familia['id_familia'] ?>"><?php echo $familia['designacao']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <!--designacao-->
                <div class="mt-3">
                    <label>Designação do produto:</label>
                    <input type="text" value = "<?php echo $designacao_produto?>" name="text_designacao" class="marg-fundo form-control" placeholder="Designação do produto" required>
                </div>
    
                <!--  descricao-->
                <div class="mt-3 ">
                    <label>Descrição do produto:</label>
                    <textarea name="text_descricao"  class="form-control marg-fundo" placeholder="Descrição"><?php echo $descricao?></textarea>
                </div>

                 <!--  imagem-->
                <div class="mt-3 mb-3 card card-claro  p-4 marg-fundo">
                     <label class="mb-2">Imagem do produto:</label>
                     <input type="file" class="form-control" name="file_imagem"accept=".jpg, .png" required>
                </div>

                <!--  preço-->
                <div class=" mt-2 mb-2 marg-fundo" >
                    <div class="col-2">
                        <label class="">Preço/Unidade (R$):</label>
                    </div>
                    <div class="col-3">
                        <input name="text_preco" value = "<?php echo $preco?>" min="0" max="100000" step="0.05" class="form-control largura-240px" type="number" required >                
                    </div>  
                </div>

                <!--  taxa-->
                <div class=" mt-2 mb-2 marg-fundo " >
                    <div class="col-2">
                        <label>Taxa / Imposto:</label>
                    </div>
                    <div class="col-3">
                        <select name="combo_taxa" class="form-control" >
                            <option value="0">Nenhuma (0 %)</option>
                            <?php foreach($taxas as $taxa):?>
                                <option value="<?php echo $taxa['id_taxas'] ?>"><?php echo $taxa['designacao'].'('.$taxa['percentagem'].' %)'?></option>
                            <?php endforeach;?>
                        </select>                       
                    </div>  
                </div>

                <!--  quantidade-->
                <div class=" mt-2 mb-2 marg-fundo" >
                    <div class="col-2">
                        <label>Quantidade:</label>
                    </div>
                    <div class="col-4">
                        <input value = "<?php echo $quantidade?>"  name="text_quantidade" min="0" max="100000"  class="largura-240px form-control " type="number" value="0" required >                
                    </div>  
                </div>

                <!--  detalhes-->
                <div class="mt-2 mb-2 marg-fundo">
                    <label>Detalhes:</label>
                    <textarea name="text_detalhes"  class="form-control" placeholder="Detalhes" ><?php echo $detalhes?></textarea>
                </div>
                <!-- botoes -->
                <br>
                <div class="row text-center">
                    <div class="row col-md-10 col-md-offset-2  ">
                        <div class="col-md-5  marg-fundo">
                            <a class=" btn cor-botao-secondary btn-200 marg-fundo" href="<?php echo site_url('stocks/produtos') ?>" class="btn cor-botao-secondary btn-200">Cancelar</a>
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