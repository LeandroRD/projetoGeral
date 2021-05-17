<?php 
    $this->extend('Layout/layout_users')
?>


<?php $this->section('conteudo')?>
    
    <div class="text-end ">
        <?php echo view('users/userbar') ?>
    </div>

    <?php if(isset($error)): ?>
        <div class="col-md-offset-4 col-md-4 alert alert-danger text-center mt-2"id="error-message">
            <?php echo $error?>
        </div>
    <?php endif; ?>
    <?php if(isset($login_novo)): ?>
        <div class="col-md-offset-4 col-md-4 alert alert-danger text-center mt-2"id="">
            <?php echo $login_novo?>
        </div>
    <?php endif; ?> 
    <div class="row mt-1 mb-3">
        <div class="col-md-4 col-md-offset-4">

            
            
            <h4><span ><b>Login</b> </span> </h4>
            <form action="<?php echo site_url('users/login')?> "method="post">
                <div class="form-group mt-2 ">
                   <input type="text" name="text_username" class="form-control" placeholder="UserName">
                </div>
                <div class="form-group mt-2">
                   <input type="password" name="text_password" class="form-control" placeholder="Password">
                </div>
                <div class="row ps-3">
                    <div class=" col-sm-12  form-group col-6 mt-2">
                        <small>
                            <a href="<?php echo site_url('users/recover')?>">Esqueci minha Password</a>
                        </small>  
                    </div>
                    <div class="row  "> 
                        <div class="col-md-6  col-xs-6  ">
                            <input type="submit"  value="Entrar" class="btn btn-primary btn-200 mt-2 marg-esq-20 ">
                        </div>
                    </div>  
                </div>
            </form>

          
        </div>
    </div>
<?php $this->endSection()?>