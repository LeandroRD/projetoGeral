<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projeto Geral - Users</title>

  <!-- retirado o Jquery antigo necessario verificar -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>">
  <!-- CSS APP-->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css') ?>">
  <!-- DATATABLE -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/datatables.min.css') ?>">
  <!-- ESTE LINK eu copiei do projeto Compras porque do joao ribeiro nao vem a seta -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
  <!-- LINK PARA A APRESENTACAO TELA INTEIRA RESPONSIVA -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/form_resp.css') ?>">
  <!-- link novo -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<body data-spy="scroll" data-target=".navbar" data-offset="50">
  <?php $s = session(); ?>
  <div class="container-fluid text-center" style="background-color:#F44336;color:#fff;height:100px;">
    <h1>Projeto Geral Stocks</h1>
  </div>
  <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav text-center ">
            <li>
              <a href="<?php echo site_url('main') ?>"> <span class="font1"><b>Início</b> </span> </a>
            </li>
            <?php if ($s->has('id_user')) : ?>

              <?php if (!isset($admin)) : ?>
                <li>
                  <a href="<?php echo site_url('stocks/cotacoes_fornecedor') ?>"><span class="font2"><b>Cotações/Fornecedor</b></span></a>
                </li>
                <li>
                  <a href="<?php echo site_url('stocks/cotacoes_fornecedor_aprovadas') ?>"><span class="font2"><b>Cotações_Aprovadas/Fornecedor</b></span></a>
                </li>
              <?php endif; ?>
              <!-- //========================================================== -->
              <?php if (isset($admin)) : ?>
                <li>
                  <a href="<?php echo site_url('stocks/cotacoes') ?>"><span class="font2"><b>Cotações</b></span></a>
                </li>
                <li>
                  <a href="<?php echo site_url('stocks/acompanhamento_servicos') ?>"><span class="font2"><b>Acompanhamento/Servicos</b></span></a>
                </li>
                <li>
                  <a href="<?php echo site_url('stocks/familias') ?>"><span class="font2"><b>Familias/produtos</b></span></a>
                </li>
                <li>
                  <a href="<?php echo site_url('stocks/familias_servicos') ?>"><span class="font2"><b>Familias/serviços</b></span></a>
                </li>
                <li>
                  <a href="<?php echo site_url('stocks/movimentos') ?>"><span class="font2"><b>Movimentos</b></span></a>
                </li>
                <li>
                  <a href="<?php echo site_url('stocks/produtos') ?>"><span class="font2"><b>Produtos</b></span></a>
                </li>
                <li>
                  <a href="<?php echo site_url('stocks/taxas') ?>"><span class="font2"><b>Taxas</b></span></a>
                </li>
                <li>
                  <a href="<?php echo site_url('stocks/clientes') ?>"><span class="font2"><b>Clientes</b></span></a>
                </li>
                <li>
                  <a href="<?php echo site_url('stocks/fornecedores') ?>"><span class="font2"><b>Fornecedores</b></span></a>
                </li>
                <li>
                  <a href="<?php echo site_url('users/admin_users') ?>"><span class="font2"><b>Usuários</b></span></a>
                </li>
              <?php endif; ?>
              <!-- //========================================================== -->
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div id="section1" class="container-fluid marg-topo-menos-50 " style="height: 1000px;">
    <div class="text-end ">
      <?php echo view('users/userbar') ?>
    </div>
    <?php $this->renderSection('conteudo') ?>
  </div>
  <!-- LINK JAVASCRIPT -->
  <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/app.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/incluir-servicos.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/consulta-endereco.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/datatables.min.js') ?>"></script>
  <!-- link JS NOVO -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Script dos metodos da tabela  -->
  <script>
    $(document).ready(function() {
      $('#tabela_familias').DataTable({
        "language": {
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
    });
  </script>
</body>
</html>