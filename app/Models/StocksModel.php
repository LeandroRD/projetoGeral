<?php

namespace App\Models;

use CodeIgniter\Model;

class StocksModel extends Model
{
    protected $db;

    //==================================================
    public function __construct()
    {
        $this->db = db_connect();
    }
    //=====================================================
    //              FAMILIAS
    //=====================================================
    public function get_all_families()
    {


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
        //AS parent é uma variavel criada aqui que estara retornando
        //=======================================================

        return $this->query('
        SELECT a.*, b.designacao AS parent
        FROM stock_familias a LEFT JOIN stock_familias b
        ON a.id_parent = b.id_familia
        ')->getResult('array');
    }

    //=======================================================
    public function get_all_families_servicos()
    {
        return $this->query('
            SELECT a.*, b.designacao_servicos AS parent_servicos
            FROM stock_familias_servicos a LEFT JOIN stock_familias_servicos b
            ON a.id_parent_servicos = b.id_familia_servicos
            ')->getResult('array');
    }
    //=======================================================
    public function get_all_estados()
    {
        return $this->query('
        SELECT * FROM relacao_uf
            ')->getResult('array');
    }
    //=======================================================
    public function get_all_escopo()
    {
        return $this->query('
        SELECT * FROM cotacao_escopo
            ')->getResult('array');
    }
    //=======================================================
    public function check_family($designacao)
    {
        $params = array(
            $designacao
        );
        $results = $this->query(
            "SELECT * FROM stock_familias WHERE designacao = ?",
            $params
        )->getResult('array');
        if (count($results) != 0) {
            return true;
        } else {
            return false;
        }
    }
    //=====================================================
    public function check_family_servicos($designacao)
    {
        $params = array(
            $designacao
        );
        $results = $this->query(
            "SELECT * FROM stock_familias_servicos WHERE designacao_servicos = ?",
            $params
        )->getResult('array');
        if (count($results) != 0) {
            return true;
        } else {
            return false;
        }
    }

    //=====================================================
    public function get_family($id_family)
    {
        //retorna a familia
        $params = array($id_family);
        $results = $this->query('SELECT * FROM stock_familias WHERE id_familia =?', $params)->getResult('array');
        if (count($results) == 1) {
            return $results[0];
        } else {
            return array();
        }
    }
    //=====================================================
    public function get_fornecedor($id_fornecedor)
    {
        //retorna a familia
        $params = array($id_fornecedor);
        $results = $this->query('SELECT * FROM fornecedores WHERE id_for =?', $params)->getResult('array');
        if (count($results) == 1) {
            return $results[0];
        } else {
            return array();
        }
    }
    //=====================================================
    public function get_cotacao($id_fornecedor)
    {
        //retorna a cotacao
        $params = array($id_fornecedor);
        $results = $this->query('SELECT * FROM cotacao_servicos WHERE id_cot =?', $params)->getResult('array');
        if (count($results) == 1) {
            return $results[0];
        } else {
            return array();
        }
    }

    //=====================================================
    public function get_family_servicos($id_family)
    {
        //retorna a familia
        $params = array($id_family);
        $results = $this->query('SELECT * FROM stock_familias_servicos WHERE id_familia_servicos =?', $params)->getResult('array');

        if (count($results) == 1) {
            return $results[0];
        } else {
            return array();
        }
    }


    //=====================================================
    public function family_add()
    {

        //adiciona uma nova familia de produtos na BD
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('select_parent'),
            $request->getPost('text_designacao')
        );
        $this->query("INSERT INTO stock_familias VALUES(0,?,?,'' )", $params);
    }
    //=====================================================
    public function servicos_add($servicos)
    {
        //adiciona uma nova familia de produtos na BD
        $request = \Config\Services::request();
        $params = array(
            $servicos
        );
        $this->query("INSERT INTO cotacao_escopo VALUES(0,1,? )", $params);
    }
    //=====================================================
    public function cotacao_add()
    {

        //adiciona uma nova familia de produtos na BD
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('select_parent'),
            $request->getPost('text_escopo')
        );
        $this->query("INSERT INTO cotacao_escopo VALUES(0,?,? )", $params);
    }
    //=====================================================
    public function family_add_servicos()
    {

        //adiciona uma nova familia de produtos na BD
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('select_parent'),
            $request->getPost('text_designacao')
        );
        $this->query("INSERT INTO stock_familias_servicos VALUES(0,?,? )", $params);
    }
    //=====================================================
    public function check_other_family($designacao, $id_family)
    {
        $params = array(
            $designacao,
            $id_family
        );
        $results = $this->query(
            "SELECT * FROM stock_familias WHERE designacao = ? 
                   AND id_familia <> ? ",
            $params
        )->getResult('array');
        if (count($results) != 0) {
            return true;
        } else {
            return false;
        }
    }
    //=====================================================
    public function check_other_razao_social($razao_social, $id_razaoSocial)
    {
        $params = array(
            $razao_social,
            $id_razaoSocial
        );
        $results = $this->query(
            "SELECT * FROM fornecedores WHERE razao_social = ? 
                   AND id_for <> ?
                  ",
            $params
        )->getResult('array');
        if (count($results) != 0) {
            return true;
        } else {
            return false;
        }
    }
    //=====================================================
    public function check_other_cnpj($cnpj, $id_fornecedor)
    {
        $params = array(
            $cnpj,
            $id_fornecedor
        );

        $results = $this->query(
            "SELECT * FROM fornecedores 
                   WHERE cnpj = ?
                   AND id_for <> ? 
                  ",
            $params
        )->getResult('array');
        if (count($results) != 0) {
            return true;
        } else {
            return false;
        }
    }
    //=====================================================
    public function check_other_family_servicos($designacao, $id_family)
    {
        $params = array(
            $designacao,
            $id_family
        );
        $results = $this->query(
            "SELECT * FROM stock_familias_servicos WHERE designacao_servicos = ? 
                   AND id_familia_servicos <> ? ",
            $params
        )->getResult('array');
        if (count($results) != 0) {
            return true;
        } else {
            return false;
        }
    }
    //=====================================================
    public function family_edit($id_family)
    {
        //atualizar os dados da family
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('select_parent'),
            $request->getPost('text_designacao'),
            $id_family
        );
        $this->query(
            "UPDATE stock_familias
         SET id_parent = ?,
         designacao =?
          WHERE id_familia = ? ",
            $params
        );
    }
    //=====================================================
    public function fornecedor_editar($id_fornecedor)
    {

        //atualizar os dados da family
        $request = \Config\Services::request();
        $params = array(

            $request->getPost('text_razao_social'),
            $request->getPost('combo_familia'),
            $request->getPost('text_cnpj'),
            $request->getPost('text_ie'),
            $request->getPost('text_endereco'),
            $request->getPost('text_numero'),
            $request->getPost('text_complemento'),
            $request->getPost('text_bairro'),
            $request->getPost('text_municipio'),
            $request->getPost('text_uf'),
            $request->getPost('text_cep'),
            $request->getPost('text_email'),
            $request->getPost('text_contato'),
            $request->getPost('text_telefone'),
            $request->getPost('text_celular'),
            $request->getPost('text_obs'),
            $id_fornecedor
        );

        $this->query(
            "UPDATE fornecedores SET 
         razao_social = ?,
         servico =?,
         cnpj=?,
         I_E=?,
         endereco=?,
         numero=?,
         complemento=?,
         bairro=?,
         municipio=?,
         UF=?,
         CEP=?,
         email=?,
         contato=?,
         telefone=?,
         celular=?,
         obs=?
          WHERE id_for = ? ",
            $params
        );
    }

