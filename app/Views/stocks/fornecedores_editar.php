<?php
	$this->extend('Layout/layout_users');
	 // tratar o id do produto a editar
	 helper('funcoes');
	 
	 $id_fornecedor = aesEncrypt($fornecedor['id_for']);
  
        //recolher  dados apos submeter
        $razao_social = $fornecedor['razao_social'];
        $endereco = $fornecedor['endereco'];
        $nr = $fornecedor['numero'];
        $complemento = $fornecedor['complemento'];
        $bairro = $fornecedor['bairro'];
        $cep = $fornecedor['CEP'];
        $municipio = $fornecedor['municipio'];
        $uf = $fornecedor['UF'];
        $cnpj = $fornecedor['cnpj'];
        $ie = $fornecedor['I_E'];
        $contato = $fornecedor['contato'];
        $telefone = $fornecedor['telefone'];
        $celular = $fornecedor['celular'];
        $email = $fornecedor['email'];
        $obs = $fornecedor['obs'];
    

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
			<h3>Fornecedores - Editar</h3>
        </div>
        <div class=" col-md-6 col-md-offset-3 marg-fundo card card-claro">
            <form action="<?php echo site_url('stocks/fornecedor_editar/'.$id_fornecedor) ?>" method="post" enctype="multipart/form-data">
                <!-- caixa de mensagens -->
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
                    <label>Família do servicos:</label>
                    <select name="combo_familia" class="form-control" >
                        <?php if($fornecedor['servico']== 0):?>
                            <option value="0" selected>Nenhuma</option>
                        <?php else:?>
                            <option value="0" >Nenhuma</option>
                        <?php endif;?>
                            <?php foreach($familia_servicos as $servicos):?>
                                <?php if($fornecedor['servico'] == $servicos['id_familia_servicos']):?>
                                    <option value="<?php echo $servicos['id_familia_servicos'] ?>" selected><?php echo $servicos['designacao_servicos']?></option>
                                <?php else:?>
                                    <option value="<?php echo $servicos['id_familia_servicos'] ?>"><?php echo $servicos['designacao_servicos']?></option>
                                <?php endif;?>                               
                            <?php endforeach;?>
                    </select>
                    <!-- razao social -->
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
                    <!-- Modal -------------------->
                    <div class="marg-fundo">
                       <div class="marg-fundo  col-md-6 col-md-offset-3 ">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-lg btn-200 " data-toggle="modal" data-target="#myModal">
                                Confirmar
                            </button>
                            <div class="modal fade marg-topo-150  " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <!-- //=========================================================== -->
                                        <div class="modal-header borda-mensagem encher-mensagem">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"></h4>
                                        </div>
                                        <!-- //=========================================================== -->
                                        <div class="modal-body  ">
                                        <h3> Tem certeza das alterações ?</h3>
                                        <button class="btn btn-primary btn-200">Atualizar</button>
                                        <a class=" btn cor-botao-secondary btn-200 marg-fundo" href="<?php echo site_url('stocks/fornecedores') ?>" class="btn cor-botao-secondary btn-200">Cancelar</a>
                                      </div>  
                                      <!-- //=========================================================== -->
                                      <div class="modal-footer ">
                                      </div>
                                    <!-- //=========================================================== -->
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div >
                            <a href="<?php echo site_url('stocks/fornecedores') ?>" class="btn btn-lg cor-botao-secondary btn-200 ">Cancelar</a>                       
                       </div>       
                    </div> 
                </div>
                <br> 
            </form>  
        </div>           
    </div>   
<?php $this->endSection()?>
