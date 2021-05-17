<?php
	$this->extend('Layout/layout_users');
    // tratar o id do produto a editar
    helper('funcoes');
    $id_familia = aesEncrypt($familia['id_familia_servicos']);
    
    // limpar campos apos adicionar novo fornecedor
    if(isset($success)){
        $designacao_value = '';
       
    }else{

        $designacao_value = $familia['designacao_servicos'];
    }

     
?>

<?php $this->section('conteudo')?>
    <div class="row mt-2">
		<div class="col-12 text-center ">
			<h3>Família Serviços - Editar </h3>	
        </div>
        
        <div class="col-md-6 col-md-offset-3 card card-claro">
        
            <form action="<?php echo site_url('stocks/familia_editar_servicos_confirmar/'.$id_familia) ?>" method="post">
                <!-- caixa de mensagens -->
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

                <div >
                    <label>Familia a que pertence:</label>
                    <select class="form-control" name="select_parent">
                        <?php
                            $familia_nenhuma = '';
                            if($familia['id_parent_servicos']==0){
                                $familia_nenhuma = "selected";
                            }
                        ?>       
                        <option value="0"<?php echo $familia_nenhuma ?>>Nenhuma</option>
                        <?php foreach($familias as $fTemp):?>
                            <?php 
                                $familia_parent = '';
                                if($fTemp['id_familia_servicos']==$familia['id_parent_servicos']){
                                    $familia_parent = 'selected';       
                                }
                            ?>
                            <?php if($familia['id_familia_servicos']!= $fTemp['id_familia_servicos']): ?>
                                <option value="<?php echo $fTemp['id_familia_servicos'] ?>"<?php echo $familia_parent?>><?php echo $fTemp['designacao_servicos'];?></option>
                            <?php endif; ?>    
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="mt-3 marg-fundo  ">
                    <label>Designação:</label>
                    <input class="form-control" type="text" name="text_designacao" required value=<?php echo $designacao_value?>>
                </div>
                <!-- botoes -->
                <div class="row text-center ">
                    <div class="row  col-md-8 col-md-offset-2">
                        <div class="marg-fundo col-md-6 ">
                            <a href="<?php echo site_url('stocks/familias') ?>" class="btn cor-botao-secondary btn-200">Cancelar</a>                   
                        </div>
                        <div class="marg-fundo col-md-6 ">
                            <button class="btn btn-primary btn-200">Atualizar</button>          
                        </div> 
                    </div>    
                </div>
            </form>
        </div>
    </div>
<?php $this->endSection()?>
