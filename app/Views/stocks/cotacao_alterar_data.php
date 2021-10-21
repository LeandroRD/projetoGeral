<?php
$this->extend('Layout/layout_users');
// tratar o id do produto a editar
helper('funcoes');
$id_cotacao = aesEncrypt($cotacao['id_cot']);
?>

<?php $this->section('conteudo') ?>
<div class="row mt-2">
    <div class="col-12 text-center">
        <h3>Cotações - Alterar Data</h3>
    </div>
    <div class="row col-md-6 col-md-offset-3 col-12 mt-3  card card-claro">
        <div class=" p-4 text-center ">
            <br>
            <h4 class="cor-alerta-del">Nome da Cotação:</h4>
            <h3> <b><?php echo $cotacao['escopo'] ?></h3></b>
        </div>

        <!-------- Caixa de Mensagem------------------->
        <?= $this->include('caixa_mensagem/caixa_mensagem') ?>

        <div class="row card-laranja-claro">
            <form action="<?php echo site_url('stocks/acrescentar_data/' . $id_cotacao) ?>" method="post">

                <!-------- Modal-2------------------->
                <?= $this->include('modals/modal2') ?>
                <!-------- Modal-1------------------->
                <?= $this->include('modals/modal1') ?>

                <div class="col-md-6   card  ">
                    <div class="col-md-10">
                        <label for="">Adicionar novas Datas:</label>
                        <input class="form-control marg-fundo " type="date" name="input_Data" id="input_Data">
                        <label for="">Adicionar novas Horas:</label>
                        <input class="form-control marg-fundo " type="time" name="input_Hora" id="input_Hora">
                        <div class="marg-fundo">
                        </div>
                    </div>
                </div>
            </form>
            <form action="<?php echo site_url('stocks/remover_data/' . $id_cotacao) ?>" method="post">
                <div class="col-md-6">
                    <div class="col-md-12  ">
                        <label for="">
                            Remover data existente:
                        </label>
                        <select onclick="mudar_data()" name="select_data" id="select_data" class=" marg-fundo form-control" required>
                            <?php foreach ($datas_cadastras as $datas) : ?>
                                <option id="xxyy" class="xxyy" value="<?php echo $datas['id_data_cot']   ?>"><?php echo $datas['data_cot']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class=" marg-fundo">
                            <input type="submit" class=" btn btn-primary  btn-200 " value="Remover">
                        </div>
                        <div class="">
                            <a href="<?php echo site_url('stocks/cotacao_editar/' . aesEncrypt($cotacao['id_cot'])) ?>" class="btn  cor-botao-secondary  btn-200   ">Voltar</a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-md-12 marg-fundo ">
                <div class="col-md-12">
                    <input onclick="novas_datas()" class=" btn btn-primary btn-200 " value="Adicionar">
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive  marg-topo col-md-12 ">
        <table class="table table-striped2 " id="tabela_familias">
            <thead class="  cabeca-tabela">
                <th class="text-center">ID</th>
                <th class="text-center">Data</th>
                <th class="text-center">Hora </th>
            </thead>
            <tbody>
                <?php $s = 0 ?>
                <?php foreach ($data_escopo as $escopo) : ?>
                    <tr>
                        <td class="text-center">
                            <?php echo $escopo['id_data_cot'] ?>
                        </td>
                        <td class="text-center  " style="padding-left: 80px">
                            <div class="text-center  ">
                                <input disabled class="bordaTransparente" type="date" name="" id="" value="<?php echo $escopo['data_cot'] ?>">
                            </div>
                            <div class="tudo_transp">
                                <?php echo $escopo['data_cot'] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <?php echo $hora_escopo[$s][0]['hora_cot'];
                            $s++ ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-------- botao  modal oculto------------------->
<?= $this->include('botao_modal/botao_modal') ?>

<?php $this->endSection() ?>