<?php
$this->extend('Layout/layout_users');

//===========================================================
?>
<?php $this->section('conteudo') ?>
<div class="row  card-claro">
    <div class="col-12 text-center ">
        <h3>Cotações_Adicionar DATA</h3>
    </div>
    <div class="col-md-3  marg-fundo text-center col-md-offset-4 ">
        <div class="col-md-10 col-md-offset-3   marg-fundo text-center  ">
            <label for="">Escolher Datas e horas das execuções dos serviços:</label>
            <input class="form-control " type="date" id="input_Data" name="input_Data" value="Data" id="">
            <label for="">Hora do início da execução:</label>
            <input class="form-control marg-fundo " type="time" id="input_Hora" name="input_Hora" value="Data" id="">
        </div>
    </div>
    <div class=" col-md-6  marg-fundo text-center col-md-offset-3 ">
        <button onclick="add_data() " class=" btn btn-primary" id=btn_data>data/hora confirme aqui!</button>
    </div>
    <br>
    <div class="row marg-fundo">
        <div class="marg-fundo  col-md-6 col-md-offset-3 ">
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
                            <h4> Atenção!!! Selecionar e confirmar os campos Data e Hora!!</h4>
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
        </div>
        <form action="<?php echo site_url('stocks/tratar_servicos_data') ?>" method="post">
            <input type="hidden" name="nome_fornecedor" value="<?php echo $nome_fornecedor ?>">
            <input type="hidden" name="nome_cotacao" value="<?php echo $nome_cotacao ?>">
            <input type="hidden" name="id_check" id="" value="<?php echo $id_check[0] ?> ">
            <div class="col-md-4 col-md-offset-4 ">
                <table class="table table-striped2 " id="">
                    <thead class="  cabeca-tabela">
                        <th class="text-center">Datas / Horas:</th>
                    </thead>
                </table>
                <div class="lista_data marg-fundo col-md-offset-3" id="lista_data"></div>
            </div>
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
                            <h4> Confirmar as informações !?</h4>
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
        </form>
        <!-- BOTAO CONFIRMAR -->
        <div class="col-md-6 col-md-offset-3 text-center marg-fundo">
            <button type="submit" onclick="data_vazia()" class="  btn btn-primary btn-lg btn-200 col-md-8 col-md-offset-2 ">
                Confirmar
            </button>
        </div>
        <!-- BOTAO CANCELAR -->
        <div class="col-md-6 col-md-offset-3 text-center">
            <a href="<?php echo site_url('stocks/cotacoes') ?>" class="btn  cor-botao-secondary btn-lg btn-200 col-md-8 col-md-offset-2 ">Cancelar</a>
        </div>
    </div>
</div>
<!-- //==============botoes ocultos modal - comeco====================== -->
<button class="transp1" id="btn1" type="button" data-toggle="modal" data-target="#myModal"></button>
<br>
<button class="transp1" id="btn2" type="button" data-toggle="modal" data-target="#myModal2"></button>
<!-- //==============botoes ocultos modal - fim========================= -->
</div>
<?php $this->endSection() ?>