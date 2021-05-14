<?php 
    $this->extend('Layout/layout_users');
    $s = session();
    helper('funcoes');
?>

<?php $this->section('conteudo')?>
    <div class="text-end ">
            <?php echo view('users/userbar') ?>
    </div>
    <div class="marg-dir-esq-20px">
        <div class="row marg-topo-menos-15">
            <div class="col-6 text-start">
            <div class="col-6 align-self-end"><h1>Relação de Usuários: </h1></div>
                <div class="mt-2 mb-2 marg-topo"><a href="<?php echo site_url('users/admin_new_user') ?>" class="btn btn-primary btn-200">Novo Usuário...</a></div>
            </div>
        </div>
        <br>
        <div>
            <div class="table-responsive ">
                <table class="table table-striped" id="tabela_users">
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
        </div>
        <div>Total: <strong><?php echo count($users) ?></strong></div>
    </div>

    <script>
    		$(document).ready( function () {
    	    $('#tabela_users').DataTable({"language": {
    	    "sEmptyTable": "Nenhum registro encontrado",
    	    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    	    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    	    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    	    "sInfoThousands": ".",
    	    "sLengthMenu": "_MENU_ resultados por página",
    	    "sLoadingRecords": "Carregando...",
    	    "sProcessing": "Processando...",
    	    "sZeroRecords": "Nenhum registro encontrado",
    	    "sSearch": "Pesquisar",
    	    "oPaginate": {
    	        "sNext": "Próximo",
    	        "sPrevious": "Anterior",
    	        "sFirst": "Primeiro",
    	        "sLast": "Último"
    	    },
    	    "oAria": {
    	        "sSortAscending": ": Ordenar colunas de forma ascendente",
    	        "sSortDescending": ": Ordenar colunas de forma descendente"
    	    },
    	    "select": {
    	        "rows": {
    	            "_": "Selecionado %d linhas",
    	            "0": "Nenhuma linha selecionada",
    	            "1": "Selecionado 1 linha"
    	        }
    	    },
    	    "buttons": {
    	        "copy": "Copiar para a área de transferência",
    	        "copyTitle": "Cópia bem sucedida",
    	        "copySuccess": {
    	            "1": "Uma linha copiada com sucesso",
    	            "_": "%d linhas copiadas com sucesso"
    	        }
    	    }
    	    }
    		});
    	} );
    </script>
<?php $this->endSection()?>
    
