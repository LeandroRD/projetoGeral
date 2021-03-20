<?php
    // incluir o init.php
    include('../inc/init.php');
       
    // indicao da versao da API
        $response = array(
            'STATUS' =>'OK',
            'MESSAGE' => API_VERSION,
            'TOKEN'=>$Token
        );

    echo json_encode($response);