    //=====================================================
    public function cotacao_editar($id_cotacao)
    {

        //atualizar os dados da family
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('text_escopo'),
            $request->getPost('combo_fornecedor'),
            $request->getPost('text_detalhes'),
            $id_cotacao
        );
        $this->query(
            "UPDATE cotacao_servicos SET 
         escopo = ?,
         id_for =?,
         detalhes=?
          WHERE id_cot = ? ",
            $params
        );
    }
    //=====================================================
    public function escopo_editar($id_escopo)
    {
        //atualizar os dados da family
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('text_escopo')
        );
        $this->query(
            "UPDATE cotacao_escopo SET 
         escopo = ?
          WHERE id_escopo = $id_escopo ",
            $params
        );
    }

    //=====================================================
    public function cotacao_editar_fornecedor($id_cotacao)
    {
        //atualizar os dados da family
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('text_detalhes'),
            $id_cotacao
        );
        $this->query(
            "UPDATE cotacao_servicos SET 
         detalhes = ?
          WHERE id_cot = ? ",
            $params
        );
    }
    //=====================================================
    public function cotacao_editar_fornecedor_aprovada($id_cotacao)
    {
        //atualizar os dados da family
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('text_acompanhamento'),
            $id_cotacao
        );
        $this->query(
            "UPDATE cotacao_servicos SET 
         acompanhamento = ?
          WHERE id_cot = ? ",
            $params
        );
    }
    //=====================================================
    public function family_edit_servicos($id_family)
    {
        //atualizar os dados da family
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('select_parent'),
            $request->getPost('text_designacao'),
            $id_family
        );
        $this->query(
            "UPDATE stock_familias_servicos
         SET id_parent_servicos = ?,
         designacao_servicos =?
          WHERE id_familia_servicos = ? ",
            $params
        );
    }
    //=====================================================
    public function family_servicos_edit($id_family)
    {
        //atualizar os dados da family
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('select_parent'),
            $request->getPost('text_designacao'),
            $id_family
        );
        $this->query(
            "UPDATE stock_familias_servicos
         SET id_parent_servicos = ?,
         designacao_servicos =?
          WHERE id_familia_servicos = ? ",
            $params
        );
    }
    //=====================================================
    public function delete_family($id_family)
    {
        //eliminar a familia e alterar o id_parents
        $params = array($id_family);

        //deletendo a familia
        $this->query(
            "DELETE FROM  stock_familias
          WHERE id_familia = ? ",
            $params
        );

        //   atualizando todas as familias onde id_parent é id_familia
        //   id_parent ficara no valor de '0' todas que sao iguais ao id_family eliminado
        $this->query("UPDATE stock_familias SET id_parent = 0 
                    WHERE id_parent = ? ", $params);
    }
    //=====================================================
    public function delete_family_servicos($id_family_servicos)
    {
        //eliminar a familia e alterar o id_parents
        $params = array($id_family_servicos);

        //deletendo a familia
        $this->query(
            "DELETE FROM  stock_familias_servicos
          WHERE id_familia_servicos = ? ",
            $params
        );

        //   atualizando todas as familias onde id_parent é id_familia
        //   id_parent ficara no valor de '0' todas que sao iguais ao id_family eliminado
        $this->query("UPDATE stock_familias_servicos SET id_parent_servicos = 0 
                    WHERE id_parent_servicos = ? ", $params);
    }
    //=====================================================
    public function delete_fornecedor($id_fornecedor)
    {
        //eliminar o fornecedor
        $params = array($id_fornecedor);

        //deletendo a familia
        $this->query(
            "DELETE FROM  fornecedores
          WHERE id_for = ? ",
            $params
        );

        //   atualizando todas as familias onde id_parent é id_familia
        //   id_parent ficara no valor de '0' todas que sao iguais ao id_family eliminado
        $this->query("UPDATE fornecedores SET servico = 0 
                    WHERE servico = ? ", $params);
    }
    //=====================================================
    //               TAXAS
    //=====================================================
    public function get_all_taxes()
    {
        //retorna todas as taxas
        return $this->query("SELECT * FROM stock_taxas")->getResult('array');
    }
    //=======================================================
    public function get_all_checklists()
    {
        //retorna todas as taxas
        return $this->query("SELECT * FROM servicos")->getResult('array');
    }
    //=======================================================
    public function check_tax($designacao)
    {
        // verifique se existe um taxa com o mesmo nome
        $params = array(
            $designacao
        );
        $results = $this->query(
            "SELECT * FROM stock_taxas WHERE designacao = ?",
            $params
        )->getResult('array');
        if (count($results) != 0) {
            return true;
        } else {
            return false;
        }
    }
    //=======================================================
    public function check_checkList($designacao)
    {
        // verifique se existe um checklist com o mesmo nome
        $params = array(
            $designacao
        );
        $results = $this->query(
            "SELECT * FROM servicos WHERE servicos = ?",
            $params
        )->getResult('array');
        if (count($results) != 0) {
            return true;
        } else {
            return false;
        }
    }
    //=======================================================
    public function check_cotacao($designacao)
    {
        // verifique se existe uma cotacao com o mesmo nome
        $params = array(
            $designacao
        );
        $results = $this->query(
            "SELECT * FROM cotacao_servicos WHERE escopo = ?",
            $params
        )->getResult('array');
        if (count($results) != 0) {
            return true;
        } else {
            return false;
        }
    }
    //=======================================================
    public function tax_add()
    {
        //adiciona uma nova taxa  na BD
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('text_designacao'),
            $request->getPost('text_valor')
        );
        $this->query("INSERT INTO stock_taxas VALUES(0,?,?)", $params);
    }
    //=======================================================
    public function tratar_servicos()
    {
        $request = \Config\Services::request();
        $params2 = array(
            $request->getPost('select_parent'),
            $request->getPost('projeto')
        );
        $params5 = array($request->getPost('select_parent'));
        //selecionar tudo o que foi postado
        $servico = $_POST;
        
        //tirar o ultimo registro que é o fornecedor
        $params =  array_pop($servico);
        //tirar o penultimo registro que é o projeto
        $params =  array_pop($servico);
        // cadastrar na cotacao
        $this->query("INSERT INTO cotacao_servicos VALUES(0,?,?,'',0,'' )", $params2);
        //apos cadastrar cotacao pegar todos os registros 
        $results = $this->query('SELECT * FROM cotacao_servicos WHERE id_for = ?', $params5)->getResult('array');
        //selecionar o ultimo registro
        $results5 = array_pop($results);
        $results3 = $results5['id_cot'];
        //cadastrar todos os servicos na ultima cotacao
        foreach ($servico as $t1) {
            $this->query("INSERT INTO cotacao_escopo VALUES(0,$results3,?)", $t1);
        }
        
    }
    //=======================================================
    public function tratar_servicos2()
    {
        $request = \Config\Services::request();
        $params2 = array(
            $request->getPost('checkLista')
        );
        $servico = $_POST;
        // tirar o ultimo registro que é o nome do check list
        $params2 =  array_pop($servico);
        // cadastrar no servicos
        $this->query("INSERT INTO servicos VALUES(0,? )", $params2);
        //apos cadastrar cotacao pegar todos os registros 
        $results = $this->query('SELECT * FROM servicos WHERE servicos = ?', $params2)->getResult('array');
        // selecionar o ultimo registro
        $results5 = array_pop($results);
        // pegar o id do ultimo servico cadastrado
        $results3 = $results5['id_servico'];
        //cadastrar todos os check list  do  ultimo servico
        foreach ($servico as $t1) {
            $this->query("INSERT INTO check_list VALUES(0,$results3,?)", $t1);
        }
    }

    //=======================================================
    public function get_tax($id_tax)
    {
        //retorna a familia
        $params = array($id_tax);
        $results = $this->query('SELECT * FROM stock_taxas WHERE id_taxas =?', $params)->getResult('array');
        if (count($results) == 1) {
            return $results[0];
        } else {
            return array();
        }
    }
    //=====================================================
    public function check_other_tax($designacao, $id_tax)
    {
        $params = array(
            $designacao,
            $id_tax
        );
        $results = $this->query(
            "SELECT * FROM stock_taxas WHERE designacao = ? 
                   AND id_taxas <> ? ",
            $params
        )->getResult('array');
        if (count($results) != 0) {
            return true;
        } else {
            return false;
        }
    }
    //===================================================== 
    public function tax_edit($id_taxa)
    {
        //atualizar os dados da family
        $request = \Config\Services::request();
        $params = array(
            // $request->getPost('select_parent'),
            $request->getPost('text_designacao'),
            $request->getPost('text_percentagem'),
            $id_taxa
        );
        $this->query(
            "UPDATE stock_taxas
         SET designacao = ?, percentagem=?
          WHERE id_taxas = ? ",
            $params
        );
    }
    //=====================================================
    public function get_checklists_editar($id_check)
    {
        $params = array($id_check);
        return $this->query(
            "SELECT * FROM check_list
        WHERE id_servico = ? ",
            $params
        )->getResult('array');
    }
    //=====================================================
    public function cot_aprovado($id_aprovado)
    {
        $params = array(
            $id_aprovado
        );
        $this->query(
            "UPDATE cotacao_servicos
         SET cot_aprovado = 1
          WHERE id_cot = ? ",
            $params
        );
    }
    //=====================================================
    public function delete_tax($id_taxa)
    {
        //eliminar a taxa e alterar o id nos produtos
        $params = array(
            $id_taxa
        );
        //deletendo a taxa 
        $this->query(
            "DELETE FROM  stock_taxas
          WHERE id_taxas = ? ",
            $params
        );
        //   atualizando todas os produtos onde id_taxa é id_taxa
        //   id_parent ficara no valor de '0' todas que sao iguais ao id_family eliminado
        $this->query("UPDATE stock_produtos SET id_taxa = 0 
                    WHERE id_taxa = ? ", $params);
    }
    //=====================================================
    public function delete_cotacao($id_cotacao)
    {
        //eliminar a taxa e alterar o id nos produtos
        $params = array(
            $id_cotacao
        );
        //deletendo a taxa 
        $this->query(
            "DELETE FROM  cotacao_servicos
          WHERE id_cot = ? ",
            $params
        );
    }
    //=====================================================
    //PRODUTOS
    //=====================================================
    public function get_all_products()
    {
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
    public function product_check()
    {
        //verifica se ja existe um produto com o mesmo nome
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('text_designacao')
        );
        $results = $this->query(
            "SELECT designacao FROM stock_produtos WHERE designacao = ? 
                    ",
            $params
        )->getResult('array');
        if (count($results) != 0) {
            return true;
        } else {
            return false;
        }
    }
    //=====================================================
    public function fornecedor_check()
    {
        // verifica se já existe um usuário com o mesmo Nome de Usuário ou Endereço de Email
        $request = \Config\Services::request();
        $dados = $request->getPost();

        $params = array(
            $dados['text_razao_social']
        );
        return $this->db->query("SELECT id_for FROM fornecedores WHERE razao_social = ? ", $params)->getResult('array');
    }
    //=====================================================
    public function fornecedor_check_tras_id()
    {
        //verifica se ja existe um fornecedor com o mesmo nome
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('text_razao_social')
        );
        return $this->query(
            "SELECT id_for FROM fornecedores WHERE razao_social = ? 
                    ",
            $params
        )->getResult('array')[0];
    }
    //=====================================================
    public function cnpj_check()
    {
        //verifica se ja existe um fornecedor com o mesmo cnpj
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('text_cnpj')
        );

        $results = $this->query(
            "SELECT cnpj FROM fornecedores WHERE cnpj = ? 
                    ",
            $params
        )->getResult('array');
        if (count($results) != 0) {
            return true;
        } else {
            return false;
        }
    }
    //=====================================================
    public function fornecedor_servicos()
    {
        //verifica se ja existe um fornecedor com o mesmo nome
        $request = \Config\Services::request();
        $servicos =    $request->getPost('select_parent');
        if ($servicos == 0) {
            return true;
        } else {
            return false;
        }
    }
    //=====================================================
    public function produtos_servicos()
    {
        //verifica se ja existe um fornecedor com o mesmo nome
        $request = \Config\Services::request();
        $produto = $request->getPost('combo_familia');
        if ($produto == 0) {
            return true;
        } else {
            return false;
        }
    }
    //=====================================================
    public function product_add($nome_ficheiro)
    {

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
        $this->query(
            "INSERT INTO stock_produtos VALUES(
            0,
            ?,?,?,?,?,?,?,?,
            NOW()
            )
            ",
            $params
        );
    }
    //=====================================================
    public function fornecedor_add()
    {

        //adiciona uma novo produto  na BD
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('text_razao_social'),
            $request->getPost('select_parent'),
            $request->getPost('text_cnpj'),
            $request->getPost('text_ie'),
            $request->getPost('text_endereco'),
            $request->getPost('text_numero'),
            $request->getPost('text_complemento'),
            $request->getPost('text_bairro'),
            $request->getPost('text_municipio'),
            $request->getPost('text_uf'),
            $request->getPost('text_cep'),
            $request->getPost('text_email'),
            $request->getPost('text_contato'),
            $request->getPost('text_telefone'),
            $request->getPost('text_celular'),
            $request->getPost('text_obs'),

        );
        $this->query(
            "INSERT INTO fornecedores 
        VALUES(
        0,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?
        )
        ",
            $params
        );
    }
    //=====================================================
    public function get_product($id)
    {
        // retorna o espedifico produto
        $params = array(
            $id
        );
        return $this->query(
            "SELECT * FROM stock_produtos
             WHERE id_produto = ?",
            $params

        )->getResult('array')[0];
    }
    //=====================================================
    public function product_other_check($id_produto, $designacao)
    {
        //verifica se ja existe outro produto com o mesmo nome
        $request = \Config\Services::request();
        $params = array(
            $designacao,
            $id_produto
        );
        $results = $this->query(
            "SELECT designacao FROM stock_produtos WHERE designacao = ? 
                   AND id_produto<> ?
                    ",
            $params
        )->getResult('array');
        if (count($results) != 0) {
            return true;
        } else {
            return false;
        }
    }
    //===================================================== 
    public function product_edit($id_produto, $imagem = '')
    {

        $request = \Config\Services::request();

        //atualizar o produto com nova imagem
        if ($imagem == '') {
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
            ", $params);
        }
        if ($imagem != '') {
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
            ", $params);
        }
    }
    //=====================================================
    public function delete_product($id_produto)
    {
        //eliminar o produto e alterar o id_parents
        $params = array($id_produto);
        //deletendo o produto
        $this->query(
            "DELETE FROM  stock_produtos
          WHERE id_produto = ? ",
            $params
        );
    }

    //=====================================================
    //MOVIMENTOS
    //=====================================================
    public function get_movimento()
    {
        return $this->query(
            "SELECT m.*,p.designacao 
             FROM stock_movimentos m, stock_produtos p
             WHERE p.id_produto = m.id_produto
             ORDER BY m.data_movimento DESC
            "
        )->getResult('array');
    }

    //=====================================================
    public function movimento_add()
    {

        //adiciona um novo movimento na BD
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('select_parent'),
            $request->getPost('text_quantidade'),
            $request->getPost('text_obs')
        );
        $this->query("INSERT INTO stock_movimentos VALUES(0,'',?,?,?,'','',NOW() )", $params);
    }
    //=====================================================
    public function movimento_add_produto()
    {
        //adiciona a BD de produtos 
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('text_quantidade'),
            $request->getPost('select_parent')
        );
        $this->query("UPDATE stock_produtos SET
                quantidade =quantidade+?,
                atualizacao = NOW()
                WHERE id_produto = ?
            ", $params);
    }
    //=====================================================
    public function movimento_del_produto()
    {
        //adiciona a BD de produtos 
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('text_quantidade'),
            $request->getPost('select_parent')
        );
        $this->query("UPDATE stock_produtos SET
               quantidade =quantidade-?,
               atualizacao = NOW()
               WHERE id_produto = ?
           ", $params);
    }
    //=====================================================
    public function get_all_fornecedores()
    {
        //busca todos as familias de  servicos atraves do id_familia_servicos
        return $this->query("SELECT 
        f.id_for,
        f.razao_social,
        f.municipio,
        u.UF AS estado,
        s.designacao_servicos AS nome_servico
        FROM fornecedores f
        LEFT JOIN 
            stock_familias_servicos s  
        ON 
            f.servico = s.id_familia_servicos
        LEFT JOIN 
            relacao_uf u 
        ON 
        f.UF = u.id_uf    
        ")->getResult('array');
    }
    //=======================================================
    public function escopo_por_cotacao($id_cotacao)
    {

        $params = array($id_cotacao);
        return $this->query(
            'SELECT * 
               FROM cotacao_escopo 
               WHERE id_cot =?',
            $params
        )->getResult('array');
    }
    //=======================================================
    public function get_escopo($id_escopo)
    {

        $params = array($id_escopo);
        return $this->query(
            'SELECT * 
               FROM cotacao_escopo 
               WHERE id_escopo =?',
            $params
        )->getResult('array');
    }
    //=======================================================
    public function get_all_servicos()
    {
        //busca todos as familias de  servicos atraves do id_familia_servicos
        return $this->query("SELECT 
    s.servicos
    FROM servicos s   
    ")->getResult('array');
    }
    //=======================================================
    public function get_all_cotacoes()
    {
        //busca todos as cotacoes
        return $this->query("SELECT 
         c.id_cot, 
         c.escopo,
         c.detalhes,
         f.razao_social AS razaoSocial
         FROM cotacao_servicos c
         LEFT JOIN 
             fornecedores f 
         ON 
             c.id_for = f.id_for
         Where c.cot_aprovado = 0 
         ")->getResult('array');
    }
    //=====================================================
    public function get_all_cotacoes_aprovadas()
    {
        //busca todos as cotacoes
        return $this->query("SELECT 
     c.id_cot, 
     c.escopo,
     c.acompanhamento,
     f.razao_social AS razaoSocial
     FROM cotacao_servicos c
     LEFT JOIN 
         fornecedores f 
     ON 
         c.id_for = f.id_for
     Where c.cot_aprovado = 1 
     ")->getResult('array');
    }

    //=====================================================
    public function get_all_cotacoes_fornecedor($id_fornecedor)
    {
        $params = array(
            $id_fornecedor
        );
        //busca todos as familias de  servicos atraves do id_familia_servicos
        return $this->query("SELECT 
         c.id_cot, 
         c.escopo,
         c.detalhes,
         f.razao_social AS razaoSocial
         FROM cotacao_servicos c
         LEFT JOIN 
             fornecedores f 
         ON 
             c.id_for = f.id_for
         WHERE f.id_for = ? 
         AND c.cot_aprovado = 0 
         ", $params)->getResult('array');
    }
    //=====================================================
    public function get_all_cotacoes_fornecedor_aprovadas($id_fornecedor)
    {
        $params = array(
            $id_fornecedor
        );
        //busca todos as familias de  servicos atraves do id_familia_servicos
        return $this->query("SELECT 
     c.id_cot, 
     c.escopo,
     c.acompanhamento,
     f.razao_social AS razaoSocial
     FROM cotacao_servicos c
     LEFT JOIN 
         fornecedores f 
     ON 
         c.id_for = f.id_for
     WHERE f.id_for = ? 
     AND c.cot_aprovado = 1 
     ", $params)->getResult('array');
    }
    //=====================================================
    public function get_id_fornecedor($id_fornecedor)
    {
        $params = array(
            $id_fornecedor
        );
        return $this->query(
            "SELECT id_fornecedor 
                 FROM users 
                 WHERE name = ?
                ",
            $params
        )->getResult('array')[0];
    }
}
//=====================================================
