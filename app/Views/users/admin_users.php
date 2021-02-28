<?php 
    $this->extend('Layout/layout_users');
    $s = session();
?>

<?php $this->section('conteudo')?>
    <div class="row">
        <div class="col-6 ">
            <div class="mt-2 mb-2"><a href="<?php echo site_url('users/admin_new_user') ?>" class="btn btn-primary">Novo Utilizadores...</a></div>
        </div>
        <div class="col-6 text-end mt-2">
            <a href="<?php echo site_url('users') ?>" class="btn btn-danger "><i class="fa fa-times"></i></a>
        </div>
    </div>

    <div>
        <table class="table table-striped">
            <thead class="table-dark">
                <th>Ação</th>
                <th>Username</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Último Login</th>
                <th class="text-center">Profile</th>
                <th class="text-center" >Ativo</th>
                <th class="text-center">Eliminado</th>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <!-- editar e eliminiar -->
                        <?php if($s->id_user == $user['id_user']):?>
                            <td>
                                 <!-- botoes apagados  -->
                                <span class="btn btn-secondary btn-sm"> <i class="fa fa-pencil"></i></span>
                                <span class="btn btn-secondary btn-sm"><i class="fa fa-trash"></i></spa>
                            </td>    
                        <?php else:?>
                            <td>
                                <!-- botoes ligados -->
                                <a href="<?php echo site_url('users/admin_edit_user/'.$user['id_user']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                <?php if($user['deleted']== 0):?>                               
                                    <a href="<?php echo site_url('users/admin_delete_user/'.$user['id_user']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                <?php else:?>
                                    <a href="<?php echo site_url('users/admin_recover_user/'.$user['id_user']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-recycle"></i></a>
                                <?php endif;?>
                            </td>
                        <?php endif;?>

                        <td><?php echo $user['username'] ?></td>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['last_login'] ?></td>

                        <!-- admin ou outro tipo de user -->
                        <?php if(preg_match("/admin/", $user['profile'])): ?>
                        
                            <td class="text-center"><i class="fa fa-user" title="Admin"></i></td>        
                        <?php else:?>
                            <td class="text-center"><i class="fa fa-user-o"title="Not Admin"></i></td>
                        <?php endif;?>
                        
                        <!-- Ativo ou inativo -->
                        <?php if( $user['active']== 1):?>
                            <td class="text-center"><i class="fa fa-check text-success" title="Ativo"></i></td>        
                        <?php else:?>
                            <td class="text-center"><i class="fa fa-times text-danger" title="Inativo"></i></td>        
                        <?php endif;?>

                        <!-- elimado ou nao eliminado -->
                        <?php if( $user['deleted'] != 0):?>
                            <td class="text-center"><i class="fa fa-check text-success" title="Não Eliminado"></i></td>        
                        <?php else:?>
                            <td class="text-center"><i class="fa fa-times text-danger" title="Eliminado"></i></td>        
                        <?php endif;?>                        
                    </tr>
                <?php endforeach;?>   
            </tbody>
        </table>
    </div>
    <div>Total: <strong><?php echo count($users) ?></strong></div>
 
<?php $this->endSection()?>
    
