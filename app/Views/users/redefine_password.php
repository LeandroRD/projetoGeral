<?php 
    $this->extend('Layout/layout_users')
?>


<?php $this->section('conteudo')?>
    
    <div class="row mt-3 mb-3">
        <div class="col-4 offset-4 card bg-light p-3">
            <h4>Redifinir a Password</h4>        
            <form action="<?php echo site_url('users/redefine_password_submit')?> "method="post">
                
                <input type="hidden"name="text_id_user" value="<?php echo $user['id_user']?>">
                
                <div class="form-group mt-2">
                   <input type="text" name="text_nova_password" class="form-control" placeholder="Nova Password" required>
                </div>
                <div class="form-group mt-2">
                   <input type="text" name="text_repetir_password" class="form-control" placeholder="Repetir Password" required>
                </div>
                <div class="col-12 text-center">
                    <input type="submit"  value="Redefinir" class="btn btn-primary mt-2 ">
                </div>   
            </form>
            <?php if(isset($error)): ?>
                <div class="alert alert-danger text-center mt-2"id="error-message">
                    <?php echo $error?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $this->endSection()?>