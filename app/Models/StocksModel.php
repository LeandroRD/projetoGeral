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

        return $this->query(
            'SELECT a.*, b.designacao AS parent
        FROM stock_familias a LEFT JOIN stock_familias b
        ON a.id_parent = b.id_familia
        '
        )->getResult('array');
    }

    //=======================================================
    public function get_all_families_servicos()
    {
        return $this->query(
            'SELECT a.*, b.designacao_servicos AS parent_servicos
            FROM stock_familias_servicos a LEFT JOIN stock_familias_servicos b
            ON a.id_parent_servicos = b.id_familia_servicos
            '
        )->getResult('array');
    }
    //=======================================================
    public function get_all_estados()
    {
        return $this->query(
            'SELECT * FROM relacao_uf
            '
        )->getResult('array');
    }
    //=======================================================
    public function get_all_escopo()
    {
        return $this->query(
            'SELECT * FROM cotacao_escopo
            '
        )->getResult('array');
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
    public function check_itemCheck($id)
    {
        $request = \Config\Services::request();
        $params = array(
            $id,
            $request->getPost('text_designacao')
        );
        $results = $this->query(
            "SELECT * FROM check_list WHERE id_checklist = ?
            AND check_list = ?",
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
        $results = $this->query(
            'SELECT * FROM stock_familias WHERE id_familia =?',
            $params
        )->getResult('array');
        if (count($results) == 1) {
            return $results[0];
        } else {
            return array();
        }
    }
    //=====================================================
    public function get_parent($id_parent)
    {
        //retorna a familia
        $params = array($id_parent);
        $results = $this->query(
            'SELECT razao_social FROM fornecedores WHERE id_for =?',
            $params
        )->getResult('array');
        if (count($results) == 1) {
            return $results[0];
        } else {
            return array();
        }
    }
    //=====================================================
    public function get_parent_nome($id_parent)
    {
        //retorna a familia
        $params = array($id_parent);

        $results = $this->query('SELECT razao_social FROM fornecedores WHERE razao_social =?', $params)->getResult('array');
        if (count($results) == 1) {
            return $results[0];
        } else {
            return array();
        }
    }
    //=====================================================
    public function get_checkList($id_check)
    {
        //retorna a familia
        $params = array($id_check);
        $results = $this->query('SELECT * FROM servicos WHERE id_servico =?', $params)->getResult('array');
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
    public function get_cliente($id_cliente)
    {
        //retorna a familia
        $params = array($id_cliente);
        $results = $this->query('SELECT * FROM clientes WHERE id_cliente =?', $params)->getResult('array');
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
    //====================================================
    public function get_datas_escopo($id_cotacao)
    {
        $params = array($id_cotacao);
        return $this->query(
            'SELECT * 
                FROM cotacao_data 
                WHERE id_cot =?',
            $params
        )->getResult('array');
    }
    //====================================================
    public function get_horas_escopo($todas_horas)
    {
        foreach ($todas_horas as $h1) {
            $total_horas[] =  $this->query(
                'SELECT hora_cot
               FROM cotacao_hora 
               WHERE id_data_cot = ?',
                $h1['id_data_cot']
            )->getResult('array');
        }
        return $total_horas;
    }
    //====================================================
    public function get_datas($id_cotacao)
    {
        //retorna a cotacao
        $params = array($id_cotacao);
        return $this->query(
            'SELECT data_cot 
               FROM cotacao_data 
               WHERE id_cot =?',
            $params
        )->getResult('array');
    }
    //=====================================================
    public function get_id_cot_datas($id_cotacao)
    {
        //retorna a cotacao
        $params = array($id_cotacao);
        return $this->query(
            'SELECT id_cot 
               FROM cotacao_data 
               WHERE id_data_cot =?',
            $params
        )->getResult('array');
    }
    //=====================================================
    public function get_id_cot_data($id_cotacao)
    {
        //retorna a cotacao
        $params = array($id_cotacao);
        return $this->query(
            'SELECT id_cot 
               FROM cotacao_escopo 
               WHERE id_escopo =?',
            $params
        )->getResult('array');
    }
    //=====================================================
    public function get_data($id_cotacao)
    {
        //retorna a data do item 
        $params = array($id_cotacao);
        return $this->query(
            'SELECT data_cot 
               FROM cotacao_data 
               WHERE id_data_cot =?',
            $params
        )->getResult('array');
    }
    //=====================================================
    public function get_hora($id_cotacao, $menor_data)
    {
        $params = array($id_cotacao, $menor_data);
        return $this->query(
            'SELECT id_data_cot 
               FROM cotacao_data 
               WHERE id_cot =?
               AND data_cot=?',
            $params
        )->getResult('array');
    }
    //=====================================================
    public function get_menor_hora($id_cotacao, $menor_data)
    {
        $menor_data2 = $menor_data['data_cot'];
        $params = array($id_cotacao, $menor_data2);
        return $this->query(
            'SELECT id_data_cot 
               FROM cotacao_data 
               WHERE id_cot =?
               AND data_cot=?',
            $params
        )->getResult('array');
    }
    //=====================================================
    public function get_hora_p_outro_forn($id_cotacao)
    {
        $params = array($id_cotacao);
        return $this->query(
            'SELECT id_data_cot 
               FROM cotacao_data 
               WHERE id_cot =?',
            $params
        )->getResult('array');
    }
    //=====================================================
    public function get_hora_copia($id_anterior)
    {
        $params = array($id_anterior);
        return $this->query(
            'SELECT id_data_cot 
               FROM cotacao_data 
               WHERE id_cot =?',
            $params
        )->getResult('array');
    }
    //=====================================================
    public function get_hora2($get_hora)
    {
        return $this->query(
            'SELECT hora_cot 
               FROM cotacao_hora 
               WHERE id_data_cot =?',
            $get_hora
        )->getResult('array');
    }
    //=====================================================
    public function get_all_horas($get_hora)
    {

        $s = 0;
        foreach ($get_hora as $t1) {
            $get_hora_indice = $get_hora[$s]['id_data_cot'];
            $selecao_horas_object = $get_hora_indice;

            $teste = $this->query(
                'SELECT hora_cot 
               FROM cotacao_hora 
               WHERE id_data_cot =?',
                $get_hora_indice
            )->getResult('array');
            $testex = $teste[0]['hora_cot'];
            $teste2[] = $testex;
            $s++;
        }
        return ($teste2);
    }
    //=====================================================
    public function get_itemCheck($id_itemCheck, $item2)
    {
        //retorna a cotacao
        $params = array($id_itemCheck, $item2);
        $results = $this->query('SELECT * FROM check_list
        WHERE id_checklist = ?
        AND check_list =?', $params)->getResult('array');
        if (count($results) == 1) {
            return $results[0];
        } else {
            return array();
        }
    }
    //=====================================================
    public function get_Check($id_itemCheck)
    {
        //retorna todos os servicos
        $params = array($id_itemCheck);
        $results = $this->query(
            'SELECT * FROM servicos
        WHERE id_servico = ?',
            $params
        )->getResult('array');
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
    public function check_other_razao_social_cliente($razao_social, $id_razaoSocial)
    {
        $params = array(
            $razao_social,
            $id_razaoSocial
        );
        $results = $this->query(
            "SELECT * FROM clientes WHERE razao_social_cli = ? 
                   AND id_cliente <> ?
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
    public function cliente_editar($id_cliente)
    {

        //atualizar os dados da family
        $request = \Config\Services::request();
        $params = array(

            $request->getPost('text_razao_social'),
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
            $id_cliente
        );

        $this->query(
            "UPDATE clientes SET 
         razao_social_cli = ?,
         cnpj_cli=?,
         I_E_cli=?,
         endereco_cli=?,
         numero_cli=?,
         complemento_cli=?,
         bairro_cli=?,
         municipio_cli=?,
         UF_cli=?,
         CEP_cli=?,
         email_cli=?,
         contato_cli=?,
         telefone_cli=?,
         celular_cli=?,
         obs_cli=?
          WHERE id_cliente = ? ",
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
    public function cotacao_outroFornecedor($id_cotacao)
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
        $data = $request->getPost('select_data');
        $nova_data = $this->get_data($data);
        $nova_data2 = $nova_data[0]['data_cot'];
        $params = array(
            $request->getPost('text_escopo'),
            $nova_data2
        );

        $this->query(
            "UPDATE cotacao_escopo SET 
                escopo = ?,
                CheckList_data=?
            WHERE id_escopo = $id_escopo ",
            $params
        );
    }
    //=====================================================
    public function Cotacao_ItemCheckList_adicionar()
    {
        helper('funcoes');
        $servico = $_POST;
        $id_data =  array_pop($servico);
        $id_incript =  array_pop($servico);
        $id = aesDecrypt($id_incript);
        $id_data_array = $this->get_data($id_data);
        $id_data_object = $id_data_array[0]['data_cot'];

        $params = array(
            $id,
            $servico,
            $id_data_object
        );
        $this->query(
            "INSERT INTO 
                cotacao_escopo 
            VALUES(
                0,
                ?,
                ?,
                ?)",
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
    public function delete_cliente($id_cliente)
    {
        //eliminar o cliente
        $params = array($id_cliente);

        //deletando cliente
        $this->query(
            "DELETE FROM  clientes
          WHERE id_cliente = ? ",
            $params
        );
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
    public function check_nome_cotacao($nome_cotacao)
    {
        // verifique se existe uma cotacao com o mesmo nome
        $params = array(
            $nome_cotacao
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
        $params5 = array($request->getPost('select_parent'));
        //selecionar tudo o que foi postado
        $servico = $_POST;
        //tirar o ultimo registro que é o fornecedor
        $params =  array_pop($servico);
        //tirar o penultimo registro que é o projeto
        $params =  array_pop($servico);
        //retirar o primeiro, segundo e terceiro item do POST(id_checklist, data e hora)
        $nr_checkList = array_shift($servico);
        $cot_data = array_shift($servico);
        $cot_hora = array_shift($servico) . ":00";

        //pegando data e hora
        $params2 = array(
            $request->getPost('select_parent'),
            $request->getPost('projeto'),
            $cot_data,
            $cot_hora
        );
        // cadastrar na cotacao
        $this->query("INSERT INTO cotacao_servicos VALUES(0,?,?,'',0,'',?,? )", $params2);
        //apos cadastrar cotacao pegar todos os registros 
        $results = $this->query('SELECT * FROM cotacao_servicos WHERE id_for = ?', $params5)->getResult('array');
        //selecionar o ultimo registro
        $results5 = array_pop($results);
        $results3 = $results5['id_cot'];
        //cadastrar todos os servicos na ultima cotacao
        foreach ($servico as $t1) {
            $this->query("INSERT INTO cotacao_escopo VALUES(0,$results3,?,'$cot_data')", $t1);
        }
    }
    //=======================================================
    public function cadastrar_menor_data($hora_relacionada, $ultimo_id_cadastro)
    {
        $hora_relacionada2 = $hora_relacionada['data_cot'];
        $params = array(
            $hora_relacionada2, $ultimo_id_cadastro
        );
        $this->query("UPDATE cotacao_servicos SET cot_data = ?
                    WHERE id_cot = ? ", $params);
    }
    //=======================================================
    public function cadastrar_hora_relacionada($hora_relacionada, $ultimo_id_cadastro)
    {
        $hora_relacionada2 = $hora_relacionada['hora_cot'];

        $params = array(
            $hora_relacionada2, $ultimo_id_cadastro
        );
        $this->query("UPDATE cotacao_servicos SET cot_hora = ?
                    WHERE id_cot = ? ", $params);
    }
    //=======================================================
    public function tratar_servicos_data()
    {
        //baixar todo o post
        $post_cot_data = $_POST;

        //retirar id fornecedor e nome da cotacao
        $fornecedor = array_shift($post_cot_data);
        $cotacao = array_shift($post_cot_data);
        $id_itens = array_shift($post_cot_data);

        //----------------------------------------------------------
        // separar somente as horas de cada itens
        $novo_fornecedor_gravar = $post_cot_data;
        $tudo = -1;
        foreach ($novo_fornecedor_gravar as $t1) {
            $x[] = array_shift($novo_fornecedor_gravar) . ":00";
            $tudo = $tudo + 1;
        }
        for ($contador = 1; $contador <= $tudo; $contador += 2) {
            $hora[] = $x[$contador];
        }
        //----------------------------------------------------------
        // separar somente as datas
        $novo_fornecedor_gravar2 = $post_cot_data;
        $tudo2 = -1;
        foreach ($novo_fornecedor_gravar2 as $t2) {
            $x2[] = array_shift($novo_fornecedor_gravar2);
            $tudo2 = $tudo2 + 1;
        }
        for ($contador = 0; $contador <= $tudo2; $contador += 2) {
            $data[] = $x2[$contador];
        }
        //----------------------------------------------------------
        $params2 = array(
            $fornecedor,
            $cotacao
        );
        $params5 = array(
            $cotacao
        );

        // cadastrar na cotacao
        $this->query("INSERT INTO cotacao_servicos VALUES(0,?,?,'',0,'','','' )", $params2);
        //apos cadastrar cotacao pegar todos os registros 
        $results = $this->query('SELECT * FROM cotacao_servicos WHERE escopo = ?', $params5)->getResult('array');
        //selecionar o ultimo registro
        $results3 = $results[0]['id_cot'];

        // cadastrar todas as datas
        foreach ($data as $t1) {
            $this->query("INSERT INTO cotacao_data VALUES(0,$results3,?)", $t1);
        }
        $selecao_horas = $this->query('SELECT id_data_cot FROM cotacao_data WHERE id_cot = ?', $results3)->getResult('array');

        // cadastrar todas as horas relacionado com cada data
        $s = 0;
        foreach ($hora as $t1) {
            $selecao_horas_indice = $selecao_horas[$s];
            $selecao_horas_object = $selecao_horas_indice['id_data_cot'];
            $this->query("INSERT INTO cotacao_hora VALUES(0,$selecao_horas_object,?)", $t1);
            $s++;
        }
    }
    //=======================================================
    public function buscar_id_ultimo_cad($nome_cotacao)
    {
        $params = array($nome_cotacao);
        //retorna todas as taxas
        return $this->query("SELECT * FROM cotacao_servicos
                                      WHERE escopo = ?
        ", $params)->getResult('array');
    }

    //=======================================================
    public function tratar_servicos_continue()
    {
        $request = \Config\Services::request();
        $params5 = array($request->getPost('select_parent'));
        //selecionar tudo o que foi postado
        $servico = $_POST;


        //retirar o primeiro, segundo e terceiro item do POST(id_checklist, data e hora) 
        $nome_item = array_shift($servico);
        $id_item = array_shift($servico);
        $cot_data = array_shift($servico);
        $cot_hora = array_shift($servico) . ":00";
        //apos cadastrar cotacao pegar todos os registros 
        $results = $this->query('SELECT * FROM cotacao_servicos WHERE cot_aprovado = 0', $params5)->getResult('array');
        //selecionar o ultimo registro
        $results5 = array_pop($results);
        //selecionar o ultimo id da cotacao
        $results3 = $results5['id_cot'];
        $tirar_parent = array_pop($servico);
        $tirar_projeto1 = array_pop($servico);

        //cadastrar todos os servicos na ultima cotacao
        foreach ($servico as $t1) {
            $this->query("INSERT INTO cotacao_escopo VALUES(0,$results3,?,'$cot_data')", $t1);
        }
    }
    //=======================================================
    public function tratar_servicos_itens()
    {
        //selecionar tudo o que foi postado
        $servico = $_POST;

        $request = \Config\Services::request();
        $params5 = array($request->getPost('nome_cotacao'));

        //retirar o primeiro, segundo e terceiro item do POST(id_checklist, data e hora) 
        $id_item = array_shift($servico);
        $nome_item = array_shift($servico);
        $cot_data = array_shift($servico);
        //buscar a data escolhida------------------------------
        $params_data = array(
            $cot_data
        );
        $cot_data2 = $this->query('SELECT data_cot 
                                 FROM cotacao_data 
                                 WHERE id_data_cot = ?', $params_data)->getResult('array');

        $cot_data3 = $cot_data2[0]['data_cot'];
        //-----------------------------------------------------
        //apos cadastrar cotacao pegar todos os registros 
        $results = $this->query('SELECT * FROM cotacao_servicos WHERE escopo = ?', $params5)->getResult('array');


        //selecionar o ultimo registro
        $results5 = $results[0]['id_cot'];

        //selecionar o ultimo id da cotacao
        $tirar_parent = array_pop($servico);
        $tirar_projeto1 = array_pop($servico);
        $tirar_id_cot = array_pop($servico);

        // cadastrar todos os servicos na ultima cotacao
        foreach ($servico as $t1) {
            $this->query("INSERT INTO cotacao_escopo VALUES(0,$results5,?,'$cot_data3')", $t1);
        }
    }
    //=======================================================
    public function cotacao_novoFornecedor()
    {
        //pegar todo o post
        $novo_fornecedor = $_POST;
        //pegar o primeiro item do array
        $fornecedor =  array_shift($novo_fornecedor);
        //pegar o segundo item do array
        $escopo =  array_shift($novo_fornecedor);
        $cot_data = array_shift($novo_fornecedor);
        $cot_hora = array_shift($novo_fornecedor) . ":00";
        $id_cot_agora = array_shift($novo_fornecedor);

        $Get_datas = $this->get_datas($id_cot_agora);
        //pegar todos os itens atraves do id_cot
        $id_cot_novo =  $this->get_all_itens_novo($id_cot_agora);
        //tirar o 3o  item do array
        $tirarFamilia =  array_shift($novo_fornecedor);
        // apos separar itens do post inserir na cotacao_servicos
        $params = array($fornecedor, $escopo, $cot_data, $cot_hora);
        $this->query("INSERT INTO cotacao_servicos VALUES(0,?,?,'',0,'',?,? )", $params);
        //apos cadastrar cotacao pegar todos os registros
        $params_buscar = array($fornecedor, $escopo);
        $results = $this->query('SELECT * FROM cotacao_servicos WHERE id_for = ? AND escopo = ?', $params_buscar)->getResult('array');
        // selecionar o ultimo registro    
        $results2 = array_pop($results);
        // pegar o id do ultimo servico cadastrado
        $results3 = $results2['id_cot'];
        //Separar  em 2 variaveis(Data e nome do item) todos os itens
        foreach ($id_cot_novo as $novo1) {
            $datax1[] = array_pop($novo1);
            $itemx1[] = array_pop($novo1);
        }
        // Cadastrar todos os itens usando o mesmo  id_cot para todos
        foreach ($itemx1 as $novo1) {
            $this->query("INSERT INTO cotacao_escopo 
            VALUES(0, $results3,?,'')", $novo1);
        }
        //Cadastrar as datas
        foreach ($Get_datas as $novo2) {
            $this->query("INSERT INTO  cotacao_data 
            VALUES(0, $results3,?)", $novo2['data_cot']);
        }

        // esse id data novo
        $get_hora_p_outro_for =  $this->get_hora_p_outro_forn($results3);
        $get_hora_copia = $this->get_hora_copia($id_cot_agora);
        $get_all_horas = $this->get_all_horas($get_hora_copia);

        $s = 0;
        //Cadastrar as datas
        foreach ($get_all_horas as $novo3) {
            $testex = $get_hora_p_outro_for[$s]['id_data_cot'];
            $testexx[] = $testex;
            $testexxx = $testexx[$s];

            $this->query("INSERT INTO  cotacao_hora 
            VALUES(0, $testexxx,?)", $novo3);
            $s++;
        }
        //apos cadastrar selecionar todos os registros pegar o primeiro id_escopo 
        $id_cot_novoddd =  $this->get_all_itens_novo($results3);
        $ultimoId_real = array_shift($id_cot_novoddd);
        $contador_maisID = $ultimoId_real['id_escopo'];
        //utilizando o primeiro id_escopo fazer updadate para inserir as  datas 
        foreach ($datax1 as $data_final1) {
            $this->query("UPDATE cotacao_escopo SET CheckList_data = ?
                    WHERE id_escopo = $contador_maisID ", $data_final1);
            $contador_maisID = $contador_maisID + 1;
        }
    }
    //=======================================================
    public function get_all_itens_novo($id_cot_novo)
    {
        $params = array($id_cot_novo);
        //retorna todas as taxas
        return $this->query("SELECT * FROM cotacao_escopo
                                      WHERE id_cot = ?
        ", $params)->getResult('array');
    }
    //=======================================================
    public function acrescentar_data($id_cotacao)
    {
        $request = \Config\Services::request();
        $nova_data = $_POST;
        $nova_hora = array_pop($nova_data);
        $params = array(
            $id_cotacao,
            $nova_data
        );
        $params2 = array(
            $id_cotacao,
            $nova_hora
        );
        $this->query("INSERT INTO  cotacao_data 
            VALUES(0,?,?)", $params);

        $params_novadata = array(
            $id_cotacao, $nova_data
        );
        $ultimo_id = $this->query("SELECT id_data_cot FROM cotacao_data
            WHERE id_cot = ?
            AND data_cot = ?
        ", $params_novadata)->getResult('array');
        $params5 = array(
            // $id_cotacao,
            $nova_hora
        );
        $ultimoID = $ultimo_id[0]['id_data_cot'];
        $this->query("INSERT INTO  cotacao_hora 
             VALUES(0,$ultimoID,?)", $params5);
    }

    //=======================================================
    public function verificar_data_hora($id_cotacao)
    {
        $request = \Config\Services::request();
        $nova_data = $_POST;
        $nova_hora = array_pop($nova_data);
        $params = array(
            $id_cotacao,
            $nova_data
        );
        $params2 = array(
            $id_cotacao,
            $nova_hora
        );
        $params = $params[1]['input_Data'];

        $results = $this->query(
            "SELECT * FROM cotacao_data WHERE data_cot = ?",
            $params
        )->getResult('array');

        if (count($results) != 0) {
            return true;
        } else {
            return false;
        }
    }
    //=======================================================



    public function remover_data($id_cotacao, $data_guardar)
    {
        $data_guardar  = $data_guardar[0]["data_cot"];
        $params = array(
            $id_cotacao,  $data_guardar
        );

        // Apaga as datas dos  itens da cotacao
        $nulo = 0000 - 00 - 00;
        $this->query(
            "UPDATE cotacao_escopo
         SET CheckList_data = $nulo
          WHERE id_cot = ?
          AND CheckList_data = ?",
            $params
        );

        //apaga a data da cotacao
        $this->query(
            "DELETE FROM  cotacao_data
          WHERE id_cot = ? 
          AND data_cot =?",
            $params
        );
    }
    //=======================================================
    public function verificar_data($id_cotacao)
    {

        // verifique se existe uma cotacao com o mesmo nome
        $params = array(
            $id_cotacao
        );

        $results = $this->query(
            "SELECT * FROM cotacao_data 
             WHERE id_cot = ?",
            $params
        )->getResult('array');
        if (count($results) > 1) {
            return true;
        } else {
            return false;
        }
    }

    //=======================================================
    public function get_all_datas_cadastras($id_cot_novo)
    {
        $params = array($id_cot_novo);
        //retorna todas as datas
        return $this->query(
            "SELECT * FROM cotacao_data
             WHERE id_cot = ?
            ",
            $params
        )->getResult('array');
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
        $params = array($id_tax);
        $results = $this->query('SELECT * FROM stock_taxas WHERE id_taxas =?', $params)->getResult('array');
        if (count($results) == 1) {
            return $results[0];
        } else {
            return array();
        }
    }
    //=====================================================
    public function check_novoFornecedor()
    {
        $novo_fornecedor = $_POST;
        //pegar o primeiro item do array
        $fornecedor =  array_shift($novo_fornecedor);
        //pegar o segundo item do array
        $escopo =  array_shift($novo_fornecedor);

        $params = array($fornecedor, $escopo);

        $results = $this->query(
            "SELECT * FROM cotacao_servicos WHERE id_for = ?
        AND escopo =?",
            $params
        )->getResult('array');

        if (count($results) != 0) {
            return true;
        } else {
            return false;
        }
    }
    //=====================================================
    public function check_ItemCheckList_adicionar()
    {
        helper('funcoes');
        $servico = $_POST;

        $servico2 = array_shift($servico);
        $id_incript =  array_shift($servico);
        $id = aesDecrypt($id_incript);
        $params = array($id, $servico2);
        $results = $this->query(
            "SELECT * FROM cotacao_escopo WHERE id_cot = ?
        AND escopo =?",
            $params
        )->getResult('array');
        if (count($results) != 0) {
            return true;
        } else {
            return false;
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
    public function itemCheck_edit($id_item)
    {
        //atualizar os dados da family
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('text_designacao'),
            $id_item
        );

        $this->query(
            "UPDATE check_list
         SET check_list = ?
          WHERE id_checklist = ? ",
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
    public function delete_item_escopo($id_item)
    {
        //eliminar a taxa e alterar o id nos produtos
        $params = array(
            $id_item
        );
        //deletendo a taxa 
        $this->query(
            "DELETE FROM  cotacao_escopo
          WHERE id_escopo = ? ",
            $params
        );
    }
    //=====================================================
    public function delete_itemCheckList($id_itemCheck)
    {
        //eliminar a taxa e alterar o id nos produtos
        $params = array(
            $id_itemCheck
        );
        //deletendo a taxa 
        $this->query(
            "DELETE FROM  check_list
          WHERE id_checklist = ? ",
            $params
        );
    }
    //=====================================================
    public function delete_CheckList($id_itemCheck)
    {
        //eliminar a taxa e alterar o id nos produtos
        $params = array(
            $id_itemCheck
        );
        //deletendo a taxa 
        $this->query(
            "DELETE FROM  servicos
          WHERE id_servico = ? ",
            $params
        );
    }
    //=====================================================
    public function delete_itensCheckList($id_itemCheck)
    {
        //eliminar a taxa e alterar o id nos produtos
        $params = array(
            $id_itemCheck
        );
        //deletendo a taxa 
        $this->query(
            "DELETE FROM  check_list
          WHERE id_servico = ? ",
            $params
        );
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
    public function delete_data_hora_cotacao($ids_cotacao)
    {
        foreach ($ids_cotacao as $d1) {
            $this->query(
                "DELETE FROM  cotacao_data
              WHERE id_data_cot = ? ",
                $d1['id_data_cot']
            );
            $this->query(
                "DELETE FROM  cotacao_hora
              WHERE id_data_cot = ? ",
                $d1['id_data_cot']
            );
            
        }
        
        
    }
    //====================================================
    public function delete_Itens_cotacao($id_cotacao)
    {
        //eliminar a taxa e alterar o id nos produtos
        $params = array(
            $id_cotacao
        );
        //deletendo a taxa 
        $this->query(
            "DELETE FROM  cotacao_escopo
          WHERE id_cot = ? ",
            $params
        );
    }
    //=====================================================
    public function delete_clientes_cotacao($id_cotacao)
    {
        //eliminar a taxa e alterar o id nos produtos
        $params = array(
            $id_cotacao
        );
        //deletendo a taxa 
        $this->query(
            "DELETE FROM  cotacao_cliente
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
    public function checkExistingItemCheck()
    {
        //verifica se ja existe um produto com o mesmo nome
        $request = \Config\Services::request();
        $dados = $request->getPost();
        $params = array(
            $dados['text_novoItemCheckList'],
            $dados['id_servico']

        );

        $results = $this->query(
            "SELECT check_list FROM check_list WHERE check_list = ? 
             AND id_servico = ?      ",
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
    public function cliente_check()
    {
        // verifica se já existe um usuário com o mesmo Nome de Usuário ou Endereço de Email
        $request = \Config\Services::request();
        $dados = $request->getPost();

        $params = array(
            $dados['text_razao_social_cli']
        );
        return $this->db->query("SELECT id_cliente FROM clientes WHERE razao_social_cli = ? ", $params)->getResult('array');
    }

    //=====================================================
    public function itemCheck_add()
    {
        $request = \Config\Services::request();
        $dados = $request->getPost();
        $params = array(
            $dados['id_servico'],
            $dados['text_novoItemCheckList']
        );
        $this->query("INSERT INTO check_list VALUES(0,?,? )", $params);
    }
    //=====================================================
    public function insert_cliente_cotacao($id_cliente)
    {
        $request = \Config\Services::request();
        $id_cot = $request->getPost('id_cot');
        $params = array(
            $id_cot,
            $id_cliente
        );
        $this->query("INSERT INTO cotacao_cliente VALUES(0,?,? )", $params);
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
    public function cnpj_check_cli()
    {
        //verifica se ja existe um fornecedor com o mesmo cnpj
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('text_cnpj_cli')
        );

        $results = $this->query(
            "SELECT cnpj_cli FROM clientes WHERE cnpj_cli = ? 
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
    public function checkExistingEmail_cli()
    {
        // verifica se já existe um usuário com o mesmo Nome de Usuário ou Endereço de Email
        $request = \Config\Services::request();
        $dados = $request->getPost();

        $params = array(
            // $dados['text_name'],
            $dados['text_email_cli']
        );
        return $this->db->query("SELECT id_cliente FROM clientes WHERE  email_cli = ?", $params)->getResult('array');
    }
    //==========================================

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
    public function cliente_add()
    {

        //adiciona uma novo produto  na BD
        $request = \Config\Services::request();
        $params = array(
            $request->getPost('text_razao_social_cli'),
            $request->getPost('text_cnpj_cli'),
            $request->getPost('text_ie_cli'),
            $request->getPost('text_endereco_cli'),
            $request->getPost('text_numero_cli'),
            $request->getPost('text_complemento_cli'),
            $request->getPost('text_bairro_cli'),
            $request->getPost('text_municipio_cli'),
            $request->getPost('text_uf_cli'),
            $request->getPost('text_cep_cli'),
            $request->getPost('text_email_cli'),
            $request->getPost('text_contato_cli'),
            $request->getPost('text_telefone_cli'),
            $request->getPost('text_celular_cli'),
            $request->getPost('text_obs_cli'),

        );
        $this->query(
            "INSERT INTO clientes 
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
    public function get_id_cot($id)
    {
        // retorna o especifico produto
        $params = array(
            $id
        );
        return $this->query(
            "SELECT id_cot FROM cotacao_escopo
             WHERE id_escopo = ?",
            $params

        )->getResult('array')[0];
    }
    //=====================================================
    public function get_id_cot2($id)
    {
        // retorna o especifico produto
        $params = array(
            $id
        );
        $params2 = array(
            $params[0]
        );
        return $this->query(
            "SELECT id_cot FROM cotacao_escopo
             WHERE id_escopo = ?",
            $params


        )->getResult('array');
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
    public function get_all_clientes()
    {
        //busca todos as familias de  servicos atraves do id_familia_servicos
        return $this->query(
            "SELECT 
                c.id_cliente,
                c.razao_social_cli,
                c.municipio_cli,
                u.UF AS estado
            FROM    
                clientes c
            LEFT JOIN 
                relacao_uf u 
            ON 
            c.UF_cli = u.id_uf  
        "
        )->getResult('array');
    }
    //=======================================================
    public function escopo_por_cotacao($id_escopo)
    {
        $params = array($id_escopo);

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
    public function get_item_data_cadastrada($id_escopo)
    {
        $params = array($id_escopo);
        return $this->query(
            'SELECT CheckList_data 
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
        //busca todas as cotacoes com pendencia de fornecedor
        return $this->query("SELECT 
         c.id_cot, 
         c.escopo,
         c.detalhes,
         c.cot_data,
         c.cot_hora,
         f.razao_social AS razaoSocial
         FROM cotacao_servicos c
         LEFT JOIN 
             fornecedores f 
         ON 
             c.id_for = f.id_for
         Where c.cot_aprovado = 0 AND c.id_for <> 0
         ")->getResult('array');
    }
    //=====================================================
    public function cotacoes_semFornecedor()
    {
        //busca todas as cotacoes com pendencia de fornecedor
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
         Where c.cot_aprovado = 0 AND c.id_for = 0
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
    public function get_all_cotacoes_fornecedor($params)
    {
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
    public function get_all_cotacoes_fornecedor_aprovadas($params)
    {
        
        
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
        )->getResult('array');
    }
}
//=====================================================
