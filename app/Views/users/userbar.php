<?php
    $s = session();
?>

<div class='text-end'>
    <?php if($s->has('id_user')):?>
        <div>
            <i class="fa fa-user me-2"></i>
            <strong class="me-2"><?php echo $s->name?></strong>
            <a href="<?php echo site_url('users/logout') ?>"><i class="fa fa-sign-out" title="logout"></i></a>
        </div>
    <?php else:?>
        <span class="text-muted">Nenhum User logado</span>
    <?php endif;?>
</div>

