<?php
    // incluir o init.php
    include('../inc/init.php');
       
    // indicao se api esta a funcionar ou nao 
        $resposta = array(
            'STATUS' =>'OK',
            'MESSAGE' => 'API disponivel'
        );

    echo json_encode($resposta);