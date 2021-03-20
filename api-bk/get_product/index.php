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
   
   //busca todos os produtos da get_produtcs
   $params = array(
      ':id_produto' =>$data['id_produto']

   );
   
   //CONCAT para concatenar dentro da Query
   $results['Results'] = $gestor->EXE_QUERY("SELECT
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
   
   WHERE p.id_produto = :id_produto
   ",$params);


   if(count($results['Results'])==0){
      $results['status']='Produto inexistente';
   }
   
   //token
   $results['Token']=$Token;

   //output do endpoint
   echo json_encode($results);
   