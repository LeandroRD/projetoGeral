<?php
	$this->extend('Layout/layout_stocks');
    
    // tratar o id do produto a editar
    helper('funcoes');
    $id = aesEncrypt($produto['id_produto']);
?>

<?php $this->section('conteudo')?>
    <div class="row mt-2 ">
		<div class="col-12 text-center">
			<h3>Produto - Editar</h3>
			<hr>
        </div>
        <div class="col-12 mt-3 card card-claro">
            
            <!-- necessario inserir a propriedade enctype="multipart/form-data"
             para submeter arquivo JPG -->
            <form action="<?php echo site_url('stocks/produtos_editar/'.$id) ?>" method="post" enctype="multipart/form-data">
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
                <div class=" col-md-6 col-md-offset-3 marg-fundo ">
                    <label>Família do produto:</label>
                    <select name="combo_familia" class="form-control" >
                        <?php if($produto['id_familia']== 0):?>
                            <option value="0" selected>Nenhuma</option>
                        <?php else:?>
                            <option value="0" >Nenhuma</option>
                        <?php endif;?>
                            <?php foreach($familias as $familia):?>
                                <?php if($produto['id_familia']== $familia['id_familia']):?>
                                    <option value="<?php echo $familia['id_familia'] ?>" selected ><?php echo $familia['designacao']?></option>
                                <?php else:?>
                                    <option value="<?php echo $familia['id_familia'] ?>"  ><?php echo $familia['designacao']?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                    </select>
                </div>
                
                <!--designacao-->
                <div class="mt-3 col-md-6 col-md-offset-3 marg-fundo">
                    <label>Designação:</label>
                    <input type="text" name="text_designacao" class="form-control" placeholder="Designação do produto" required value="<?php echo $produto['designacao'] ?>">
                </div>
    
                <!--  descricao-->
                <div class="mt-3 col-md-6 col-md-offset-3 marg-fundo ">
                    <label>Descrição:</label>
                    <textarea name="text_descricao"  class="form-control" placeholder="Descrição" ><?php echo $produto['descricao'] ?></textarea>
                </div>

                 <!--  imagem-->               
                <div class="  mt-3 mb-3  col-md-12  p-4 ">
                    <div class="row">
                        <div class="col-sm-3 ">
                            <img src="<?php echo base_url('assets/product_images/'.$produto['imagem'])?>" class="img-thumbnail" alt="Imagem do produto..">
                        </div>
                        <div class="col-md-6  col-sm-7 ">
                            <label class="mb-2">Imagem do produto:</label>
                            <input type="file" class="form-control" name="file_imagem"accept=".jpg, .png" >
                        </div>
                    </div>    
                </div>

                <!--  preço-->
                <div class="row mt-2 mb-2 col-md-6 col-md-offset-3  " >
                    <div class="col-2">
                        <label class="">Preço/Unidade (R$):</label>
                    </div>
                    <div class="col-3">
                        <input name="text_preco" min="0" max="100000" step="0.05" class="form-control largura-240px" type="number" value="<?php echo $produto['preco'] ?>" required >                
                    </div>  
                </div>

                <!--  taxa-->
                <div class="row mt-2 mb-2  col-md-6 col-md-offset-3  " >
                    <div class="col-2">
                        <label>Taxa / Imposto:</label>
                    </div>
                    <div class="col-3">
                        <select name="combo_taxa" class="form-control" >
                            <?php if($produto['id_taxa']==0): ?>
                                <option value="0" selected>Nenhuma (0 %)</option>
                            <?php else: ?>
                                <option value="0" >Nenhuma (0 %)</option>
                            <?php endif;?>
                            
                            <?php foreach($taxas as $taxa):?>
                                <?php if($produto['id_taxa'] == $taxa['id_taxas']):?>
                                    <option value="<?php echo $taxa['id_taxas'] ?>" selected><?php echo $taxa['designacao'].'('.$taxa['percentagem'].' %)'?></option>
                                <?php else:?>
                                    <option value="<?php echo $taxa['id_taxas'] ?>"><?php echo $taxa['designacao'].'('.$taxa['percentagem'].' %)'?></option>
                                <?php endif;?>                               
                            <?php endforeach;?>
                        </select>                       
                    </div>  
                </div>

                <!--  quantidade-->
                <div class="row mt-2 mb-2  col-md-6 col-md-offset-3 " >
                    <div class="col-2">
                        <label>Quantidade:</label>
                    </div>
                    <div class="col-4">
                        <input  name="text_quantidade" min="0" max="100000"  class="largura-240px form-control " type="number"  required value=<?php echo $produto['quantidade'] ?> >               
                    </div>  
                </div>

                <!--  detalhes-->
            
                <div class="row ">
                    <div class="  col-md-6 col-md-offset-3 ">
                        <div class="padding-dir-esq-10 marg-fundo">
                            <label>Detalhes:</label>
                            <textarea name="text_detalhes" class="form-control" placeholder="Detalhes" ><?php echo $produto['detalhes'] ?></textarea>
                        </div>
                        <div class="text-center marg-fundo">
                            <div class="marg-fundo">
                                <a href="<?php echo site_url('stocks/produtos') ?>" class="btn cor-botao-secondary btn-200 ">Cancelar</a>                       
                            </div>
                            <button class="btn btn-primary btn-200">Atualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $this->endSection()?>