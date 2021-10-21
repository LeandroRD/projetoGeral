<?php 
    $this->extend('Layout/layout_users');
    $s = session();
    helper('funcoes');
?>

<?php $this->section('conteudo')?>
    <div class="marg-dir-esq-20px">
        <div class="row marg-topo-menos-15">
            <div class="col-6 text-start">    
        </div>
        
        <div>
            <h1>Usuários</h1>
            <!-- botao adicionar novo usuario -->
            <div class="col-6 align-self-end"></div>
            <div class="mt-2 mb-2 "><a href="<?php echo site_url('users/admin_new_user') ?>" class="btn btn-primary btn-200">Novo Usuário...</a></div>
        </div>
            <div class="table-responsive marg-topo">
                <table class="table table-striped2" id="tabela_users">
                    <thead class="cabeca-tabela">
                        <th>Ação</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Último Login</th>
                        <th class="text-center">Perfil</th>
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
                                        <span class="btn cor-botao-secondary btn-sm"> <i class="fa fa-pencil"></i></span>
                                        <span class="btn cor-botao-secondary btn-sm"><i class="fa fa-trash"></i></spa>
                                    </td>    
                                <?php else:?>
                                    <td>
                                        <!-- botoes ligados -->
                                        <a href="<?php echo site_url('users/admin_edit_user/'.aesEncrypt($user['id_user'])) ?>" class="btn btn-primary btn-sm" title="Editar"><i class="fa fa-pencil" ></i></a>
                                        <?php if($user['deleted']== 0):?>                               
                                            <a href="<?php echo site_url('users/admin_delete_user/'.aesEncrypt($user['id_user'])) ?>" class="btn btn-danger btn-sm"title="Eliminar"><i class="fa fa-trash"></i></a>
                                        <?php else:?>
                                            <a href="<?php echo site_url('users/admin_recover_user/'.aesEncrypt($user['id_user'])) ?>" class="btn btn-danger btn-sm"title="Recuperar"><i class="fa fa-recycle"></i></a>
                                        <?php endif;?>
                                    </td>
                                <?php endif;?>
                                <td><?php echo $user['id_user'] ?></td>       
                                <td><?php echo $user['username'] ?></td>
                                <td><?php echo $user['name'] ?></td>
                                <td><?php echo $user['email'] ?></td>
                                <td><?php echo $user['last_login'] ?></td>
                                        
                                <!-- admin ou outro tipo de user -->
                                <?php if( $user['profile']=='admin'): ?>
                                    <td class="text-center"><i class="fa fa-user" title="Admin"></i></td>        
                                <?php elseif( $user['profile']=='Fornecedor'):?>
                                    <td class="text-center"><i class="fa fa-industry" title="Fornecedor"></i></td>
                                <?php else:?>
                                    <td class="text-center"><i class="fa fa-user-o"title="User"></i></td>
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
        </div>
        <div>Total: <strong><?php echo count($users) ?></strong></div>
    </div>
<?php $this->endSection()?>
    
