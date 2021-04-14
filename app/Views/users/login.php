<?php 
    $this->extend('Layout/layout_users')
?>


<?php $this->section('conteudo')?>

<?php echo view('users/userbar') ?>
    
    <div class="row mt-1 mb-3">
        <div class="col-md-6 offset-md-3 col-lg-5 col-sm-4 offset-lg-4 offset-sm-4  card bg-light p-3">
                
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
                            <!-- <div class="form-group mt-2 text-end"> -->
                                <input type="submit"  value="Entrar" class="btn btn-primary btn-200 mt-2 marg-esq-20 ">
                            <!-- </div> -->
                        </div>
                    </div>
                    
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