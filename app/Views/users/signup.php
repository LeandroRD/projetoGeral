<?php 
    $this->extend('Layout/layout_users')
?>

<?php $this->section('conteudo')?>

<div class="container signup mt-3 mb-5">
    <div class="text-center marg-fundo-20 col-md-6 col-md-offset-3  ">
        <h3>Nova Conta de Cliente</h3>
        <?php if(isset($erro)):?>
            <div class="alert alert-danger text-center alerta-apagando">
                <?php echo $erro ?>
            </div>
        <?php endif;?>
        <?php if(isset($success)): ?>
            <div class="alert alert-success alerta-apagando p-3 text-center">
                <?php echo $success ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="row ">
        <div class="col-md-6 col-xs-12 col-md-offset-3">
            <form action="<?php echo site_url('signup/novo_user_adicionar') ?>" method="post">
                <!-- nome completo do cliente -->
                <div class="form-group">
                    <input type="text" 
                           class="form-control"
                           name="text_nome_completo"
                           placeholder="Nome Completo"
                           value = ""
                           required>
                </div>   
                <!-- endereco de email -->
                <div class="form-group">
                    <input type="email" 
                           class="form-control"
                           name="text_email"
                           placeholder="Email"
                           value = ""
                           required>
                </div>
                <!-- nome do utilizador -->
                <div class="form-group">
                    <input type="text" 
                           class="form-control"
                           name="text_utilizador"
                           placeholder="Utilizador"
                           value = ""
                           required>
                </div>
                <!-- password-1 -->
                <div class="form-group">
                    <input type="password" 
                           class="form-control"
                           name="text_senha_1"
                           placeholder="Senha"
                           required>
                </div>
                 <!-- password-2   -->
                 <div class="form-group">
                    <input type="password" 
                           class="form-control"
                           name="text_senha_2"
                           placeholder="Confirmação de Senha"
                           required>
                </div>
                <!-- Aceitacao dos termos de utilizacao    -->
                <div class="text-center form-group  ">
                    
                    <input type="checkbox" 
                           name="check_termos" 
                           id="check_termos"
                           class="mr-2"
                           required>
                           <label for="check_termos" >Li e aceito os
                           </label>
                           <a href=""> Termos de utilização.</a>.
                </div>
                <!-- Submeter     -->
                <div class="text-center mb-5">
                    <button class=" btn btn-primary btn-200 ">Criar Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->endSection()?>