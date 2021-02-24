<?php 
    $this->extend('Layout/layout_users');
    $s = session();
?>

<?php $this->section('conteudo')?>
    <!-- erro -->
    <?php if(isset($error)):?>
        <div class="alert alert-danger">
            <?php echo $error ?>
        </div>
    <?php endif;?>
     <!-- formulario para novo usuario -->
    <h3>Adicionar novo usuario: </h3>
    <form action="" method="post">
        <p><input type="text" name="text_username"></p>
        <p><input type="text" name="text_password"></p>
        <p><input type="text" name="text_name"></p>
        <p><input type="email" name="text_email"></p>
        <!-- profile -->
        <p>Profile</p>
        <label><input type="checkbox" name="check_admin" > Admin</label></br>
        <label><input type="checkbox" name="check_moderator" > Moderator</label></br>
        <label><input type="checkbox" name="check_user" > User</label></br>
        
        <div class="mt-2">
            <a href="<?php echo site_url('users/admin_users') ?>"class="btn btn-secondary">Cancelar</a>
            <button class="btn btn-primary">Adicionar</button>
        </div>    
    </form>





<?php $this->endSection()?>