<?php
$this->extend('Layout/layout_users');

//limpar campos ao entrar a primeira vez 
$razao_social_cli = '';
$endereco_cli = '';
$nr_cli = '';
$complemento_cli = '';
$bairro_cli = '';
$cep_cli = '';
$municipio_cli = '';
$uf_cli = '';
$cnpj_cli = '';
$ie_cli = '';
$contato_cli = '';
$telefone_cli = '';
$celular_cli = '';
$email_cli = '';
$obs_cli = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //recolher  dados apos submeter
    $razao_social_cli = $_POST['text_razao_social_cli'];
    $endereco_cli = $_POST['text_endereco_cli'];
    $nr_cli = $_POST['text_numero_cli'];
    $complemento_cli = $_POST['text_complemento_cli'];
    $bairro_cli = $_POST['text_bairro_cli'];
    $cep_cli = $_POST['text_cep_cli'];
    $municipio_cli = $_POST['text_municipio_cli'];
    $uf_cli = $_POST['text_uf_cli'];
    $cnpj_cli = $_POST['text_cnpj_cli'];
    $ie_cli = $_POST['text_ie_cli'];
    $contato_cli = $_POST['text_contato_cli'];
    $telefone_cli = $_POST['text_telefone_cli'];
    $celular_cli = $_POST['text_celular_cli'];
    $email_cli = $_POST['text_email_cli'];
    $obs_cli = $_POST['text_obs_cli'];
}

