<?php
    //==========================================================
    function verDados($array){
        //Teste de apresentancao de array
        echo '<pre>';
        echo'Dados do array';
        echo"<hr>";
        foreach ($array as $key => $value) {
            echo '<p> $key => '.$value.'</p>';
        }

        echo '</pre>';
        die();

        //para fazer teste
        // helper('funcoes');
        // VerDados();
    }
    //==========================================================
    function VerSessao(){
        //Teste de apresentacao de Sessao - esta pendente
        $_SESSION = \Config\Services::session();
        echo '<pre>';
        echo'Dados da Sessão';
        echo"<hr>";
        print_r($_SESSION);
        echo '</pre>';
        die();
        // helper('funcoes');
        // VerSessao();
    }
    //==========================================================
    function aesEncrypt($valor_original){
        //funcao para criar mecanismo de seguranca, encriptar QueryString
        return bin2hex(openssl_encrypt($valor_original,'aes-256-cbc',AES_KEY, OPENSSL_RAW_DATA,AES_IV));  
    }
    //==========================================================
    function aesDecrypt($valor_encriptado){
         //funcao para criar mecanismo de seguranca, desencriptar QueryString
        $resultado = -1;
        try {
            $resultado = openssl_decrypt(hex2bin($valor_encriptado),'aes-256-cbc',AES_KEY, OPENSSL_RAW_DATA,AES_IV);       
            if(gettype($resultado)=='boolean'){
                return -1;
            }
        }catch(\Throwable $th){
            return -1;
           }  
        return $resultado;
    }
    //==========================================================
    function CriarCodigoAlfanumericoSemSinais($numChars){
        //criar um codigo aleatorio alfanumerico Sem Sinais
        $codigo='';
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        for($i = 0; $i < $numChars; $i++){
            $codigo .= substr($caracteres,rand(0,strlen($caracteres)) ,1 );
        }
        return $codigo;

    }
    //=====================================
        // exemplo de apresentacao de array 
        // echo "<pre>";
        //     print_r($params);
        //     die();
        // echo "</pre>";
    