<?php



$this->extend('Layout/layout_users');
helper('funcoes');
$id_cotacao = aesEncrypt($cotacao['id_cot']);
// recolhe os dados das cotacoes
$escopo =      $cotacao['escopo'];
$detalhes =    $cotacao['detalhes'];
$data =        $cotacao['cot_data'];
$hora =        $cotacao['cot_hora'];
$id_cot_novo = $escopo_por_cotacao[0]['id_cot'];
?>
<?php $this->section('conteudo') ?>
<div class="row mt-2">
    <div class="col-12 text-center ">
        <h3> Enviar cotação para outro fornecedor</h3>
    </div>
    <div class="col-md-10 col-md-offset-1 marg-fundo card card-claro">
        <form action="<?php echo site_url('stocks/cotacao_novoFornecedor/' . $id_cotacao) ?>" method="post">
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
            <div class=" marg-fundo col-md-6 marg-topo-10  ">
                <!-- Fornecedores -->
                <label>Fornecedores:</label>
                <select name="combo_fornecedor" class="form-control">
                    <?php if ($cotacao['id_for'] == 0) : ?>
                        <option value="0" selected>Nenhuma</option>
                    <?php else : ?>
                        <option value="0">Nenhuma</option>
                    <?php endif; ?>
                    <?php foreach ($fornecedores as $fornecedor) : ?>
                        <?php if ($cotacao['id_for'] == $fornecedor['id_for']) : ?>
                            <option value="<?php echo $fornecedor['id_for'] ?>" selected><?php echo $fornecedor['razao_social'] ?></option>
                        <?php else : ?>
                            <option value="<?php echo $fornecedor['id_for'] ?>"><?php echo $fornecedor['razao_social'] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <div class="mt-3 marg-fundo">
                    <!-- escopo -->
                    <label>Escopo:</label>
                    <input class="form-control marg-fundo" type="text" value="<?php echo $escopo ?>" name="text_escopo" required placeholder="escopo">
                </div>
                <!-- data e horas -->
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Data início:</label>
                        <input class="form-control marg-fundo " type="date" name="input_Data" value=<?php echo $data ?> id="">
                    </div>
                    <div class="col-md-6">
                        <label for="">Hora início:</label>
                        <input class="form-control marg-fundo " type="time" name="input_Hora" value=<?php echo $hora ?> id="">
                        <input type="hidden" name="id_cot_novo" value=<?php echo $id_cot_novo ?>>
                    </div>
                </div>
            </div>
            <div class="  col-md-6   ">
                <!-- Button trigger modal -->
                <div class="text-center ">
                    <br>
                    <!-- botao atualizar -->
                    <div>
                        <button type="button" class=" marg-fundo   btn-primary btn-lg btn-200 col-md-8 col-md-offset-2  " data-toggle="modal" data-target="#myModal">
                            Enviar
                        </button>
                    </div>
                    <!-- botao voltar -->
                    <a href="<?php echo site_url('stocks/cotacoes') ?>" class="btn  cor-botao-secondary btn-lg btn-200 col-md-8 col-md-offset-2 ">Voltar</a>
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
                                <h4> Tem certeza das alterações ?</h4>
                                <!-- botao sim -->
                                <div class="marg-fundo">
                                    <button class="btn btn-primary btn-200 ">Sim</button>
                                </div>
                                <!-- botao nao    -->
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
            <br>
            <!-- Tabela dos servicos -->
            <div class="table-responsive  marg-topo col-md-12 ">
                <table class="table table-striped2 " id="tabela_familias">
                    <thead class="  cabeca-tabela">
                        <th class="text-center">ID</th>
                        <th class="text-center">Data</th>
                        <th class="text-center"><span style="color: black;">_________________</span>Escopo<span style="color: black;">_________________</span> </th>
                        <th class="text-center">Ações</th>
                    </thead>
                    <tbody>
                        <?php foreach ($escopo_por_cotacao as $escopo) : ?>
                            <tr>
                                <td class="text-center"><?php echo $escopo['id_escopo'] ?></td>
                                <td class="text-center  " style="padding-left: 80px">
                                    <div class="text-center  ">
                                        <input disabled class=" bordaTransparente" type="date" name="data_item" id="" value="<?php echo $escopo['CheckList_data'] ?>">
                                    </div>
                                </td>
                                <td class="text-center"><?php echo $escopo['escopo'] ?></td>
                                <!-- botoes editar  -->
                                <td class="text-center">
                                    <div class="marg-fundo-5">
                                        <input type="hidden" name="<?php echo $escopo['id_escopo'] ?>" value="<?php echo $escopo['escopo'] ?>">
                                        <input type="hidden" name="data.<?php echo $escopo['id_escopo'] ?>" value="<?php echo $escopo['CheckList_data'] ?>">
                                        <input type="hidden" name="ultimo_id.<?php echo $escopo['id_escopo'] ?>" value="<?php echo $escopo['id_escopo'] ?>">
                                        <a class=" btn btn-primary btn-sm btn-100" href="<?php echo site_url('stocks/escopo_editar/' . aesEncrypt($escopo['id_escopo'])) ?>">
                                            <i class="fa fa-pencil me-2"></i> Editar
                                        </a>
                                    </div>
                                    <div>
                                        <!-- botao eliminar -->
                                        <a class="btn btn-danger btn-sm btn-100 " href="<?php echo site_url('stocks/escopo_eliminar/' . aesEncrypt($escopo['id_escopo'])) ?>">
                                            <i class="fa fa-trash me-2"></i> Eliminar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </div>
    <!-- Modal -------------------->
    <div class="row marg-fundo">
        <br>
        </form>
        <div class="modal fade marg-topo-150  " id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                        <!-- botao sim -->
                        <div class="marg-fundo">
                            <a href="<?php echo site_url('stocks/cotacoes_aprovar/' . $id_cotacao) ?>" class="btn btn-primary btn-200">Sim</a>
                        </div>
                        <!-- botao nao    -->
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

<?php $this->endSection() ?>