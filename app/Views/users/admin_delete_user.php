<?php 
    $this->extend('Layout/layout_users');
    
?>
<?php $this->section('conteudo')?>
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-8 offset-2 card p-3 bg-light text-center">
            <p>Deseja emininar o usuário : <b><?php echo $user['name']?>. ?</b></p>
            <div >
                <a href="<?Php echo site_url('users/admin_users') ?>"class="btn btn-secondary btn-150 mt-2">Não</a>
                <a href="<?php echo site_url('users/admin_delete_user/'.$user['id_user'].'/yes')?>" class="btn btn-primary btn-150 mt-2">Sim</a>
            </div>
            
            </div>
        </div>
    
    </div>    
<?php $this->endSection()?>