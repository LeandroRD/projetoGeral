<?php 
    $this->extend('Layout/layout_users');
    $s = session();    
?>

<?php $this->section('conteudo')?>
    <div class="row mt-3 mb-3">
        <div class="col-md-6 col-md-offset-3">
            <?php if(isset($error)):?>
                <div class="alert alert-danger text-center alerta-apagando">
                    <?php echo $error ?>
                </div>
            <?php endif;?>
             <!-- formulario para novo usuario -->

            <h3 class="text-center">Adicionar novo usuario: </h3>
            
            <form action="<?php echo site_url('users/admin_new_user') ?>" method="post">
                <div class=" mb-2">
                    <input type="text" name="text_username "class="form-control" required placeholder="Username">
                </div>
                <br>
                <div class="row marg-fundo">
                    <div class="col-md-6">
                        <input type="text" name="text_password"class="form-control" required placeholder="Password">
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary btn-150 " id="btn-password">Gerar password</button>
                    </div>
                </div>
                <div class="row  marg-fundo">
                    <div class="col-md-6">
                        <input type="text" name="text_password_repetir" class="form-control" required placeholder="Repetir Password">      
                    </div>
                    <div class="col-md-6 mb-2 ">
                        <button type="button" class="btn cor-botao-secondary btn-150 " id="btn-limpar">Limpar</button>
                    </div>
                </div>
                <div class="marg-fundo">
                    <input type="text" class="form-control" name="text_name"required placeholder="Nome">
                </div>
                <div class="marg-fundo">
                    <input type="email" name="text_email" class="form-control" reuired placeholder="Email">   
                </div>                
                <!-- profile -->
                <div class="card card-claro marg-fundo">
                    <h5 class="text-start ms-3 "> Profile</h5>
                    <div class="mb-2 text-start">
                        <label class="form-check-label ms-3"><input type="checkbox" class="form-check-input" name="check_admin" > Admin</label></br>
                        <label class="form-check-label ms-3"><input type="checkbox" class="form-check-input" name="check_moderator" > Moderator</label></br>
                        <label class="form-check-label ms-3"><input type="checkbox" class="form-check-input" name="check_user" checked > User</label></br>
                    </div>
                </div>               
                <div class="row text-center marg-fundo-20 ">
                    <div class="row  col-md-8 col-md-offset-2">
                        <div class="marg-fundo col-md-6 ">
                            <a href="<?php echo site_url('users/admin_users') ?>"class="btn cor-botao-secondary btn-200">Cancelar</a>
                        </div>
                        <div class="marg-fundo col-md-6 ">
                        <button class="btn btn-primary  btn-200">Adicionar</button>
                        </div> 
                    </div>    
                </div>    
            </form>
        </div>               
    </div>
<?php $this->endSection()?>