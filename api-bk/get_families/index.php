<?php
   // incluir o init
   include('../inc/init.php');

   $response['STATUS']='OK';
   $response['MESSAGE'] ='SUCCESS';
    
   $gestor = new cl_gestorBD();
   
   //busca todos os produtos da familia
   $response['RESULTS'] = $gestor->EXE_QUERY("SELECT * FROM stock_familias");

   //token
   $response['Token']=$Token;

   //output do endpoint
   echo json_encode($response);
   