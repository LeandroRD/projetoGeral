<?php
$this->extend('Layout/layout_users');

//===========================================================
?>
<?php $this->section('conteudo') ?>
<div class="row mt-2 card-claro">
    <div class="col-12 text-center ">
        <h3>Cotações_Adicionar_projeto</h3>
    </div>
    <form action="<?php echo site_url('stocks/cotacao_adicionar_data') ?>" method="post">
        <!-- caixa de mensagem de erro     -->
        <?php if (isset($error)) : ?>
            <div class="col-md-offset-3 col-md-6 alert alert-danger p-3 text-center alerta-apagando">
                <?php echo $error ?>
            </div>
        <?php endif; ?>
        <input type="hidden" name="id_check" id="" value="<?php echo $id_check[0] ?> ">
        <div class="col-md-8  marg-fundo text-center col-md-offset-4 ">
            <!-- ESCOLHA DE FORNECEDOR -->
            <div class="col-md-6 ">
                <h4><strong>Nome do Projeto:</strong></h4>
                <input type="text" class="form-control" id="projeto1" name="projeto" required>
                <h4><strong>Fornecedor:</strong></h4>

                <select class="form-control" name="select_parent" required>
                    <option value="0">Nenhuma</option>
                    <?php foreach ($fornecedores as $fornecedor) : ?>
                        <option value="<?php echo $fornecedor['id_for']   ?>"><?php echo $fornecedor['razao_social']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row marg-fundo">
            <div class="marg-fundo  col-md-6 col-md-offset-3 ">

                <!-------------------------- Modal1 -------------------->
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
                                <h4> Tem certeza das alterações ?</h4>
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


                <!-------------------------- Modal2 -------------------->
                <div class="modal fade marg-topo-150" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content ">
                            <!-- //=========================================================== -->
                            <div class="modal-header borda-mensagem encher-mensagem">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"></h4>
                            </div>
                            <!-- //=========================================================== -->
                            <div class="modal-body  text-center ">
                                <h4> Atenção!!! Preencher os campos Data e Hora.</h4>
                                <!-- <div class="marg-fundo">
                                        <button class="btn btn-primary btn-200 ">Atualizar</button>
                                    </div> -->
                                <div>
                                    <a type="button" class="btn cor-botao-secondary btn-200" data-dismiss="modal">OK</a>
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
            <!-- BOTAO CONFIRMAR -->
            <div class="col-md-6 col-md-offset-3 text-center marg-fundo">
                <button type="submit" class="  btn btn-primary btn-lg btn-200 col-md-8 col-md-offset-2 ">
                    Confirmar
                </button>
            </div>
            <!-- BOTAO CANCELAR -->
            <div class="col-md-6 col-md-offset-3 text-center">
                <a href="<?php echo site_url('stocks/cotacoes') ?>" class="btn  cor-botao-secondary btn-lg btn-200 col-md-8 col-md-offset-2 ">Cancelar</a>
            </div>
        </div>
</div>
</form>
<!-- //==============botoes ocultos modal========================= -->
<button class="transp1" id="btn1" type="button" data-toggle="modal" data-target="#myModal"></button>
<br>
<button class="transp1" id="btn2" type="button" data-toggle="modal" data-target="#myModal2"></button>
<!-- //======================================= -->
</div>
<?php $this->endSection() ?>