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

            // exemplo do endereco para incriptar dados na BD
            // http://localhost/projetogeral/public/index.php/cripto/guardarCartao

    }
    //========================================================
    public function desencriptar($id){
        //retorna desencriptado o cartao de credito
        $params = array(
            $id
        ); 
        return $this->db->query("
                SELECT id_cartao, AES_DECRYPT(numero_cartao,UNHEX(SHA2('".$this->key."',512))) AS numero_cartao
                FROM criptografia
                WHERE id_cartao = ?
        ",$params)->getResult('array');
        
        // exemplo do endereco para procurar cartao pelo id
        // http://localhost/projetogeral/public/index.php/cripto/apresentarCartao/3
    }
    //========================================================
    public function ProcurarCartao($numero_cartao){
        $params = array(
            $numero_cartao
        );
        return $this->db->query(
        "SELECT id_cartao,
                AES_DECRYPT(numero_cartao,UNHEX(SHA2('".$this->key."',512))) AS numero_cartao
                from criptografia
                WHERE AES_DECRYPT(numero_cartao,UNHEX(SHA2('".$this->key."',512)))= ? "
        ,$params)->getResult('array');

        //Exemplo do endereco a ser consultado na BD
        // http://localhost/projetogeral/public/index.php/cripto/procurarCartao/Guilherme
    }

}