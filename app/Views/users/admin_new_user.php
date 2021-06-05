<?php 
    $this->extend('Layout/layout_users');
    $username='';
    $nome='';
    $email='';
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        //recolha dos dados
        $nome = $_POST['text_name'];
        $email = $_POST['text_email'];
        $username = $_POST['text_username'];   
    }
    //limpar campos apos adicionar novo fornecedor
    if(isset($success)){
        $username='';
        $nome='';
        $email='';
    }
    $s = session();    
?>

<?php $this->section('conteudo')?>
    <div class="row mt-3 mb-3">
        <div class="col-md-6 col-md-offset-3">
            <!-- caixas de alertas -->
            <?php if(isset($error)):?>
                <div class="alert alert-danger text-center alerta-apagando">
                    <?php echo $error ?>
                </div>
            <?php endif;?>
            <?php if(isset($success)): ?>
                    <div class="alerta-apagando alert alert-success p-3 text-center">
                        <?php echo $success ?>
                    </div>
                <?php endif; ?>
             <!-- formulario para novo usuario -->

            <h3 class="text-center">Adicionar novo usuario: </h3>
            
            <form action="<?php echo site_url('users/admin_new_user') ?>" method="post">
                <div class=" mb-2">
                    <input type="text" name="text_username"class="form-control" required placeholder="Username"value = "<?php echo $username?>">
                </div>
                <br>
                <!-- senha -->
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
                <!-- nome -->
                <div class="marg-fundo">
                    <input type="text" class="form-control" name="text_name" required placeholder="Nome"value = "<?php echo $nome?>">
                </div>
                <!-- email -->
                <div class="marg-fundo">
                    <input type="email" value = "<?php echo $email?>" name="text_email" class="form-control" reuired placeholder="Email">   
                </div>                
                <!-- profile -->
                <div class="card card-claro marg-fundo">
                    <h5 class="text-start ms-3 "> Profile</h5>
                    <div class="mb-2 text-start">
                        <label class="form-check-label ms-3"><input type="radio" class="form-check-input" value="admin" name="profile_tipo" > Admin</label></br>
                        <!-- <label class="form-check-label ms-3"><input type="radio" class="form-check-input" name="check_admin" > Moderator</label></br> -->
                        <label class="form-check-label ms-3"><input type="radio" class="form-check-input" value="user" name="profile_tipo"  > User</label></br>
                    </div>
                </div>
                <!-- botao adicionar                -->
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