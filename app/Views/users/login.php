<?php $this->extend('Layout/layout_users')?>



<?php $this->section('conteudo')?>
    
    <div class="row mt-3 mb-3">
        <div class="col-4 offset-4 card bg-light p-3">
                
            <form action="<?php echo site_url('users/login')?> "method="post">
                <div class="form-group mt-2">
                   <input type="text" name="text_username" class="form-control" placeholder="UserName">
                </div>
                <div class="form-group mt-2">
                   <input type="password" name="text_password" class="form-control" placeholder="Password">
                </div>
                <div class="row">
                    <div class=" form-group col-6 mt-2">
                        <small>
                        <a href="<?php echo site_url('users/recover')?>">Esqueci minha Password</a>
                        </small>
                        
                    </div>
                    <div class="col-6 text-end">
                        <!-- <div class="form-group mt-2 text-end"> -->
                            <input type="submit"  value="Entrar" class="btn btn-primary mt-2 ">
                        <!-- </div> -->
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