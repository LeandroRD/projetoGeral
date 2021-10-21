<?php
$this->extend('Layout/layout_users');
helper('funcoes');
$id_cotacao = aesEncrypt($cotacao['id_cot']);
// recolhe os dados das cotacoes
$escopo = $cotacao['escopo'];
$data = $cotacao['cot_data'];
$hora = $cotacao['cot_hora'];

$detalhes = $cotacao['detalhes'];
?>
<?php $this->section('conteudo') ?>
<div class="row mt-2">
    <div class="col-12 text-center ">
        <h3>Cotações - Editar</h3>
    </div>
    <div class="col-md-12  marg-fundo card card-claro">
        <form action="<?php echo site_url('stocks/cotacao_editar/' . $id_cotacao) ?>" method="post">
            <?php if (isset($success)) : ?>
                <div class="alert alert-success alerta-apagando p-3 text-center">
                    <?php echo $success ?>
                </div>
            <?php endif; ?>
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger alerta-apagando p-3 text-center">
                    <?php echo $error ?>
                </div>
            <?php endif; ?>

            <div class=" marg-fundo col-md-6 marg-topo-10  ">
                <!-- Fornecedores -->
                <label>Fornecedores:</label>
                <select name="combo_fornecedor" class="form-control marg-fundo ">
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
                    <input class="form-control marg-fundo" type="text" value="<?php echo $escopo ?>" name="text_escopo" required placeholder="família">
                    <!-- data e horas -->
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Data início:</label>
                            <input class="form-control marg-fundo " disabled type="date" name="input_Data" value=<?php echo $menor_data['data_cot']; ?> id="">
                        </div>
                        <div class="col-md-6">
                            <label for="">Hora início:</label>
                            <input class="form-control marg-fundo " disabled type="time" name="input_Hora" value=<?php echo $hora_relacionada_data['hora_cot']; ?> id="">
                        </div>
                    </div>
                    <!-- detalhes -->
                    <div class="row">
                        <div class="col-md-12">
                            <label>Proposta:</label>
                            <textarea class="form-control" type="text" disabled name="text_detalhes" id="proposta_fornecedor" ><?php echo $detalhes ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="  col-md-6   ">
                <!-- Button trigger modal -->
                <div class="text-center ">
                    <br>
                    <!-- botao atualizar -->
                    <div class="col-md-12 marg-fundo">
                        <button type="button" class=" btn marg-fundo   btn-primary  btn-200 col-md-8 col-md-offset-2  " data-toggle="modal" data-target="#myModal2">
                            Atualizar
                        </button>
                    </div>
                    <!-- botao aprovar -->
                    <div class="col-md-12 marg-fundo">
                        <button onclick="proposta_vazia()" type="button" class=" marg-fundo btn  cor-botao-verde  btn-200 col-md-8 col-md-offset-2 " >
                            Aprovar
                        </button>
                    </div>
                    <br>
                    <!-- botao voltar -->
                    <div class="col-md-12">
                        <a href="<?php echo site_url('stocks/cotacoes') ?>" class="btn  cor-botao-secondary  btn-200 col-md-8 col-md-offset-2 ">Voltar</a>
                    </div>

                </div>
            </div>
            <div class="col-md-12">
               
            
             <!-------- Modal-3------------------->
             <?= $this->include('modals/modal3') ?>

             <!-------- Modal-4------------------->
             <?= $this->include('modals/modal4') ?>
        </form>
        <form action="<?php echo site_url('stocks/Cotacao_ItemCheckList_adicionar') ?>" method="post">
            <div class=" col-md-8  marg-fundo card card-claro_2">
                <div class="col-md-10">
                    <div class="col-md-12">
                        <label for="">
                            <span class="tamanho-1em">Adicionar novos itens no check-list :</span>
                        </label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control col-md-6" type="text" name="text_novoItemCheckList" id="text_checkList" required>
                        <input type="hidden" name="id_novoItem" value=<?php echo $id_cotacao ?>>
                    </div>
                    <!-- <div class="col-md-6 "> -->
                    <div class="col-md-8">
                        <label for="">
                            <span class="tamanho-1em">Escolher a data:</span>
                        </label>
                        <select onclick="mudar_data()" name="select_data" id="select_data" class=" marg-fundo form-control" required>
                            <?php foreach ($datas_cadastras as $datas) : ?>
                                <option id="xxyy" class="xxyy" value="<?php echo $datas['id_data_cot']   ?>"><?php echo $datas['data_cot']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-12 marg-fundo">
                        <input type="submit" class="btn btn-primary btn-200" value="Confirmar">
                    </div>
                </div>
            </div>
        </form>
        <div class="card-claro8 col-md-5 ">
            <div class=" col-md-12">
                <div class="col-md-12 marg-fundo">
                    <a class="btn btn-primary btn-200 marg-topo-5 " href="<?php echo site_url('stocks/cotacao_alterar_data/' . aesEncrypt($cotacao['id_cot'])) ?>">
                        Remover/Adicionar
                    </a>
                    <label class="marg-topo-10" for="">
                        <span class="font4"> &nbsp;&nbsp;&nbsp; Datas e Horas. </span>
                        <label>
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
                                <input disabled class="bordaTransparente" type="date" name="" id="" value="<?php echo $escopo['CheckList_data'] ?>">
                            </div>
                            <div class="tudo_transp">
                                <?php echo $escopo['CheckList_data'] ?>
                            </div>
                        </td>
                        <td class="text-center"><?php echo $escopo['escopo'] ?></td>
                        <!-- botoes editar  -->
                        <td class="text-center">
                            <div class="marg-fundo-5 col-md-6">
                                <a class=" btn btn-primary btn-sm btn-100" href="<?php echo site_url('stocks/escopo_editar/' . aesEncrypt($escopo['id_escopo'])) ?>">
                                    <i class="fa fa-pencil me-2"></i> Editar
                                </a>
                            </div>
                            <div>
                                <!-- botao eliminar -->
                                <a class="btn btn-danger btn-sm btn-100 col-md-6 " href="<?php echo site_url('stocks/item_escopo_eliminar/' . aesEncrypt($escopo['id_escopo'])) ?>">
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
    <div class="modal fade marg-topo-150  " id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <!-- //=========================================================== -->
            <div class="modal-header borda-mensagem encher-mensagem">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <!-- //=========================================================== -->
            <div class="modal-body  text-center ">
                <h4> Tem certeza que deseja aprovar as cotação ?</h4>
                <!-- botao sim -->
                <div class="marg-fundo">
                    <a href="<?php echo site_url('stocks/cotacoes_aprovar/'.$id_cotacao)?>" class="btn btn-primary btn-200">Sim</a>
                </div>
                <!-- botao nao-->
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
<!-------- botao  modal oculto------------------->
<?= $this->include('botao_modal/botao_modal2') ?>
<?php $this->endSection() ?>