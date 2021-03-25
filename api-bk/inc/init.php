<?php
    // preparacao
    // definicao o horario da resposta
    date_default_timezone_set('america/sao_paulo');
    //definicao do tipo da resposta (no caso em Json e UTF-8 )
    header("Content-type: application/json; charset=UTF-8");

    // includes para aos arquivos para BD e o gestor de BD
    include('../inc/config.php');
    include('../inc/gestor.php');

    //preparar a resposta com API
    $response = array();

    // get request data vindo do postman e descodificado em array
    $data = json_decode(file_get_contents('php://input'),true);

    // se existe array vindo do post
    if(!is_array($data)){
        $data = array();
    }
    
    //verifica se chega a chave Token para seguranca de acesso
    if(array_key_exists('Token',$data)){
        $Token = $data['Token'];
    }else{
        $Token = round(microtime(true)*1000);

    }

    //--------------------------------------------------------------------------------
    //checar se app_key existe
    if(!key_exists('app_key',$data)){
        $response['status']='mising app_key';
        echo json_encode($response);
        die();
    }else{
        $params = array(
            ':app_key' => $data['app_key']
        );
        $gestor = new cl_gestorBD();
        $dTemp = $gestor->EXE_QUERY("SELECT id_app FROM stock_apps
        WHERE app_key = :app_key AND active = 1
        ",$params  
        );
        if(count($dTemp )==0){
            $response['STATUS']='KO';
            $response['MESSAGE']='Aplicação não tem acesso a API!!';
            $response['Token']=$Token;
            echo json_encode($response);
            die();
        }else{
            $data['app_id'] = $dTemp[0]['id_app'];
        }
    }
    //--------------------------------------------------------------------------------

    

    
     
