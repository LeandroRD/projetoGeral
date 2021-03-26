<?php

namespace App\Models;
use CodeIgniter\Model;
class StocksModel extends Model
{
    protected $db;
    
    //==================================================
    public function __construct(){
        $this->db = db_connect();
     }
    //=====================================================
    //              FAMILIAS
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

        
        }
    //=======================================================
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
    //=====================================================
    public function check_other_family($designacao,$id_family){
        $params = array(
            $designacao,
            $id_family
        );
        $results = $this-> query("SELECT * FROM stock_familias WHERE designacao = ? 
                   AND id_familia <> ? ",$params
        )->getResult('array');
        if(count($results)!=0){
            return true;
        }else{
            return false;
        }
     }
    //=====================================================
    public function family_edit($id_family){
        //atualizar os dados da family
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('select_parent'),
            $request->getPost('text_designacao'),
            $id_family
        );
        $this->query("UPDATE stock_familias
         SET id_parent = ?,
         designacao =?
          WHERE id_familia = ? ",
          $params);
     }
    //=====================================================
    public function delete_family($id_family){
        //eliminar a familia e alterar o id_parents
        $params = array($id_family);

        //deletendo a familia
        $this->query("DELETE FROM  stock_familias
          WHERE id_familia = ? ",
          $params);

        //   atualizando todas as familias onde id_parent é id_familia
        //   id_parent ficara no valor de '0' todas que sao iguais ao id_family eliminado
        $this->query("UPDATE stock_familias SET id_parent = 0 
                    WHERE id_parent = ? ",$params);

     }
    //=====================================================
    //               TAXAS
    //=====================================================
    public function get_all_taxes(){ 
        //retorna todas as taxas
        return $this->query("SELECT * FROM stock_taxas")->getResult('array');
        }
    //=======================================================
    public function check_tax($designacao){
        // verifique se existe um taxa com o mesmo nome
        $params = array(
            $designacao
        );
        $results = $this-> query("SELECT * FROM stock_taxas WHERE designacao = ?",$params
        )->getResult('array');
        if(count($results)!=0){
            return true;
        }else{
            return false;
        }


     }
    //=======================================================
    public function tax_add(){

        //adiciona uma nova taxa  na BD
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('text_designacao'),
            $request->getPost('text_valor')
        );
        $this->query("INSERT INTO stock_taxas VALUES(0,?,?)",$params);
     }
    //=======================================================
    public function get_tax($id_tax){
        //retorna a familia
       $params = array($id_tax);
       $results = $this->query('SELECT * FROM stock_taxas WHERE id_taxas =?',$params)->getResult('array');
       if(count($results)==1){
           return $results[0];
       }else{
           return array();
       }
       
     }
    //=====================================================
    public function check_other_tax($designacao,$id_tax){
        $params = array(
            $designacao,
            $id_tax
        );
        $results = $this-> query("SELECT * FROM stock_taxas WHERE designacao = ? 
                   AND id_taxas <> ? ",$params
        )->getResult('array');
        if(count($results)!=0){
            return true;
        }else{
            return false;
        }
     }
    //===================================================== 
    public function tax_edit($id_taxa){
        //atualizar os dados da family
        $request = \Config\Services::request();   
        $params = array(
            // $request->getPost('select_parent'),
            $request->getPost('text_designacao'),
            $request->getPost('text_percentagem'),
            $id_taxa
        );
        $this->query("UPDATE stock_taxas
         SET designacao = ?, percentagem=?
          WHERE id_taxas = ? ",
          $params);
        }
    //=====================================================
    public function delete_tax($id_taxa){
        //eliminar a taxa e alterar o id nos produtos
        $params = array(
            $id_taxa
        );
        //deletendo a taxa 
        $this->query("DELETE FROM  stock_taxas
          WHERE id_taxas = ? ",
          $params);
        //   atualizando todas os produtos onde id_taxa é id_taxa
        //   id_parent ficara no valor de '0' todas que sao iguais ao id_family eliminado
        $this->query("UPDATE stock_produtos SET id_taxa = 0 
                    WHERE id_taxa = ? ",$params);
        }
    //=====================================================
                    //PRODUTOS
    //=====================================================
    public function get_all_products(){
            // retorna todos os produtos
            //=================================================
            //----------TABELAS----------------------
            //stock_produtos p 
            //stock_familias f
            //stock_taxas    t
            //----------Colunas----------------------
            //  ID - id_produto(produto)
			//  Produto - designacao(produto)
			//  Familia -  designacao(familia)
			//  Preço/unidade - preco (produtos)
			//  Taxa - designacao + (percentagem )(taxas)
			//  Quantidade - quantidade (produtos)
            //=================================================
            return $this->query(
                "SELECT
                    p.id_produto,p.designacao AS nome_produto, p.preco, p.quantidade,
                    f.designacao AS familia,
                    t.designacao AS taxa, t.percentagem
                FROM 
                    stock_produtos p
                LEFT JOIN 
                    stock_familias f 
                ON 
                    p.id_familia = f.id_familia
                LEFT JOIN 
                    stock_taxas t 
                ON  p.id_taxa = t.id_taxas"
            )->getResult('array');
        }
    //===================================================== 
    public function product_check(){
        //verifica se ja existe um produto com o mesmo nome
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('text_designacao')
        );
        $results = $this-> query("SELECT designacao FROM stock_produtos WHERE designacao = ? 
                    ",$params
        )->getResult('array');
        if(count($results)!=0){
            return true;
        }else{
            return false;
        }
     }
    //=====================================================
    public function product_add($nome_ficheiro){
        
        //adiciona uma novo produto  na BD
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('combo_familia'),
            $request->getPost('text_designacao'),
            $request->getPost('text_descricao'),
            $nome_ficheiro,
            $request->getPost('text_preco'),
            $request->getPost('combo_taxa'),
            $request->getPost('text_quantidade'),
            $request->getPost('text_detalhes'),
            
        );
        $this->query("INSERT INTO stock_produtos VALUES(
            0,
            ?,?,?,?,?,?,?,?,
            NOW()
            )
            ",$params
        );   
     }
    //=====================================================
    public function get_product($id){
        // retorna o espedifico produto
        $params = array(
            $id
        );
        return $this->query(
            "SELECT * FROM stock_produtos
             WHERE id_produto = ?",$params
                
        )->getResult('array')[0];
      }
    //=====================================================
    public function product_other_check($id_produto,$designacao){
        //verifica se ja existe outro produto com o mesmo nome
        $request = \Config\Services::request();
        $params = array(
            $designacao,
            $id_produto
        );
        $results = $this-> query("SELECT designacao FROM stock_produtos WHERE designacao = ? 
                   AND id_produto<> ?
                    ",$params
        )->getResult('array');
        if(count($results)!=0){
            return true;
        }else{
            return false;
        }
     }
    //===================================================== 
    public function product_edit($id_produto,$imagem = '' ){

        $request = \Config\Services::request();
        
        //atualizar o produto com nova imagem
        if($imagem == ''){
            $params = array(
                $request->getPost('combo_familia'),
                $request->getPost('text_designacao'),
                $request->getPost('text_descricao'),
                $request->getPost('text_preco'),
                $request->getPost('combo_taxa'),
                $request->getPost('text_quantidade'),
                $request->getPost('text_detalhes'),
                $id_produto
            );

            $this->query("UPDATE stock_produtos SET
                id_familia = ?, 
                designacao = ?,
                descricao = ?,
                preco =?,
                id_taxa =?,
                quantidade =?,
                detalhes =?,
                atualizacao = NOW()
                WHERE id_produto = ?
            ",$params);

        }
        
        
        if($imagem != ''){
            $params = array(
                $request->getPost('combo_familia'),
                $request->getPost('text_designacao'),
                $request->getPost('text_descricao'),
                $imagem,
                $request->getPost('text_preco'),
                $request->getPost('combo_taxa'),
                $request->getPost('text_quantidade'),
                $request->getPost('text_detalhes'),
                $id_produto
            );

            $this->query("UPDATE stock_produtos SET
                id_familia = ?, 
                designacao = ?,
                descricao = ?,
                imagem = ?,
                preco =?,
                id_taxa =?,
                quantidade =?,
                detalhes =?,
                atualizacao = NOW()
                WHERE id_produto = ?
            ",$params);
        }
     }
//=====================================================
    public function delete_product($id_produto){
        //eliminar o produto e alterar o id_parents
        $params = array($id_produto);
        //deletendo o produto
        $this->query("DELETE FROM  stock_produtos
          WHERE id_produto = ? ",
          $params);
         }
        
    //=====================================================
        //MOVIMENTOS
    //=====================================================
    public function get_movimento(){
        return $this->query(
            "SELECT m.*,p.designacao 
             FROM stock_movimentos m, stock_produtos p
             WHERE p.id_produto = m.id_produto
             ORDER BY m.data_movimento DESC
            ")->getResult('array');
        }
    //=====================================================
}




 
