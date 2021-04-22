<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>APP TESE</title>
</head>
<body>
    <h3>App teste</h3>
    <hr>

    <?php

    //<!-- http://localhost/projetogeral/api/get_families/ -->
    //<!-- "app_key":"leandro" -->

      require_once 'api.php';
      // ==============dados a serem inseridos=================
      $post_vars = array(
        "app_key"=>"leandro",
        "id_produto"=>7,
        "quantidade"=>10,
        "observacoes"=>"hoje vamos"
      );

      //=========solicitacao do servico desejado===========
      $resultados = api('http://localhost/projetogeral/api-bk/add_to_stock/',$post_vars);

      echo "<pre>";
       print_r($resultados);
      echo "</pre>";

      ?>
</body>
</html>
