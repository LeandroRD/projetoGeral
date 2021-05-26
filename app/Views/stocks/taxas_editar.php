<?php
	$this->extend('Layout/layout_users');
    // tratar o id do produto a editar
    helper('funcoes');
    $id_taxa = aesEncrypt($taxa['id_taxas']);

?>

<?php $this->section('conteudo')?>
    
    <div class="row mt-2">
        
		<div class="col-12 text-center ">
			<h3>Taxas - Editar</h3>
        </div>
        <div class="col-md-6 col-md-offset-3 card card-claro">
            
            <form action="<?php echo site_url('stocks/taxas_editar/'.$id_taxa) ?>" method="post">
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger p-3 text-center">
                        <?php echo $error ?>
                    </div>
                <?php endif; ?>
                <br>
                <div class="mt-3 marg-fundo">
                    <label>Nome:</label>
                    <input class="form-control" type="text" name="text_designacao" required value="<?php echo $taxa['designacao'] ?>">
                </div>
                <div class="mt-3 marg-fundo">
                <label>Valor da taxa (%):</label>
                <input class="form-control" 
                           type="number"
                           name="text_percentagem"
                           step="0.01"
                           min = "0"
                           max = "100"
                           placeholder="0.00"
                           value="<?php echo $taxa['percentagem'] ?>" 
                           required >
                </div>
                <br>
                <!-- modal -->
                <div class="row marg-fundo">
                    <div class="marg-fundo  col-md-6 col-md-offset-3 ">
                        <!-- Button trigger modal -->
                        <div class="text-center">
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
                                        <div class="marg-fundo">
                                            <button class="btn btn-primary btn-200 ">Atualizar</button>
                                        </div>   
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
                        <a href="<?php echo site_url('stocks/taxas') ?>" class="btn  cor-botao-secondary btn-lg btn-200 col-md-8 col-md-offset-2 ">Cancelar</a>                              
                    </div>   
                </div>
                <br>

            </form>
        </div>
    </div>
<?php $this->endSection()?>