//limpar campos apos adicionar novo fornecedor
if (isset($success)) {
    $razao_social_cli = '';
    $endereco_cli = '';
    $nr_cli = '';
    $complemento_cli = '';
    $bairro_cli = '';
    $cep_cli = '';
    $municipio_cli = '';
    $uf_cli = '';
    $cnpj_cli = '';
    $ie_cli = '';
    $contato_cli = '';
    $telefone_cli = '';
    $celular_cli = '';
    $email_cli = '';
    $obs_cli = '';
}
if (isset($_GET['cep_certo'])) {
    $cep_cli = $_GET['cep_certo'];
}
?>
<?php $this->section('conteudo') ?>
<div class="row mt-2">
    <div class="col-12 text-center">
        <h3>Clientes - Adicionar</h3>
    </div>
    <div class=" col-md-6 col-md-offset-3 marg-fundo card card-claro">
        <form action="<?php echo site_url('stocks/clientes_adicionar') ?>" method="post" enctype="multipart/form-data">
            <?php if (isset($error)) : ?>
                <div class="alerta-apagando alert alert-danger p-3 text-center">
                    <?php echo $error ?>
                </div>
            <?php endif; ?>
            <?php if (isset($success)) : ?>
                <div class="alerta-apagando alert alert-success p-3 text-center">
                    <?php echo $success ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <!--  Cep-->
                <div class="col-md-7 col-xs-6 ">
                    <label>Cep.:</label>
                    <input autofocus type="text" id="cep" name="text_cep_cli" value="<?php echo $cep_cli ?>" class="form-control marg-fundo " autocomplete="off">
                </div>
                <!-- botao nao sabe o cep -->
                <div class="col-md-5 col-xs-6 marg-topo-30 ">
                    <label></label>
                    <a href="<?php echo site_url('stocks/descobrir_cep_cli') ?>"><span class="font2"><b>Não sabe o CEP</b></span></a>
                </div>
                <!--  Endereco-->
                <div class="col-md-12 col-xs-9">
                    <label>Endereço:</label>
                    <input type="text" name="text_endereco_cli" value="<?php echo $endereco_cli ?>" id="rua" class="form-control marg-fundo">
                </div>
                <!--  numero-->
                <div class="col-md-2 col-xs-3  ">
                    <label>Nr:</label>
                    <input type="text" name="text_numero_cli" value="<?php echo $nr_cli ?>" class="form-control marg-fundo">
                </div>
                <!--  complemento-->
                <div class="col-md-4 col-xs-5 ">
                    <label>Complemento:</label>
                    <input type="text" name="text_complemento_cli" value="<?php echo $complemento_cli ?>" class=" form-control marg-fundo">
                </div>
                <!--  bairro-->
                <div class="col-md-8 col-xs-7 mabrg-esq-10px">
                    <label>Bairro:</label>
                    <input type="text" id="bairro" name="text_bairro_cli" value="<?php echo $bairro_cli ?>" class="form-control marg-fundo">
                </div>
            </div>
            <div class="row">
                <!--  munícipio-->
                <div class="col-md-9 col-xs-9 ">
                    <label>Município:</label>
                    <input id="cidade" type="text" name="text_municipio_cli" value="<?php echo $municipio_cli ?>" class="form-control marg-fundo">
                </div>
                <!--selecao de  UF-->
                <div class="mt-3 col-xs-3">
                    <label>Estados novos:</label>
                    <select name="text_uf_cli" class="form-control marg-fundo" id="estado" name="text_uf">
                        <option value="0">Nenhum</option>
                        <?php foreach ($select_uf as $cada_uf) : ?>
                            <option value="<?php echo $cada_uf['id_uf'] ?>"><?php echo $cada_uf['UF']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <!--Razao Social-->
            <div class="mt-3">
                <label>Razão Social:</label>
                <input type="text" name="text_razao_social_cli" class="marg-fundo form-control" required value="<?php echo $razao_social_cli ?>">
            </div>
            <div class="row">
                <!-- CNPJ -->
                <div class="col-md-6 col-xs-12  ">
                    <label>CNPJ:</label>
                    <input type="text" id="cnpj" name="text_cnpj_cli" value="<?php echo $cnpj_cli ?>" class="form-control marg-fundo">
                </div>
                <!-- Insc Estadual -->
                <div class="col-md-6 col-xs-12">
                    <label>Insc.Estadual:</label>
                    <input type="text" id="ie_cli" name="text_ie_cli" value="<?php echo $ie_cli ?>" class="form-control marg-fundo">
                </div>
            </div>
            <div class="row">
                <!--  contato-->
                <div class="col-md-4 col-xs-12  ">
                    <label>Contato:</label>
                    <input type="text" name="text_contato_cli" value="<?php echo $contato_cli ?>" class="form-control marg-fundo">
                </div>
                <!--  telefone-->
                <div class="col-md-4 col-xs-6 ">
                    <label>Telefone:</label>
                    <input type="text" name="text_telefone_cli" id="telefone" value="<?php echo $telefone_cli ?>" class="form-control marg-fundo">
                </div>
                <!--  celular-->
                <div class="col-md-4 col-xs-6  ">
                    <label>Celular:</label>
                    <input type="text" name="text_celular_cli" id="celular" value="<?php echo $celular_cli ?>" class="form-control marg-fundo">
                </div>
            </div>
            <!--  email-->
            <div class="mt-3 ">
                <label>Email:</label>
                <input type="email" name="text_email_cli" value="<?php echo $email_cli ?>" class="form-control marg-fundo">
            </div>
            <!--  OBS-->
            <div class="mt-3 ">
                <label>Observações:</label>
                <input type="text" name="text_obs_cli" value="<?php echo $obs_cli ?>" class="form-control marg-fundo">
            </div>
            <!-- botoes cancelar e salvar -->
            <br>
            <div class="row text-center">
                <div class="row col-md-10 col-md-offset-2  ">
                    <div class="col-md-5  marg-fundo">
                        <a class=" btn cor-botao-secondary btn-200 marg-fundo" href="<?php echo site_url('stocks/fornecedores') ?>" class="btn cor-botao-secondary btn-200">Cancelar</a>
                    </div>
                    <div class="col-md-5  ">
                        <button class="btn btn-primary btn-200">Salvar</button>
                    </div>
                </div>
            </div>
            <br>
        </form>
    </div>
</div>
<?php $this->endSection() ?>