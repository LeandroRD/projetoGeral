<?php

namespace App\Models;

use CodeIgniter\Model;



class CriptoModel extends Model
{   //Inicio da variavel conectada na BD
    protected $db;
    protected $key ='324UexQaCqZZZbaa';

    //========================================================
    public function __construct(){
        $this->db = db_connect();
    }
    //========================================================
    public function encriptar($cartao){
        //guardar na BD o cartao de credito encriptado
        $params = array(
            $cartao
        );
        $this->db->query(
            "INSERT INTO criptografia VALUES(0,".
            "AES_ENCRYPT(?,UNHEX(SHA2('".$this->key."',512)))". 
            ")"
            , $params);

    }
    //========================================================
    public function desencriptar($id){
        //retorna desencriptado o cartao de credito   
    }

}