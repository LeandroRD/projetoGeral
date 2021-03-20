<?php
   // incluir o init
   include('../inc/init.php');
    
   $gestor = new cl_gestorBD();
   
   //busca todos os produtos da get_all_produtcs
   $results['Results'] = $gestor->EXE_QUERY("SELECT
      p.id_produto,
      p.id_familia,
      p.designacao AS nome_produto,
      p.descricao,
      p.imagem, 
      p.preco, 
      p.id_taxa,
      p.quantidade,
      p.detalhes,
      f.designacao AS familia,
      t.designacao AS taxa, 
      t.percentagem
   
   FROM stock_produtos p
   LEFT JOIN stock_familias f ON p.id_familia = f.id_familia
   LEFT JOIN stock_taxas t    ON  p.id_taxa = t.id_taxas");

   //token
   $results['Token']=$Token;

   //output do endpoint
   echo json_encode($results);
   