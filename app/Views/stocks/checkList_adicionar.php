<?php
$this->extend('Layout/layout_users');
$i = 1;

function soma_id($i)
{
    $i++;
}
//===========================================================
?>
<?php $this->section('conteudo') ?>
<div class="row mt-2 card-claro">
    <div class="col-12 text-center ">
        <h3>Check List - Adicionar</h3>
    </div>
    <br>
    <div class="col-md-12 marg-fundo-20 ">
        <!-- Check List -->
        <div class="col-md-6">
            <h4><strong>Check List:</strong></h4>
            <!-- <p id="pteste">primeira</p> -->
                <input class="form-control" type="text" name="text_checkList" id="text_checkList" >
                <div class="mt-2 mb-2 marg-topo ">
                    <button onclick=" enviar3('<?= $i ?>') " onclick="soma_id()" class="btn btn-primary btn-200">Adicionar Check List...</button>
                </div></form>
        </div>
    </div>

    <div class="col-md-12  marg-fundo card card-claro2">
        <form action="<?php echo site_url('stocks/tratar_servicos2') ?>" method="post">

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

                <!-- tabela de novo escopo -->
                <div class="col-md-6 ">
                    <table class="table table-striped2 " id="tabela_familias">
                        <thead class="cabeca-tabela">
                            <th class="text-center">Check List:</th>
                        </thead>
                    </table>
                    <!-- Check-list -->
                    <ol class="padding-0" id="listaCep">
                       
                        <!-- <textarea name="tt2" id="tipo1" cols="10" rows="1">ola</textarea>
                        <textarea name="tt2" id="tt2" cols="10" rows="1">ola</textarea>
                        <textarea name="tt2" id="tt2" cols="10" rows="1">ola</textarea> -->
                    </ol>
                </div>
            </div>
            <div class="col-md-8  marg-fundo text-center col-md-offset-4 ">
                <!-- ESCOLHA DE FORNECEDOR -->
                <div class="col-md-6 ">
                    <h4><strong>Nome do Check List:</strong></h4>
                    <input type="text" class="form-control" name="checkLista"required>
                </div>
            </div>
            <br>
            <div class="row marg-fundo">
                <div class="marg-fundo  col-md-6 col-md-offset-3 ">
                    <div class="text-center">
                        <!-- BOTAO CONFIRMAR -->
                        <button type="button" class="  btn btn-primary btn-lg btn-200 col-md-8 col-md-offset-2 " disabled=true data-toggle="modal" id="btn_adicionar_checklist" data-target="#myModal">
                            Confirmar
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
                <!-- BOTAO CANCELAR -->
                <div class="col-md-6 col-md-offset-3 text-center">
                    <a href="<?php echo site_url('stocks/cotacoes') ?>" class="btn  cor-botao-secondary btn-lg btn-200 col-md-8 col-md-offset-2 ">Cancelar</a>
                </div>
            </div>
    </div>
    </form>
</div>
<?php $this->endSection() ?>