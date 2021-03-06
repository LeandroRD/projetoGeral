<?php

namespace App\Models;

use CodeIgniter\Model;



class StocksModel extends Model
{
    protected $db;
    //==========================================
    public function __construct(){
        $this->db = db_connect();
    }
    //=====================================================
    public function get_all_families(){
        
        
        // ESTE SO TRAZ OS QUE OS FILHOS
        //=======================================================

        // return $this->query('
        // SELECT a.*, b.designacao AS parent
        // FROM stock_familias a, stock_familias b
        // WHERE a.id_parent = b.id_familia
        // ')->getResult('array');
        
        //=======================================================



        //ESTE TRAS TUDO E MAIS O PAI
        //a=tras tudo
        //b=tras designacao se tiver parent igual
        //Seleciona na tabela stock_familias 'a' associando a esquerda 'b' 
        //trazendo todos id_parent que forem iguais a id_familia
        //=======================================================

        return $this->query('
        SELECT a.*, b.designacao AS parent
        FROM stock_familias a LEFT JOIN stock_familias b
        ON a.id_parent = b.id_familia
        ')->getResult('array');

        //=======================================================
        }
        public function check_family($designacao){
            $params = array(
                $designacao
            );
            $results = $this-> query("SELECT * FROM stock_familias WHERE designacao = ?",$params
            )->getResult('array');
            if(count($results)!=0){
                return true;
            }else{
                return false;
            }
    }
     //=====================================================
     public function get_family($id_family){
         //retorna a familia
         $params = array($id_family);
        $results = $this->query('SELECT * FROM stock_familias WHERE id_familia =?',$params)->getResult('array');
        if(count($results)==1){
            return $results[0];
        }else{
            return array();
        }
        
    }
    //=====================================================
    public function family_add(){

        //adiciona uma nova familia de produtos na BD
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('select_parent'),
            $request->getPost('text_designacao')
        );
        $this->query("INSERT INTO stock_familias VALUES(0,?,?,'' )",$params);


    }
   
 }
