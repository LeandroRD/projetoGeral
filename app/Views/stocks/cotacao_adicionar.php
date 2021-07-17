<?php
$this->extend('Layout/layout_users');

//===========================================================
?>
<?php $this->section('conteudo') ?>
<div class="row mt-2">
    <div class="col-12 text-center ">
        <h3>Cotações - Adicionar</h3>
    </div>
    <form action="<?php echo site_url('stocks/tratar_servicos') ?>" method="post">
        <div class="col-md-6 col-md-offset-3 marg-fundo card card-claro">
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

            
            <div class="col-md-12 marg-fundo ">
                <h4><strong>Escopo:</strong></h4>
            </div>
            <br>
            <!-- ESCOLHA DE ESCOPO -->
            <div class="col-md-6   ">
                <?php $i = 0; ?>
                <?php foreach ($all_servicos as $servico) : ?>
                    <label for="<?php echo $servico['servicos'] ?>">
                        <input type="checkbox" name="<?php echo $i ?>" id="" value="<?php echo $servico['servicos'] ?>">
                        <?php echo $servico['servicos'] ?>
                    </label>
                    <br>
                <?php $i++;
                endforeach; ?>
                <br>
            </div>
            <div class="col-md-8  marg-fundo ">
            <!-- ESCOLHA DE FORNECEDOR -->
            <h4><strong>Fornecedor:</strong></h4>
                <select class="form-control" name="select_parent">
                    <option value="0">Nenhuma</option>
                    <?php foreach ($fornecedores as $fornecedor) : ?>
                        <option value="<?php echo $fornecedor['id_for']   ?>"><?php echo $fornecedor['razao_social']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>
            <div class="row marg-fundo">
                <div class="marg-fundo  col-md-6 col-md-offset-3 ">
                    <div class="text-center">
                        <!-- BOTAO CONFIRMAR -->
                        <button type="button" class="  btn btn-primary btn-lg btn-200 col-md-8 col-md-offset-2 " data-toggle="modal" data-target="#myModal">
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