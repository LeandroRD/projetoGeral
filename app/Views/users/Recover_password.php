<?php 
    $this->extend('Layout/layout_users')
?>


<?php $this->section('conteudo')?>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <form action="<?php echo site_url('users/reset_password') ?>"method="post">
                    <div class="mb-3">
                        <input type="email" name="text_email" placeholder="email" required class="form-control">
                    </div>
                    <div class=" text-center mb-3 ">
                    <a href="<?php echo site_url('users')?>"class="btn btn-secondary me-2 ">Cancelar</a>
                    <input type="submit" class="btn btn-primary " value="Reset">
                    </div>
                   
                    
                </form>
            </div>
        </div>
    </div>


<?php $this->endSection()?>