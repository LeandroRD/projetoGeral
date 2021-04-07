<?php 
    $this->extend('Layout/layout_users');
    $s = session();

    // profile 
    $profile = explode(',',$user['profile']);
    $check_admin = '';
    $check_moderator = '';
    $check_user = '';
    
    //checkbox do profile ficar checado conforme a categoria do user(admin,user,modera)
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
    <div class="row mt-3 mb-3 text-center">
        <div class="col-6 offset-3">
            <?php if(isset($error)):?>
                <div class="alert alert-danger">
                    <?php echo $error ?>
                </div>
            <?php endif;?>
             <!-- formulario para editar usuario -->
            <h4 class="text-center">Editar usuario: </h4>
            <form action="<?php site_url('users/admin_edit_users') ?>" method="post">
                <input type="hidden" name="id_user" value="<?php echo $user['id_user']?>">
                <div class="mb-2">
                    <div class="mb-2 text-start ms-3">
                        Username: <b><?php echo $user['username']?></b>
                    </div>
                    <input type="text" class="form-control" size="30" name="text_name"required placeholder="Nome" value="<?php echo $user['name']?>">
                </div>
                <div class="mb-2">
                    <input type="email"class="form-control" size="30" name="text_email" reuired placeholder="Email" value="<?php echo $user['email']?>">
                </div>
                <!-- profile -->
                <h5 class="text-start ms-3">Profile</h5>
                <div class="mb-2 text-start  ">
                    <label class="form-check-label ms-3"><input type="checkbox" class="form-check-input" name="check_admin" <?php echo $check_admin ?>> Admin</label></br>
                    <label class="form-check-label ms-3"><input type="checkbox" class="form-check-input" name="check_moderator"<?php echo $check_moderator ?> > Moderator</label></br>
                    <label class="form-check-label ms-3"><input type="checkbox" class="form-check-input" name="check_user" <?php echo $check_user ?> > User</label></br>
                </div>
                <div class="text-center">
                    <a href="<?php echo site_url('users/admin_users') ?>"class="btn btn-secondary btn-150 mt-2">Cancelar</a>
                    <button class="btn btn-primary btn-150 mt-2">Atualizar</button>
                </div>    
            </form>
        </div>
    </div>
    
 

<?php $this->endSection()?>