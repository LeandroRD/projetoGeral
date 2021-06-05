<?php
	$this->extend('Layout/layout_users');
    helper('funcoes');
	$id_cotacao = aesEncrypt($cotacao['id_cot']);
    // recolhe os dados das cotacoes
    $escopo = $cotacao['escopo'];
    $detalhes = $cotacao['detalhes'];
?>
<?php $this->section('conteudo')?>
    <div class="row mt-2">
		<div class="col-12 text-center ">
			<h3>Cotações - Editar - Fornecedor</h3>
        </div>
        <div class="col-md-6 col-md-offset-3 marg-fundo card card-claro">
            <form action="<?php echo site_url('stocks/cotacao_editar_fornecedor/'.$id_cotacao) ?>" method="post">
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
                <div class="mt-3 marg-fundo">
                    <!-- Escopo -->
                    <label>Escopo:</label>
                    <input disabled="true" class="form-control marg-fundo" type="text" value = "<?php echo $escopo?>" name="text_escopo" required >
                    <!-- detalhes do orçamento-->
                    <label>Detalhes do orçamento:</label>
                    <input  class="form-control" type="text"  name="text_detalhes" value = "<?php echo $detalhes?>" required >
                </div>
                <br>
                <!-- Modal -------------------->
                <div class="row marg-fundo">
                    <div class="marg-fundo  col-md-6 col-md-offset-3 ">
                        <!-- Button trigger modal -->
                        <div class="text-center">
                            <!-- Botao confirmar -->
                            <button type="button" class="  btn btn-primary btn-lg btn-200 col-md-8 col-md-offset-2 " data-toggle="modal" data-target="#myModal">
                                Confirmar
                            </button>
                        </div> 
                        <div class="modal fade marg-topo-150  " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                  <!-- //=========================================================== -->
                                    <div class="modal-header borda-mensagem encher-mensagem">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel"></h4>
                                    </div>
                                    <!-- //=========================================================== -->
                                    <div class="modal-body  text-center ">
                                        <h4 > Tem certeza das alterações ?</h4>
                                        <!-- Botão Atualizar -->
                                        <div class="marg-fundo">
                                            <button class="btn btn-primary btn-200 ">Atualizar</button>
                                        </div>
                                        <!-- Botao Não -->
                                        <div>
                                            <a type="button" class="btn cor-botao-secondary btn-200" data-dismiss="modal">Não</a>
                                        </div>
                                    </div>  
                                  <!-- //=========================================================== -->
                                  <div class="modal-footer ">
                                  </div>
                                <!-- //=========================================================== -->
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <!-- Bota Cancelar -->
                        <a href="<?php echo site_url('stocks/cotacoes') ?>" class="btn  cor-botao-secondary btn-lg btn-200 col-md-8 col-md-offset-2 ">Cancelar</a>                              
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
<?php $this->endSection()?>