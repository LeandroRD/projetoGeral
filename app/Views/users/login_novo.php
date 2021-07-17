<?php 
    $this->extend('Layout/layout_users')
?>


<?php $this->section('conteudo')?>
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
        </div>
    </div>
<?php $this->endSection()?>