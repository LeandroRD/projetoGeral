<?php 
    $this->extend('Layout/layout_users');

     // tratar o id do produto a editar
     helper('funcoes');
     $id_user = aesEncrypt($user['id_user']);
    
?>
<?php $this->section('conteudo')?>
    <div class="container">
        <div class="row col-md-6 col-md-offset-3 mt-5 mb-5 card card-claro2 ">
            <div class="marg-fundo-20">
                <h3 class="text-center ">Eliminar - Usuário: </h3>
            </div>
            <div class="col-md-6 col-md-offset-3 card p-3 bg-light text-center ">
                <div class="marg-fundo-20">
                    <p>Deseja eliminar o usuário : <b><?php echo $user['name']?>. ?</b></p>
                </div>    
            </div>
            

                <div class="row text-center marg-fundo-20 ">
                    <div class="row  col-md-10 col-md-offset-1">
                        <div class="marg-fundo col-md-6 ">
                        <a href="<?php echo site_url('users/admin_users') ?>"class="btn cor-botao-secondary btn-200 mt-2" class="btn cor-botao-secondary btn-200">Não</a>                   
                        </div>
                        <div class="marg-fundo col-md-6 ">
                            <a href="<?php echo site_url('users/admin_delete_user/'.$id_user.'/yes')?>" class="btn btn-primary btn-200 mt-2">Sim</a>     
                        </div> 
                    </div>    
                </div>
            
            
        </div>
    
    </div>    
<?php $this->endSection()?>