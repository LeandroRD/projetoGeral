<?php
	$this->extend('Layout/layout_users');
    // tratar o id do produto a editar
    helper('funcoes');
    $id_familia = aesEncrypt($familia['id_familia']);
?>

<?php $this->section('conteudo')?>
    <div class="row mt-2">
		<div class="col-12 text-center ">
			<h3>Família - Editar </h3>
			<hr>
        </div>
        <div class="col-md-6 col-md-offset-3">
        
            <form action="<?php echo site_url('stocks/familia_editar/'.$id_familia) ?>" method="post">
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
                <div >
                    <label>Familia a que pertence:</label>
                    <select class="form-control" name="select_parent">
                        <?php
                            $familia_nenhuma = '';
                            if($familia['id_parent']==0){
                                $familia_nenhuma = "selected";
                            }
                        ?>       
                        <option value="0"<?php echo $familia_nenhuma ?>>Nenhuma</option>
                        <?php foreach($familias as $fTemp):?>
                            <?php 
                                $familia_parent = '';
                                if($fTemp['id_familia']==$familia['id_parent']){
                                    $familia_parent = 'selected';       
                                }
                            ?>
                            <?php if($familia['id_familia']!= $fTemp['id_familia']): ?>
                                <option value="<?php echo $fTemp['id_familia'] ?>"<?php echo $familia_parent?>><?php echo $fTemp['designacao'];?></option>
                            <?php endif; ?>    
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="mt-3 marg-fundo">
                    <label>Designação:</label>
                    <input class="form-control" type="text" name="text_designacao" required value="<?php echo $familia['designacao'] ?>">
                </div>
                <div class="row text-center ">
                    <div class="row  col-md-10 col-md-offset-1">
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
