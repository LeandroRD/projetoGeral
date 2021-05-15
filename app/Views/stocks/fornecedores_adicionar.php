<?php
	$this->extend('Layout/layout_users');
        
        //limpar campos ao entrar a primeira vez 
        $razao_social = '';
        $endereco = '';
        $nr = '';
        $complemento = '';
        $bairro = '';
        $cep = '';
        $municipio = '';
        $uf = '';
        $cnpj = '';
        $ie = '';
        $contato = '';
        $telefone = '';
        $celular = '';
        $email = '';
        $obs = '';
   
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        //recolher  dados apos submeter
        $razao_social = $_POST['text_razao_social'];
        $endereco = $_POST['text_endereco'];
        $nr = $_POST['text_numero'];
        $complemento = $_POST['text_complemento'];
        $bairro = $_POST['text_bairro'];
        $cep = $_POST['text_cep'];
        $municipio = $_POST['text_municipio'];
        $uf = $_POST['text_uf'];
        $cnpj = $_POST['text_cnpj'];
        $ie = $_POST['text_ie'];
        $contato = $_POST['text_contato'];
        $telefone = $_POST['text_telefone'];
        $celular = $_POST['text_celular'];
        $email = $_POST['text_email'];
        $obs = $_POST['text_obs'];
    }

    //limpar campos apos adicionar novo fornecedor
    if(isset($success)){
        $razao_social = '';
        $endereco = '';
        $nr = '';
        $complemento = '';
        $bairro = '';
        $cep = '';
        $municipio = '';
        $uf = '';
        $cnpj = '';
        $ie = '';
        $contato = '';
        $telefone = '';
        $celular = '';
        $email = '';
        $obs = ''; 
    }
?>
<?php $this->section('conteudo')?>
    <div class="row mt-2">
		<div class="col-12 text-center">
			<h3>Fornecedores - Adicionar</h3>
        </div>
        <div class=" col-md-6 col-md-offset-3 marg-fundo card card-claro">
            <form action="<?php echo site_url('stocks/fornecedores_adicionar') ?>" method="post" enctype="multipart/form-data">
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
                <!-- familias servicos -->
                <div class="mt-3">
                
                    <label>Família de serviços:</label>
                    <select class="form-control" name="select_parent" >
                        <option value="0">Nenhum</option> 
                        <?php foreach($familias as $familia):?>
                            <option value="<?php echo $familia['id_familia_servicos'] ?>"><?php echo $familia['designacao_servicos'];?></option>   
                        <?php endforeach;?>
                    </select>
                </div>
                <!--Razao Social-->
                <div class="mt-3">
                    <label>Razão Social:</label>
                    <input type="text" name="text_razao_social" class="marg-fundo form-control"  required value = "<?php echo $razao_social?>">
                </div>                
                <div class="row">
                    <div class="col-md-7 col-xs-9">
                        <!--  Endereco-->
                        <label>Endereço:</label>
                        <input type="text" name="text_endereco" value = "<?php echo $endereco?>"  class="form-control marg-fundo" >
                    </div>
                    <div class="col-md-2 col-xs-3  ">
                        <!--  numero-->
                        <label>Nr:</label>
                        <input type="text" name="text_numero"value = "<?php echo $nr?>"  class="form-control marg-fundo" >
                    </div>
                    <div class="col-md-3 col-xs-5 ">
                        <!--  complemento-->
                        <label >Complemento:</label>
                        <input type="text" name="text_complemento"value = "<?php echo $complemento?>"  class=" form-control marg-fundo" >
                    </div>
                    <div class="col-md-8 col-xs-7 mabrg-esq-10px">
                        <!--  bairro-->
                        <label>Bairro:</label>
                        <input type="text" name="text_bairro" value = "<?php echo $bairro?>" class="form-control marg-fundo" >  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4 ">
                        <!--  Cep-->
                        <label>Cep:</label>
                        <input type="text" id="cep"name="text_cep" value = "<?php echo $cep?>" class="form-control marg-fundo" >
                    </div>
                    <div class="col-md-6 col-xs-5 ">
                        <!--  munícipio-->
                        <label>Muwnicípio:</label>
                        <input type="text" name="text_municipio"value = "<?php echo $municipio?>"  class="form-control marg-fundo" >
                    </div>
                        <div class="col-md-2 col-xs-3 ">
                        <!--  UF-->
                        <label>UF:</label>
                        <input type="text" name="text_uf" maxlength="2"value = "<?php echo $uf?>" class="form-control marg-fundo" >       
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12  ">
                        <!-- CNPJ -->
                        <label>CNPJ:</label>
                        <input type="text"  id="cnpj" name="text_cnpj"value = "<?php echo $cnpj?>" class="form-control marg-fundo"  >   
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <!-- Insc Estadual -->
                        <label>Insc.Estadual:</label>
                        <input type="text"  id="ie" name="text_ie" value = "<?php echo $ie?>"class="form-control marg-fundo"   >        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12  ">
                        <!--  contato-->
                        <label>Contato:</label>
                        <input type="text" name="text_contato" value = "<?php echo $contato?>" class="form-control marg-fundo" > 
                    </div>
                    <div class="col-md-4 col-xs-6 ">
                        <!--  telefone-->
                        <label>Telefone:</label>
                        <input type="text" name="text_telefone" id="telefone"value = "<?php echo $telefone?>"  class="form-control marg-fundo" >   
                    </div>
                    <div class="col-md-4 col-xs-6  ">
                        <!--  celular-->
                        <label>Celular:</label>
                        <input type="text" name="text_celular" id="celular"  value = "<?php echo $celular?>" class="form-control marg-fundo" >  
                    </div>
                </div>
                <!--  email-->
                <div class="mt-3 ">
                    <label>Email:</label>
                    <input type="email" name="text_email" value = "<?php echo $email?>" class="form-control marg-fundo" >
                </div>
                <!--  OBS-->
                <div class="mt-3 ">
                    <label>Observações:</label>
                    <input type="text" name="text_obs" value = "<?php echo $obs?>"  class="form-control marg-fundo" >
                </div>
                <!-- botoes -->
                <br>
                <div class="row text-center">
                    <div class="row col-md-10 col-md-offset-2  ">
                        <div class="col-md-5  marg-fundo">
                            <a class=" btn cor-botao-secondary btn-200 marg-fundo" href="<?php echo site_url('stocks/fornecedores') ?>" class="btn cor-botao-secondary btn-200">Cancelar</a>
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
