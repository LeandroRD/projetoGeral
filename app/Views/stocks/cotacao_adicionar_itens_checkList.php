<?php
$this->extend('Layout/layout_users');
?>
<!-- //=========================================================== -->
<?php $this->section('conteudo') ?>
<!-- confirmar se chegou nome de fornecedor -->
<?php if (isset($parent)) : ?>

    <?php $parent = $parent['razao_social']; ?>

<?php else : ?>
    <?php $parent = 'Nenhuma'; ?>
<?php endif; ?>
<div class="row mt-2 card-claro">
    <div class="col-12 text-center ">
        <h3>cotacao_adicionar_itens_checkList</h3>
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
                    <span class="cor-alerta3"><strong> <?php echo $get_checkList['servicos']; ?></strong></span>
                </div>
            </div>
            <br>
            <label for="check_tudo " class="cor-alerta2" value="label">
                <input onclick="check()" type="checkbox" name="check_tudo" id="check_tudo" value="check_tudo">
                Selecionar tudo
            </label>
    </div>
    <form action="<?php echo site_url('stocks/tratar_servicos_itens') ?>" method="post">
        <div class="row">
            <input type="hidden" name="id_check" value="<?php echo $nr_checkList ?>">
            <input type="hidden" name="nome_checklist" value="<?php echo $get_checkList['servicos']; ?>">
            <div class="col-md-4">
                <label for="">Data do início da execução:</label>
                <div>
                    <select onclick="mudar_data()" name="select_data" id="select_data" class="form-control" required>
                        <option value="0">Nenhuma</option>
                        <?php foreach ($datas_cadastras as $datas) : ?>
                            <option id="xxyy" class="xxyy" value="<?php echo $datas['id_data_cot']   ?>"><?php echo $datas['data_cot']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-12   card card-claro">
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
                    <?php foreach ($all_servicos as $servico) : ?>
                        <label for="<?php echo $servico['check_list'] ?>">
                            <input class="tudoxx" onClick="enviar('<?= $i ?>')" type="checkbox" id="servicos<?= $i ?>" value="<?php echo $servico['check_list'] ?>">
                            <?php echo $servico['check_list'] ?>
                        </label>
                        <br>
                        <br>
                        <br>
                    <?php $i++;
                    endforeach; ?>
                    <br>
                </div>
                <!-- tabela de novo escopo -->
                <div class="col-md-6 ">
                    <table class="table table-striped2 " id="">
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
                    <input type="text" class="form-control" id="projeto1" value="<?php echo $nome_projeto; ?>" name="projeto1" disabled>
                    <input type="hidden" class="form-control" id="projeto1" value="<?php echo $nome_projeto; ?>" name="nome_cotacao">
                    <h4><strong>Fornecedor:</strong></h4>
                    <input type="text" class="form-control" id="parent1" name="parent1" value="<?php echo $parent; ?>" disabled>
                    <input type="hidden" class="form-control" id="parent1" name="nome_fornecedor" value="<?php echo $parent; ?>">
                </div>
            </div>
            <br>
            <div class="row marg-fundo">
                <div class="  col-md-6 col-md-offset-3 ">
                    <div class="text-center">
                        <!-- BOTAO CONFIRMAR -->
                        <button onclick="data_vazia_cotacao()" type="button" class="  btn btn-primary btn-lg btn-200 col-md-8 col-md-offset-2 ">
                            Cadastrar novos Serviços/data.
                        </button>
                    </div>
                    <!-- Modal -------------------->
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
                </div>
            </div>
        </div>
        <!-------------------------- Modal2 comeco-------------------->
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
                        <h4> Atenção!!! Selecionar uma data !!</h4>
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
        <!-------------------------- Modal2 fim -------------------->
        <input type="hidden" name="id_cot" value="<?php echo $ultimo_id_cadastro ?>">
    </form>
    <!-- Botao avançar -->
    <form action="<?php echo site_url('stocks/cotacao_clientes') ?>" method="post">
        <div class="col-md-6 col-md-offset-3 text-center">
            <button class="btn  cor-botao-secondary btn-lg btn-200 col-md-8 col-md-offset-2 ">
                Avançar
            </button>
            <input type="hidden" name="id_cot" value="<?php echo $ultimo_id_cadastro ?>">
        </div>

    </form>

    <!-- //==============botoes ocultos modal - comeco====================== -->
    <button class="transp1" id="btn1" type="button" data-toggle="modal" data-target="#myModal"></button>
    <br>
    <button class="transp1" id="btn2" type="button" data-toggle="modal" data-target="#myModal2"></button>
    <!-- //==============botoes ocultos modal - fim========================= -->
</div>
<?php $this->endSection() ?>