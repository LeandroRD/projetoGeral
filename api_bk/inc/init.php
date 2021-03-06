<?php
    // preparacao
    date_default_timezone_set('america/sao_paulo');
    header("Content-type: application/json; charset=UTF-8");

    // includes
    include('../inc/config.php');
    include('../inc/gestor.php');

    //preparar a resposta com API
    $response = array();

    // get request data vindo do postman
    $data = json_decode(file_get_contents('php://input'),true);

    // se existe array vindo do post
    if(!is_array($data)){
        $data = array();
    }

    if(array_key_exists('Token',$data)){
        $Token = $data['Token'];
    }else{
        $Token = round(microtime(true)*1000);

    }
