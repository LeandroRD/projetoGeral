<?php

$this->extend('Layout/layout_users');
$id_escopo =  $escopo[0]['id_escopo'];
$id_cotacao = $escopo[0]['id_cot'];

 
?>
<?php $this->section('conteudo') ?>
<div class="row mt-2">
    <div class="col-12 text-center ">
        <h3>Escopo - Editar</h3>
    </div>
    <div class="col-md-6 col-md-offset-3 card card-claro">                                        
        <form action="<?php echo site_url('stocks/escopo_editar2/'.$id_escopo).'?v='.$id_cotacao ?>" method="post">
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger p-3 text-center">
                    <?php echo $error ?>
                </div>
            <?php endif; ?>
            <br>
            <div class="mt-3 marg-fundo">
                <label>Nome:</label>
                <input class="form-control" type="text" name="text_escopo" required value="<?php echo $escopo[0]['escopo'] ?>">
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
                <div class="col-md-6 col-md-offset-3 text-center">
                    <button onclick="voltar()" type="button" class="  btn cor-botao-secondary btn-lg btn-200 col-md-8 col-md-offset-2 ">
                        voltar
                    </button>
                </div>
            </div>
            <br>
        </form>
    </div>
</div>
<?php $this->endSection() ?>