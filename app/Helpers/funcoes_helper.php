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

        //codigo para fazer teste
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

        //codigo para fazer teste
        // helper('funcoes');
        // VerSessao();
    }