<?php
    //==========================================================
    function verDados($array){
        //Teste de apresentancao de array
        echo '<pre>';
        echo'dados do array';
        echo"<hr>";
        foreach ($array as $key => $value) {
            echo '<p> $key => '.$value.'</p>';
        }

        echo '</pre>';
        die();
    }
    //==========================================================
    function VerSessao(){
        //Teste de apresentacao de Sessao - esta pendente
        
        die();
    }