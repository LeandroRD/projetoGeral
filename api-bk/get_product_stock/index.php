<?php
   // incluir o init
   include('../inc/init.php');

   //checar se id_produto foi enviado
   if(!key_exists('id_produto',$data)){
      $response['status']='Missing id_produto';
      echo json_encode($response);
      die();
  }
    
   $gestor = new cl_gestorBD();
   
   //busca a quantidade de produto no estoque
   $params = array(
      ':id_produto' =>$data['id_produto']

   );
   
   //CONCAT para concatenar dentro da Query
   $results['Results'] = $gestor->EXE_QUERY("SELECT
      id_produto, designacao,
      quantidade 
   FROM stock_produtos 
   
   WHERE id_produto = :id_produto
   ",$params);


   if(count($results['Results'])==0){
      $results['status']='Produto inexistente';
   }
   
   //token
   $results['Token']=$Token;

   //output do endpoint
   echo json_encode($results);
   