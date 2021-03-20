<?php
   // incluir o init
   include('../inc/init.php');
    
   $gestor = new cl_gestorBD();
   
   //busca todos os produtos da familia
   $results['Results'] = $gestor->EXE_QUERY("SELECT * FROM stock_familias");

   //token
   $results['Token']=$Token;

   //output do endpoint
   echo json_encode($results);
   