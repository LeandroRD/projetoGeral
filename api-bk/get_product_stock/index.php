<?php
   // incluir o init
   include('../inc/init.php');

   //checar se id_produto foi enviado
   if(!key_exists('id_produto',$data)){
      $response['STATUS']='KO';
      $response['MESSAGEM'] = 'Missing id_produto';
      $response['Token'] = $Token;
      echo json_encode($response);
      die();
  }
    
   $gestor = new cl_gestorBD();
   $response['STATUS']='OK';
   $response['MESSAGEM'] = 'SUCCESS';
   
   //busca a quantidade de produto no estoque
   $params = array(
      ':id_produto' =>$data['id_produto']
      );
   
   //====================================================
   $response['RESULTS'] = $gestor->EXE_QUERY("SELECT
      id_produto, designacao,
      quantidade 
      FROM stock_produtos 
      WHERE id_produto = :id_produto
      ",$params);
   //====================================================

   if(count($response['RESULTS'])==0){
      $response['MESSAGE']='Produto inexistente';
    }
   
   //token
   $response['Token']=$Token;

   //output do endpoint
   echo json_encode($response);
   