<?php 
    $this->extend('Layout/layout_users');
    $s = session();
?>

<?php $this->section('conteudo')?>
    
    <div><a href="" class="btn btn-primary">Novo Utilizadores...</a></div>
    <div>
        <table>
            <thead>
                <th></th>
                <th>Username</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Último Login</th>
                <th>Profile</th>
                <th>Ativo</th>
                <th>Eliminado</th>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td>ed | el</td>
                        <td><?php echo $user['username'] ?></td>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['last_login'] ?></td>
                        <td>[profile]</td>
                        <td>[ativo]</td>
                        <td>[eliminado]</td>                    
                    </tr>
                <?php endforeach;?>
            
            </tbody>
        </table>
    </div>
    <div>Total: <strong><?php echo count($users) ?></strong></div>

   
<?php $this->endSection()?>
    
