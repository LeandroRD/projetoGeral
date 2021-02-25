<?php 
    $this->extend('Layout/layout_users');
    $s = session();

    // profile
    $profile = explode(',',$user['profile']);
    $check_admin = '';
    $check_moderator = '';
    $check_user = '';
    
    if(in_array('admin',$profile)){
        $check_admin = 'checked';
    }
    if(in_array('moderator',$profile)){
        $check_moderator = 'checked';
    }
    if(in_array('user',$profile)){
        $check_user = 'checked';
    }
?>

<?php $this->section('conteudo')?>
    <!-- erro -->
    <?php if(isset($error)):?>
        <div class="alert alert-danger">
            <?php echo $error ?>
        </div>
    <?php endif;?>
     <!-- formulario para editar usuario -->
    <h3>Editar usuario: </h3>
    <form action=" <?php echo site_url('users/admin_edit_user') ?>" method="post">
        
        <p>Username: <b><?php echo $user['username']?></b></p>
        
        
        <p><input type="text" size="30" name="text_name"required placeholder="Nome" value="<?php echo $user['name']?>"></p>
        <p><input type="email" size="30" name="text_email" reuired placeholder="Email" value="<?php echo $user['email']?>"></p>
        
        <!-- profile -->
        <p>Profile</p>
        <label><input type="checkbox" name="check_admin" <?php echo $check_admin ?>> Admin</label></br>
        <label><input type="checkbox" name="check_moderator"<?php echo $check_moderator ?> > Moderator</label></br>
        <label><input type="checkbox" name="check_user" <?php echo $check_user ?> > User</label></br>
        
        <div class="mt-2">
            <a href="<?php echo site_url('users/admin_users') ?>"class="btn btn-secondary">Cancelar</a>
            <button class="btn btn-primary">Atualizar</button>
        </div>    
    </form>

<?php $this->endSection()?>