<?php 
    $this->extend('Layout/layout_users');
     // tratar o id do produto a editar
     helper('funcoes');
     $id_user = aesEncrypt($user['id_user']);
    
?>

<?php $this->section('conteudo')?>
    <div class="container">
        <div class="row mt-5 mb-5">
        <h3 class="text-center">Recuperar usuario: </h3>
            <div class="col-6 offset-3 card p-3 bg-light text-center">
                <p>Deseja recuperar o usuário : <b><?php echo $user['name']?>. ?</b></p>
                <div class="row text-center marg-topo marg-fundo-20 ">
                    <div class="row  col-md-6 col-md-offset-3">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="marg-fundo col-md-6 ">
                                <a href="<?Php echo site_url('users/admin_users') ?>"class="btn btn-200 cor-botao-secondary">Não</a>
                            </div>
                            <div class="marg-fundo col-md-6 ">
                                <a href="<?php echo site_url('users/admin_recover_user/'.$id_user.'/yes')?>" class="btn btn-200 btn-primary">Sim</a>
                            </div>
                        </div>       
                    </div>
                </div>    
            </div>
        </div>    
    </div>    
<?php $this->endSection()?>