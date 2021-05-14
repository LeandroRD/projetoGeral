<?php
	$this->extend('Layout/layout_users');
?>

<?php $this->section('conteudo')?>


    <div class="row mt-2">
		<div class="col-12 text-center">
			<h3>Fornecedores - Adicionar</h3>
			<hr>
        </div>
        <div class=" col-md-6 col-md-offset-3 marg-fundo card card-claro">
            <!-- necessario inserir a propriedade enctype="multipart/form-data"
             para submeter arquivo JPG -->
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
                    <select class="form-control" name="select_parent">
                        <option value="0">Nenhuma</option>
                        <?php foreach($familias as $familia):?>
                            <option value="<?php echo $familia['id_familia_servicos'] ?>"><?php echo $familia['designacao_servicos'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <!--Razao Social-->
                <div class="mt-3">
                    <label>Razão Social:</label>
                    <input type="text" name="text_razao_social" class="marg-fundo form-control" placeholder="Razão Social" required>
                </div>
                <!--  Endereco-->
                <div class="mt-3 ">
                    <label>Endereço:</label>
                    <input type="text" name="text_endereco"  class="form-control marg-fundo" placeholder="Endereço">
                </div>
                 <!--  numero-->
                 <div class="mt-3 ">
                    <label>Numero:</label>
                    <input type="text" name="text_numero"  class="form-control marg-fundo" placeholder="Numero">
                </div>
                 <!--  complemento-->
                 <div class="mt-3 ">
                    <label>Complemento:</label>
                    <input type="text" name="text_complemento"  class="form-control marg-fundo" placeholder="Complemento">
                </div>
                <!-- CNPJ -->
                <div class="mt-3 ">
                    <label>CNPJ:</label>
                    <input type="text"  id="cnpj" name="text_cnpj" class="form-control marg-fundo" placeholder="CNPJ"  >
                </div>
                <!-- Insc Estadual -->
                <div class="mt-3 ">
                    <label>Insc.Estadual:</label>
                    <input type="text"  id="ie" name="text_ie" class="form-control marg-fundo" placeholder="Insc.Estadual"  >
                </div>
                 <!--  Cep-->
                 <div class="mt-3 ">
                    <label>Cep:</label>
                    <input type="text" id="cep"name="text_cep"  class="form-control marg-fundo" placeholder="Bairro">
                </div>
                <!--  bairro-->
                <div class="mt-3 ">
                    <label>Bairro:</label>
                    <input type="text" name="text_bairro"  class="form-control marg-fundo" placeholder="Bairro">
                </div>
                <!--  munícipio-->
                <div class="mt-3 ">
                    <label>Município:</label>
                    <input type="text" name="text_municipio"  class="form-control marg-fundo" placeholder="Município">
                </div>
                <!--  UF-->
                <div class="mt-3 ">
                    <label>UF:</label>
                    <input type="text" name="text_uf" maxlength="2" class="form-control marg-fundo" placeholder="UF">
                </div>
                <!--  email-->
                <div class="mt-3 ">
                    <label>Email:</label>
                    <input type="email" name="text_email"  class="form-control marg-fundo" placeholder="Email">
                </div>
                <!--  contato-->
                <div class="mt-3 ">
                    <label>Contato:</label>
                    <input type="text" name="text_contato"  class="form-control marg-fundo" placeholder="Contato">
                </div>
                <!--  telefone-->
                <div class="mt-3 ">
                    <label>Telefone:</label>
                    <input type="text" name="text_telefone" id="telefone"  class="form-control marg-fundo" placeholder="Telefone">
                </div>
                <!--  celular-->
                <div class="mt-3 ">
                    <label>Celular:</label>
                    <input type="text" name="text_celular" id="celular"  class="form-control marg-fundo" placeholder="Celular">
                </div>
                <!--  OBS-->
                <div class="mt-3 ">
                    <label>Observações:</label>
                    <input type="text" name="text_obs"  class="form-control marg-fundo" placeholder="Observações">
                </div>





                <div class="row text-center">
                    <div class="row col-md-12 col-md-offset-1  ">
                        <div class="col-md-5  marg-fundo">
                            <a class=" btn cor-botao-secondary btn-200 marg-fundo" href="<?php echo site_url('stocks/fornecedores') ?>" class="btn cor-botao-secondary btn-200">Cancelar</a>
                        </div>
                        <div class="col-md-5  ">
                        <button class="btn btn-primary btn-200">Salvar</button>
                        </div>
                    </div>        
                </div>
            </form>  
        </div>           
    </div>   
<?php $this->endSection()?>
