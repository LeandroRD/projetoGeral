<?php
$this->extend('Layout/layout_users');

//===========================================================
?>
<?php $this->section('conteudo') ?>
<div class="row mt-2 card-claro">
    <div class="col-12 text-center ">
        <h3>Cotações_Adicionar</h3>
    </div>
    <br>
    <div class="col-md-6  ">
        <div class="col-6 text-start  ">
            <div class="col-6 "><a href="<?php echo site_url('stocks/cotacoes') ?>" class="btn  cor-botao-secondary  btn-150   ">Voltar</a> </div>
        </div>
        <span class="tamanho-1em"> Adicionar novos itens no check-list.</sp>
            <div class="row">
                <div class="col-md-8">
                    <input class="form-control col-md-6" type="text" name="text_checkList" id="text_checkList">
                </div>
                <div class="col-md-4">
                    <button onclick=" enviar_item_novo('') " class="btn btn-primary btn-200">Adicionar Novo item...</button>
                </div>
            </div>
            <br>
            <div>
                <div class="d-inline2">
                    <strong class="tamanho-1_5em">Check_List: &nbsp;&nbsp;</strong>
                </div>
                <div class="d-inline2">
                    <span class="cor-alerta3"><strong> <?php //echo $get_checkList['servicos'] ?></strong></span>
                </div>
            </div>
            <br>
            <label for="check_tudo " class="cor-alerta2" value="label">
                <input onclick="check()" type="checkbox" name="check_tudo" id="check_tudo" value="check_tudo">
                Selecionar tudo
            </label>
    </div>



    

   

    


    <form action="<?php echo site_url('stocks/tratar_servicos') ?>" method="post">
        <div class="row">
            <!-- Campos data e hora -->
            <div class="col-md-4">
                <label for="">Data do início da execução:</label>
                <input type="hidden" name="nr_checklist" value="<?php //echo $get_checkList['id_servico'] ?>">
                <input class="form-control " type="date" id="input_Data" name="input_Data" value="Data" id="">
                
            </div>
            


        </div>
        <div class="col-md-12  marg-fundo card card-claro">
            <!-- ACAMPOS DE ALERTAS -->
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger alerta-apagando p-3 text-center">
                    <?php echo $error ?>
                </div>
            <?php endif; ?>
            <?php if (isset($success)) : ?>
                <div class="alert alert-success alerta-apagando p-3 text-center">
                    <?php echo $success ?>
                </div>
            <?php endif; ?>
            <br>
            <br>
            <!-- ESCOLHA DE ESCOPO -->
            <div class="row">
                <div class="col-md-6 ">
                    <?php $i = 0; ?>
                    <?php   ?>
                        <label for="<?php //echo $servico['check_list'] ?>">
                            <input class="tudoxx" onClick="enviar('<?= $i ?>')" type="checkbox" id="servicos<?= $i ?>" value="<?php //echo $servico['check_list'] ?>">
                            <?php //echo $servico['check_list'] ?>
                        </label>
                        <br>
                        <br>
                        <br>
                    <?php $i++;
                     ?>
                    <br>
                </div>






                <!-- tabela de novo escopo -->
                <div class="col-md-6 ">
                    <table class="table table-striped2 " id="tabela_familias">
                        <thead class="  cabeca-tabela">
                            <th class="text-center">Check List:</th>
                        </thead>
                    </table>
                    <!-- Check-list -->
                    <ol class="padding-0" id="listaCep"></ol>
                </div>
            </div>
            <div class="col-md-8  marg-fundo text-center col-md-offset-4 ">
                <!-- ESCOLHA DE FORNECEDOR -->
                <div class="col-md-6 ">
                    <h4><strong>Nome do Projeto:</strong></h4>
                    <input type="text" class="form-control" id="projeto1" name="projeto" required>
                    <h4><strong>Fornecedor:</strong></h4>
                    <select class="form-control" name="select_parent" required>
                        <option value="0">Nenhuma</option>
                        <?php  ?>
                            <option value="<?php //echo $fornecedor['id_for']   ?>"><?php //echo $fornecedor['razao_social']; ?></option>
                        <?php  ?>
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
                    <button type="button" onclick="data_vazia()" class="  btn btn-primary btn-lg btn-200 col-md-8 col-md-offset-2 ">
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