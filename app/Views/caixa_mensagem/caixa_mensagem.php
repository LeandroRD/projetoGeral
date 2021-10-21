<?php if (isset($error)) : ?>
    <div class="alert alert-danger p-3 text-center alerta-apagando">
        <?php echo $error ?>
    </div>
<?php endif; ?>
<?php if (isset($success)) : ?>
    <div class="alert alert-success p-3 text-center alerta-apagando">
        <?php echo $success ?>
    </div>
<?php endif; ?>