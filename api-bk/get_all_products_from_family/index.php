<?php
   // incluir o init
   include('../inc/init.php');


   //checar se id_familia veio
   if(!key_exists('id_familia',$data)){
      $response['STATUS']='KO';
      $response['MESSAGE']='Missing id_familia';
      $response['TOKEN']= $Token;
      echo json_encode($response);
      die();
  }
     //DEFINE status
   $results['STATUS']='OK';
   $results['MESSAGE'] ='SUCCESS';
   
   
   
   $gestor = new cl_gestorBD();

    // o produtos da get_produtcs
    $params = array(
      ':id_familia' =>$data['id_familia']

   );
   
   //busca todos os produtos da get_all_produtcs de uma familia especifica
   $results['RESULTS'] = $gestor->EXE_QUERY("SELECT
      p.id_produto,
      p.id_familia,
      p.designacao AS nome_produto,
      p.descricao,
      CONCAT ('".IMG_PATH."', p.imagem) as imagem, 
      p.preco, 
      p.id_taxa,
      p.quantidade,
      p.detalhes,
      f.designacao AS familia,
      t.designacao AS taxa, 
      t.percentagem
   
   FROM stock_produtos p
   LEFT JOIN stock_familias f ON p.id_familia = f.id_familia
   LEFT JOIN stock_taxas t    ON  p.id_taxa = t.id_taxas
   
   WHERE p.id_familia = :id_familia
   
   ",$params);

   //token
   $results['Token']=$Token;

   //output do endpoint
   echo json_encode($results);
   