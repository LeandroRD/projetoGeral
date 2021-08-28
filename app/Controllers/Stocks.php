<?php

namespace App\Controllers;

use App\Models\StocksModel;
use App\Models\UsersModel;
use CodeIgniter\Controller;

class Stocks extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }
    //========================================================
    public function index()
    {
        echo view('stocks/main');
    }
    //========================================================
    //FAMILIA
    //========================================================
    public function familia_adicionar()
    {
        //adicionar nova familia
        // carregar os dados das familias para passar a View
        $model = new StocksModel();
        $data['familias'] = $model->get_all_families();
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();

            //confirmar se ja existe a familia com o mesmo nome
            $resultado = $model->check_family($request->getPost('text_designacao'));
            if ($resultado) {
                $error = 'Já existe uma família com a mesma desigção!!';
            }
            //guardar na base de dados e trata erro
            if ($error == '') {
                $model->family_add();
                $data['success'] = "Familia adicionada com sucesso";
                //para atualizar a lista de familias
                $data['familias'] = $model->get_all_families();
            } else {
                $data['error'] = $error;
            }
        }
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/familias_adicionar', $data);
    }
    //========================================================
    public function cotacao_adicionar()
    {
        $model = new StocksModel();
        $data['fornecedores'] = $model->get_all_fornecedores();
        $data['all_servicos'] = $model->get_all_servicos();
        $error = '';
        $data['all_escopo'] = array();
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/cotacao_adicionar', $data);
    }
    //========================================================
    public function cotacao_adicionar2()
    {
        $model = new StocksModel();
        $data['fornecedores'] = $model->get_all_fornecedores();
        $data['all_servicos'] = $model->get_all_servicos();
        $data['get_checkList'] = "por get aqui";
        $error = '';
        $data['all_escopo'] = array();
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        
        echo view('stocks/cotacao_adicionar2', $data);
    }
      
    //========================================================
    public function checkLists($delete=0)
    {
        if($delete==1){
            $data['success'] = "Check list eliminado com Sucesso!!";
        }
        $model = new StocksModel();
        $data['checklists'] = $model->get_all_checklists();

        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/checklists', $data);
    }

    //========================================================
    public function checkLists_editar($id_check)
    {
        helper('funcoes');
        $id_check = aesDecrypt($id_check);
        if ($id_check == -1) {
            return;
        }
        $model = new StocksModel();
        $data['checklists_editar'] = $model->get_checklists_editar($id_check);
        $data['get_checkList'] = $model->get_checkList($id_check);
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }

        echo view('stocks/checklists_editar', $data);
    }

    //========================================================
    public function cotacao_adicionar_novo($id_check)
    {
        helper('funcoes');
        $id_check = aesDecrypt($id_check);
        if ($id_check == -1) {
            return;
        }
        $model = new StocksModel();
        $data['all_servicos'] = $model->get_checklists_editar($id_check);
        $data['fornecedores'] = $model->get_all_fornecedores();
        $data['get_checkList'] = $model->get_checkList($id_check);
        $error = '';
        $data['all_escopo'] = array();
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }


        echo view('stocks/cotacao_adicionar', $data);
    }
    //========================================================
    public function checkList_adicionar()
    {
        //adicionar nova familia
        // carregar os dados das familias para passar a View
        $model = new StocksModel();
        $data['fornecedores'] = $model->get_all_fornecedores();
        $data['all_servicos'] = $model->get_all_servicos();
        $error = '';
        $data['all_escopo'] = array();
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/checkList_adicionar', $data);
    }
    //========================================================
    public function cotacao_adicionar_servico($servicos)
    {
        $model = new StocksModel();
        $data['fornecedores'] = $model->get_all_fornecedores();
        $model->servicos_add($servicos);
        $data['all_servicos'] = $model->get_all_servicos();
        $data['all_escopo'] = $model->get_all_escopo();


        echo view('stocks/cotacao_adicionar', $data);
    }
    //========================================================    
    public function familia_adicionar_servicos()
    {
        //adicionar nova familia
        // carregar os dados das familias para passar a View
        $model = new StocksModel();
        $data['familias'] = $model->get_all_families_servicos();
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();
            //confirmar se ja existe a familia com o mesmo nome
            $resultado = $model->check_family_servicos($request->getPost('text_designacao'));
            if ($resultado) {
                $error = 'Já existe uma família com a mesma desigção!!';
            }

            //guardar na base de dados e trata erro
            if ($error == '') {
                $model->family_add_servicos();
                $data['success'] = "Familia adicionada com sucesso";
                //para atualizar a lista de familias
                $data['familias'] = $model->get_all_families_servicos();
            } else {
                $data['error'] = $error;
            }
        }

        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }

        echo view('stocks/familias_adicionar_servicos', $data);
    }
    //========================================================
    public function familia_editar($id_familia)
    {
        helper('funcoes');
        $id_familia = aesDecrypt($id_familia);
        if ($id_familia == -1) {
            return;
        }
        // carregar os dados das familias para passar a View
        $model = new StocksModel();
        $data['familias'] = $model->get_all_families();
        $data['familia'] = $model->get_family($id_familia);
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();

            //confirmar se ja existe a familia com o mesmo nome
            $resultado = $model->check_other_family($request->getPost('text_designacao'), $id_familia);
            if ($resultado) {
                $error = 'Já existe outra família com a mesma desigção!!';
            }
            //atualizar os dados da familia na BD 
            if ($error == '') {
                $model->family_edit($id_familia);
                $data['success'] = "Familia atualizada com sucesso !!";
                //redirecionamento para stock/familias
                return redirect()->to(site_url('stocks/familias'));
            } else {
                $data['error'] = $error;
            }
        }
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/familias_editar', $data);
    }
    //========================================================
    public function fornecedor_editar($id_fornecedor)
    {
        helper('funcoes');
        $id_fornecedor = aesDecrypt($id_fornecedor);

        if ($id_fornecedor == -1) {
            return;
        }
        // carregar os dados dos fornecedores para passar a View
        $model = new StocksModel();
        $data['fornecedores'] = $model->get_all_fornecedores();
        $data['fornecedor'] = $model->get_fornecedor($id_fornecedor);
        $data['familia_servicos'] = $model->get_all_families_servicos();
        //carregar estados
        $data['select_uf'] = $model->get_all_estados();
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();

            //confirmar se ja existe outro fornecedor com o mesmo nome
            $resultado = $model->check_other_razao_social($request->getPost('text_razao_social'), $id_fornecedor);
            if ($resultado) {
                $error = 'Já existe outro fornecedor com a mesma razão social!!';
            }
            //confirmar se ja existe outro fornecedor com o cnpj
            if ($error == '') {
                $resultado = $model->check_other_cnpj($request->getPost('text_cnpj'), $id_fornecedor);
                if ($resultado) {
                    $error = 'Já existe outro fornecedor com o mesmo CNPJ!!';
                }
            }
            //atualizar os dados da familia na BD 
            if ($error == '') {
                $model->fornecedor_editar($id_fornecedor);
                $data['success'] = "Familia atualizada com sucesso !!";
                //redirecionamento para stock/familias
                return redirect()->to(site_url('stocks/fornecedores'));
            } else {
                $data['error'] = $error;
            }
        }
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/fornecedores_editar', $data);
    }

    //========================================================
    public function cotacao_editar($id_cotacao)
    {
        helper('funcoes');
        $id_cotacao = aesDecrypt($id_cotacao);
        if ($id_cotacao == -1) {
            return;
        }
        // carregar os dados das familias para passar a View
        $model = new StocksModel();
        $data['cotacoes'] = $model->get_all_cotacoes();
        $data['cotacao'] = $model->get_cotacao($id_cotacao);
        $data['fornecedores'] = $model->get_all_fornecedores();
        $data['escopo_por_cotacao'] = $model->escopo_por_cotacao($id_cotacao);
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();
            //atualizar os dados da familia na BD 
            if ($error == '') {
                $model->cotacao_editar($id_cotacao);
                $data['success'] = "Cotação atualizada com sucesso !!";
                return redirect()->to(site_url('stocks/cotacoes'));
            } else {
                $data['error'] = $error;
            }
        }
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/cotacao_editar', $data);
    }
    //========================================================
    public function itemCheck_editar($id_item, $item2)
    {
        helper('funcoes');
        $model = new StocksModel();
        $data['itemCheck'] = $model->get_itemCheck($id_item, $item2);
        
        //confirmar tipo de usuario
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/itemCheck_editar', $data);
    }
    //========================================================
    public function cotacao_editar2($id_cotacao)
    {
        // carregar os dados das familias para passar a View
        $model = new StocksModel();
        $data['cotacoes'] = $model->get_all_cotacoes();
        $data['cotacao'] = $model->get_cotacao($id_cotacao);
        $data['fornecedores'] = $model->get_all_fornecedores();
        $data['escopo_por_cotacao'] = $model->escopo_por_cotacao($id_cotacao);
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();
            //atualizar os dados da familia na BD 
            if ($error == '') {
                $model->cotacao_editar($id_cotacao);
                $data['success'] = "Cotação atualizada com sucesso !!";
                return redirect()->to(site_url('stocks/cotacoes'));
            } else {
                $data['error'] = $error;
            }
        }
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/cotacao_editar', $data);
    }

    //========================================================
    public function escopo_editar($id_escopo)
    {
        helper('funcoes');
        $id_escopo = aesDecrypt($id_escopo);
        $model = new StocksModel();
        //pega os dados do escopo
        $data['escopo'] = $model->get_escopo($id_escopo);
        $error = '';
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/escopo_editar', $data);
    }
    //========================================================
    public function escopo_editar2($id_escopo)
    {
        if (isset($_GET['v'])) {
            global $acao;
            $acao = $_GET['v'];
        }
        $model = new StocksModel();
        $data['escopo'] = $model->get_escopo($id_escopo);
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $request = \Config\Services::request();
            if ($error == '') {
                $model->escopo_editar($id_escopo);
                $data['success'] = "Cotação atualizada com sucesso !!";
                return redirect()->to(site_url('stocks/cotacao_editar2/' . $acao));
            } else {
                $data['error'] = $error;
            }
        }
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/escopo_editar', $data);
    }
    //========================================================
    public function cotacao_editar_aprovada($id_cotacao)
    {
        helper('funcoes');
        $id_cotacao = aesDecrypt($id_cotacao);

        if ($id_cotacao == -1) {
            return;
        }
        // carregar os dados das familias para passar a View
        $model = new StocksModel();
        $data['cotacoes'] = $model->get_all_cotacoes();
        $data['cotacao'] = $model->get_cotacao($id_cotacao);
        $data['fornecedores'] = $model->get_all_fornecedores();
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();
            //atualizar os dados da familia na BD 
            if ($error == '') {
                $model->cotacao_editar($id_cotacao);
                $data['success'] = "Cotação atualizada com sucesso !!";
                return redirect()->to(site_url('stocks/cotacoes'));
            } else {
                $data['error'] = $error;
            }
        }
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/cotacao_editar_aprovada', $data);
    }
    //========================================================
    public function tratar_servicos()
    {
        $error = '';
        $model = new StocksModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //adicionar o servico
            $novo_checkList = $_POST;
            $baixar =  array_pop($novo_checkList);
            $baixar =  array_pop($novo_checkList);
            $data['all_servicos'] = $novo_checkList;
            //confirmar se ja existe uma cotacao com o mesmo nome
            $request = \Config\Services::request();
            $resultado = $model->check_cotacao($request->getPost('projeto'));
            if ($resultado) {
                $error = 'Já existe uma Cotação com a mesma desigção!!';
            }            
            if ($error == '') {
                $model->tratar_servicos();
                $data['sucess'] = "Cotação adicionada com Sucesso";
            } else {
                $data['error'] = $error;
            }
            $data['fornecedores'] = $model->get_all_fornecedores();
            $data['cotacoes'] = $model->get_all_cotacoes();
        }
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/cotacoes', $data);
    }
    //========================================================
    public function tratar_servicos2()
    {
        $error = '';
        $model = new StocksModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //confirmar se ja existe um checklist com o mesmo nome
            $request = \Config\Services::request();

            //confirmar se ja existe um check list com o mesmo nome
            $resultado = $model->check_checkList($request->getPost('checkLista'));
            if ($resultado) {
                $error = 'Já existe um checkList com a mesma desigção!!';
            }

            if ($error == '') {
                //adicionar o servico
                $model->tratar_servicos2();
                $data['success'] = "Check List adicionado com Sucesso";
            } else {
                $data['error'] = $error;
            }
            $data['fornecedores'] = $model->get_all_fornecedores();
            $data['all_servicos'] = $model->get_all_servicos();
        }
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/checkList_adicionar', $data);
    }
    //========================================================
    public function cotacao_editar_fornecedor($id_cotacao)
    {
        helper('funcoes');
        $id_cotacao = aesDecrypt($id_cotacao);

        if ($id_cotacao == -1) {
            return;
        }
        // carregar os dados das familias para passar a View
        $model = new StocksModel();
        $data['cotacoes'] = $model->get_all_cotacoes();
        $data['cotacao'] = $model->get_cotacao($id_cotacao);
        $data['escopo_por_cotacao'] = $model->escopo_por_cotacao($id_cotacao);
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();
            //atualizar os dados da familia na BD 
            if ($error == '') {
                $model->cotacao_editar_fornecedor($id_cotacao);
                $data['success'] = "Cotação atualizada com sucesso !!";
                return redirect()->to(site_url('stocks/cotacoes_fornecedor'));
            } else {
                $data['error'] = $error;
            }
        }
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/cotacao_editar_fornecedor', $data);
    }
    //========================================================
    public function cotacao_editar_fornecedor_aprovada($id_cotacao)
    {
        helper('funcoes');
        $id_cotacao = aesDecrypt($id_cotacao);

        if ($id_cotacao == -1) {
            return;
        }
        // carregar os dados das familias para passar a View
        $model = new StocksModel();
        $data['cotacoes'] = $model->get_all_cotacoes();
        $data['cotacao'] = $model->get_cotacao($id_cotacao);
        // $data['fornecedores']=$model->get_all_fornecedores();
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();
            //atualizar os dados da familia na BD 
            if ($error == '') {
                $model->cotacao_editar_fornecedor_aprovada($id_cotacao);
                $data['success'] = "Cotação atualizada com sucesso !!";
                return redirect()->to(site_url('stocks/cotacoes_fornecedor_aprovadas'));
            } else {
                $data['error'] = $error;
            }
        }
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/cotacao_editar_fornecedor_aprovada', $data);
    }

    //========================================================

    public function familia_editar_servicos($id_familia)
    {
        helper('funcoes');
        $id_familia = aesDecrypt($id_familia);
        if ($id_familia == -1) {
            return;
        }
        // carregar os dados das familias para passar a View
        $model = new StocksModel();
        $data['familias'] = $model->get_all_families_servicos();
        $data['familia'] = $model->get_family_servicos($id_familia);
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();
            // confirmar se ja existe a familia com o mesmo nome
            $resultado = $model->check_other_family_servicos($request->getPost('text_designacao'), $id_familia);
            if ($resultado) {
                $error = 'Já existe outra família com a mesma desigção!!';
            }
            // atualizar os dados da familia na BD 
            if ($error == '') {
                $model->family_edit_servicos($id_familia);
                $data['success'] = "Familia atualizada com sucesso !!";
                //redirecionamento para stock/familias_servicos
                return redirect()->to(site_url('stocks/familias_servicos'));;
            } else {
                $data['error'] = $error;
            }
        }
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }

        echo view('stocks/familias_servicos_editar', $data);
    }
    //========================================================
    public function familia_editar_servicos_confirmar($id_familia)
    {

        $data = array();
        $data['familia'] = $id_familia;

        echo view('stocks/familia_editar_servicos_confirmar', $data);
    }

    //========================================================
    public function familia_editar_confirmar($id_familia)
    {

        $data = array();
        $data['familia'] = $id_familia;

        echo view('stocks/familia_editar_confirmar', $data);
    }

    //========================================================
    public function familia_servicos_editar($id_familia)
    {
        helper('funcoes');
        $id_familia = aesDecrypt($id_familia);
        if ($id_familia == -1) {
            return;
        }

        //editar familia
        // carregar os dados das familias para passar a View
        $model = new StocksModel();
        $data['familias'] = $model->get_all_families_servicos();
        $data['familia'] = $model->get_family_servicos($id_familia);
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();
            if ($error == '') {
                $model->family_edit_servicos($id_familia);
                $data['success'] = "Familia atualizada com sucesso !!";
                //redirecionamento para stock/familias
                return redirect()->to(site_url('stocks/familias'));
            } else {
                $data['error'] = $error;
            }
        }

        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/familias_servicos_editar', $data);
    }

    //========================================================
    public function familia_eliminar($id_familia, $resposta = 'nao')
    {
        helper('funcoes');
        $id_familia = aesDecrypt($id_familia);
        if ($id_familia == -1) {
            return;
        }
        $model = new StocksModel();
        $data['familia'] = $model->get_family($id_familia);

        if ($resposta == 'sim') {
            //Eliminacao da familia
            $model->delete_family($id_familia);
            //redirecionamento para stock/familias
            return redirect()->to(site_url('stocks/familias'));
        }

        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/familias_eliminar', $data);
    }
    //========================================================
    public function familia_eliminar_servicos($id_familia_servicos, $resposta = 'nao')
    {
        helper('funcoes');
        $id_familia_servicos = aesDecrypt($id_familia_servicos);
        if ($id_familia_servicos == -1) {
            return;
        }
        $model = new StocksModel();
        $data['familia_servicos'] = $model->get_family_servicos($id_familia_servicos);

        if ($resposta == 'sim') {
            //Eliminacao da familia
            $model->delete_family_servicos($id_familia_servicos);
            //redirecionamento para stock/familias
            return redirect()->to(site_url('stocks/familias_servicos'));
        }

        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/familias_eliminar_servicos', $data);
    }

    //========================================================
    public function fornecedor_eliminar($id_fornecedor, $resposta = 'nao')
    {
        helper('funcoes');
        $id_fornecedor = aesDecrypt($id_fornecedor);
        if ($id_fornecedor == -1) {
            return;
        }
        $model = new StocksModel();
        $data['fornecedor'] = $model->get_fornecedor($id_fornecedor);

        if ($resposta == 'sim') {
            //Eliminacao da familia
            $model->delete_fornecedor($id_fornecedor);
            //redirecionamento para stock/familias
            return redirect()->to(site_url('stocks/fornecedores'));
        }

        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/fornecedor_eliminar', $data);
    }
    //========================================================
    public function familias()
    {
        //carregar os dados da familias para passar a View
        $model = new StocksModel();
        $data['familias'] = $model->get_all_families();
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/familias', $data);
    }
    //========================================================
    public function cotacoes()
    {
        //carregar os dados da familias para passar a View
        $model = new StocksModel();
        $data['cotacoes'] = $model->get_all_cotacoes();
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/cotacoes', $data);
    }
    //========================================================
    public function cotacoes_semFornecedor()
    {
        //carregar os dados da familias para passar a View
        $model = new StocksModel();
        $data['cotacoes'] = $model->cotacoes_semFornecedor();
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/cotacoes_semFornecedor', $data);
    }
    //========================================================
    public function acompanhamento_servicos()
    {
        //carregar os dados da familias para passar a View
        $model = new StocksModel();
        $data['cotacoes'] = $model->get_all_cotacoes_aprovadas();
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/acompanhamento_servicos', $data);
    }

    //========================================================
    public function cotacoes_fornecedor()
    {
        $model = new StocksModel();
        $s = session();
        $user = $s->name;
        //buscar o id de fornecedor
        $id_fornecedor = $model->get_id_fornecedor($user);
        $data['cotacoes'] = $model->get_all_cotacoes_fornecedor($id_fornecedor);
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/cotacoes_fornecedor', $data);
    }
    //========================================================
    public function cotacoes_fornecedor_aprovadas()
    {
        $model = new StocksModel();
        $s = session();
        $user = $s->name;
        //buscar o id de fornecedor
        $id_fornecedor = $model->get_id_fornecedor($user);
        $data['cotacoes'] = $model->get_all_cotacoes_fornecedor_aprovadas($id_fornecedor);
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/cotacoes_fornecedor_aprovadas', $data);
    }
    //========================================================
    public function familias_servicos()
    {
        //carregar os dados da familias para passar a View
        $model = new StocksModel();
        $data['familias'] = $model->get_all_families_servicos();
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/familias_servicos', $data);
    }
    //========================================================
    public function movimentos()
    {
        //vai buscar todos os movimentos de stock_movimentos
        $model = new StocksModel();
        $data['movimentos'] = $model->get_movimento();
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }

        echo view('stocks/movimentos', $data);
    }
    //========================================================
    //TAXAS
    //========================================================
    public function taxas()
    {
        //carregar os dados das taxas para passar a View
        $model = new StocksModel();
        $data['taxas'] = $model->get_all_taxes();
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }

        echo view('stocks/taxas', $data);
    }
    //========================================================
    public function taxas_adicionar()
    {
        $error = '';
        $model = new StocksModel();
        //Data = array vazio
        $data = array();
        //adicionar nova taxa
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();

            //confirmar se ja existe a taxa com o mesmo nome
            $resultado = $model->check_tax($request->getPost('text_designacao'));
            if ($resultado) {
                $error = 'Já existe uma taxa com a mesma desigção!!';
            }
            //guardar a nova taxa na base de dados e trata erro
            if ($error == '') {
                $model->tax_add();
                $data['success'] = "Taxa adicionada com sucesso";
            } else {
                $data['error'] = $error;
            }
        }
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/taxas_adicionar', $data);
    }
    //========================================================
    public function itemCheck_editarConfirmar($id_checklist)
    {
        helper('funcoes');
        $model = new StocksModel();
        $error = '';
        //confirmar se ja existe item de check list igual 
        $resultado = $model->check_itemCheck($id_checklist);

        if ($resultado) {
            $error = 'Já existe um item de check-List com os mesmos Dados!!';
        }

        if ($error == '') {
            $model->itemCheck_edit($id_checklist);
        }

        $request = \Config\Services::request();
        $id_item_check = $request->getPost('id_servico');
        $model = new StocksModel();
        $data['checklists_editar'] = $model->get_checklists_editar($id_item_check);
        $data['get_checkList'] = $model->get_checkList($id_item_check);

        // verificar tipo de profile
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        if ($error == '') {
            $data['success'] = "Feito as alterações com sucesso!!";
        } else {
            $data['error']  =  $error;
        }
        echo view('stocks/checklists_editar', $data);
    }
    //========================================================
    public function taxas_editar($id_taxa)
    {
        helper('funcoes');
        $id_taxa = aesDecrypt($id_taxa);
        if ($id_taxa == -1) {
            return;
        }
        //editar taxa
        // carregar os dados das taxas para passar a View
        $model = new StocksModel();
        $data['taxa'] = $model->get_tax($id_taxa);
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();

            //confirmar se ja existe a taxa com o mesmo nome
            $resultado = $model->check_other_tax($request->getPost('text_designacao'), $id_taxa);
            if ($resultado) {
                $error = 'Já existe outra taxa com a mesma desigção!!';
            }
            //atualizar os dados da taxa na BD 
            if ($error == '') {
                $model->tax_edit($id_taxa);

                //redirecionamento para stock/familias
                return redirect()->to(site_url('stocks/taxas'));
            } else {
                $data['error'] = $error;
            }
        }

        //verificar tipo de profile
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/taxas_editar', $data);
    }
    //========================================================
    public function cotacoes_aprovar($id_aprovado_crip)
    {
        helper('funcoes');
        $id_aprovado = aesDecrypt($id_aprovado_crip);
        if ($id_aprovado == -1) {
            return;
        }
        $model = new StocksModel();
        $model->cot_aprovado($id_aprovado);

        return redirect()->to(site_url('stocks/cotacoes'));
    }
    //========================================================
    public function taxas_eliminar($id_taxa, $resposta = 'nao')
    {

        helper('funcoes');
        $id_taxa = aesDecrypt($id_taxa);
        if ($id_taxa == -1) {
            return;
        }

        $model = new StocksModel();
        $data['taxa'] = $model->get_tax($id_taxa);
        if ($resposta == 'sim') {
            //Eliminacao da familia
            $model->delete_tax($id_taxa);
            //redirecionamento para stock/familias
            return redirect()->to(site_url('stocks/taxas'));
        }

        //verificar tipo de profile
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }

        echo view('stocks/taxas_eliminar', $data);
    }
    //========================================================
    public function itemCheck_eliminar($id_idCheck, $checkList, $idServico = 0, $resposta = 'nao')
    {
        $model = new StocksModel();
        $data['itemCheck'] = $model->get_itemCheck($id_idCheck, $checkList);
        $success ="";
        if ($resposta == 'sim') {
            $model->delete_itemCheckList($id_idCheck);
            $success = "Eliminado item de check List com sucesso!!";
            $data['get_checkList'] = $model->get_checkList($idServico);
            $data['checklists_editar'] = $model->get_checklists_editar($idServico);
            $data['success'] = $success;
            echo view('stocks/checklists_editar', $data);
        }

        //verificar tipo de profile
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/itemCheck_eliminar', $data);
    }
    //========================================================
    
    public function CheckList_eliminar($id_idCheck, $resposta = 'nao')
    {
        $model = new StocksModel();
        $data['itemCheck'] = $model->get_Check($id_idCheck);
        $success ="";
        if ($resposta == 'sim') {
            $model->delete_CheckList($id_idCheck);
            $model->delete_itensCheckList($id_idCheck);
            $delete = 1;
            $this->checklists($delete);
        }
        //verificar tipo de profile
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/CheckList_eliminar', $data);
    }
    //========================================================
    public function cotacao_eliminar($id_cotacao, $resposta = 'nao')
    {

        helper('funcoes');
        $id_cotacao = aesDecrypt($id_cotacao);
        if ($id_cotacao == -1) {
            return;
        }

        $model = new StocksModel();
        $data['cotacao'] = $model->get_cotacao($id_cotacao);
        if ($resposta == 'sim') {
            //Eliminacao da familia
            $model->delete_cotacao($id_cotacao);
            //redirecionamento para stock/familias
            return redirect()->to(site_url('stocks/cotacoes'));
        }

        //verificar tipo de profile
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }

        echo view('stocks/cotacao_eliminar', $data);
    }
    //========================================================      
    public function cotacao_eliminar_fornecedor($id_cotacao, $resposta = 'nao')
    {

        helper('funcoes');
        $id_cotacao = aesDecrypt($id_cotacao);
        if ($id_cotacao == -1) {
            return;
        }

        $model = new StocksModel();
        $data['cotacao'] = $model->get_cotacao($id_cotacao);
        if ($resposta == 'sim') {
            //Eliminacao da familia
            $model->delete_cotacao($id_cotacao);
            //redirecionamento para stock/familias
            return redirect()->to(site_url('stocks/cotacoes_fornecedor'));
        }

        //verificar tipo de profile
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }

        echo view('stocks/cotacao_eliminar_fornecedor', $data);
    }

    //========================================================
    //PRODUTOS
    //========================================================
    public function produtos()
    {

        //carregar os produtos existentes
        //carregar os dados da familias para passar a View
        $model = new StocksModel();
        $data['produtos'] = $model->get_all_products();
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }

        echo view('stocks/produtos', $data);
    }
    //======================================================== 
    public function produtos_adicionar()
    {

        $model = new StocksModel();
        //carregar familias
        $data['familias'] = $model->get_all_families();

        //carregar as taxas
        $data['taxas'] = $model->get_all_taxes();
        $sucesso = '';
        $erro = '';

        //tratar a submissao do formulario
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //tenta fazer oupload da imagem do produto
            //em caso de sucesso, faz o rgistro na BD
            //apresentacao de mensagem com sucesso
            //definicao do nome da imagem do produto
            // $novo_ficheito  variavel para associar o nome da imagem + um valor aleatorio em forma de microsegundos  
            $novo_ficheito = round(microtime(true) * 1000) . '.' . pathinfo($_FILES["file_imagem"]["name"], PATHINFO_EXTENSION);
            $model = new StocksModel();

            //verifica se ja existe produto com o mesmo nome
            if ($model->product_check()) {
                //erro ja existe outro produto com o mesmo nome
                $erro = 'Já existe outro produto com o mesmo nome!';
            }
            if ($model->produtos_servicos()) {
                //erro mensagem de preencher o campo família de servicos
                $erro = 'preencha o campo família de produtos';
            }

            if ($erro == '') {
                //UPLOAD DA IMAGEM 
                $target_file = '';
                $target_file .= 'assets/product_images/' . '/';
                $target_file .= $novo_ficheito;
                //Codigo confimando o upload do arquivo
                $file_success = move_uploaded_file($_FILES["file_imagem"]["tmp_name"], $target_file);

                //registro da imagem na BD
                if ($file_success) {
                    $model->product_add($novo_ficheito);
                    $sucesso = 'Produto adicionado com sucesso!';
                } else {
                    $erro = 'Não foi possível adicionar o produto!';
                }
            }
        }
        //passar para a $data a mensagem de erro ou nao
        if ($erro != '') {
            $data['error'] = $erro;
        }

        if ($sucesso != '') {
            $data['success'] = $sucesso;
        }

        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        //apresenta o formulario de adiciona
        echo view('stocks/produtos_adicionar', $data);
    }
    //========================================================
    public function fornecedores_adicionar()
    {

        $model = new StocksModel();

        //carregar fornecedores
        $data['familias'] = $model->get_all_families_servicos();

        //carregar estados
        $data['select_uf'] = $model->get_all_estados();

        $sucesso = '';
        $erro = '';

        //tratar a submissao do formulario
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = new StocksModel();
            //verifica se ja existe fornecedor com o mesmo nome 
            if ($erro == '') {
                $result7 = $model->fornecedor_check();
                if (count($result7) != 0) {
                    $erro = "Já existe outro fornecedor com o mesmo nome";
                }
            }

            //verifica se ja existe fornecedor com o mesmo cnpj
            if ($erro == '') {
                if ($model->cnpj_check()) {
                    //erro ja existe outro fornecedor com o mesmo cnpj
                    $erro = 'Já existe outro fornecedor com o mesmo cnpj!';
                }
            }

            if ($erro == '') {
                if ($model->fornecedor_servicos()) {
                    //erro mensagem de preencher o campo família de servicos
                    $erro = 'preencha o campo família de servicos';
                }
            }

            //verificacao de senhas de usuario
            if ($erro == '') {
                $request = \Config\Services::request();
                $senha1 = $request->getPost('text_password');
                $senha2 = $request->getPost('text_password_repetir');
                if ($erro == '') {
                    if ($senha1 != $senha2) {
                        $erro = 'As Senhas de Usuario estão diferentes ';
                    }
                }
            }
            $model = new UsersModel();
            //verificar se ja existe um user com o mesmo username 
            if ($erro == '') {
                $result = $model->checkExistingUserForn();
                if (count($result) != 0) {
                    $erro = "Já Existe um utilizador com userName";
                }
            }
            //verificar se ja existe um user com o mesmo  email
            if ($erro == '') {
                $result5 = $model->checkExistingEmailForn();
                if (count($result5) != 0) {
                    $erro = "Já Existe um Fornecedor com esse email";
                }
            }

            
            if ($erro == '') {
                //adicionar novo fornecedor
                $model = new StocksModel();
                $model->fornecedor_add();

                // busca id_fornecedor e adiciona usuario de fornecedor reladionado ao id no user do fornecedor
                $id_fornecedor = $model->fornecedor_check_tras_id();
                $model2 = new UsersModel();
                $model2->addNewUser_fornecedor($id_fornecedor);
                $sucesso = 'Fornecedor adicionado com sucesso!';
            }
        }
        //passar para a $data a mensagem de erro ou nao
        if ($erro != '') {
            $data['error'] = $erro;
        }

        if ($sucesso != '') {
            $data['success'] = $sucesso;
        }

        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        //apresenta o formulario de adiciona
        echo view('stocks/fornecedores_adicionar', $data);
    }
    //========================================================
    public function fornecedores_adicionar_cep()
    {

        $model = new StocksModel();

        // carregar relacao de UF
        $data['select_uf'] = $model->get_all_estados();

        //carregar fornecedores
        $data['familias'] = $model->get_all_families_servicos();
        $sucesso = '';
        $erro = '';

        //tratar a submissao do formulario
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        }
        //passar para a $data a mensagem de erro ou nao
        if ($erro != '') {
            $data['error'] = $erro;
        }

        if ($sucesso != '') {
            $data['success'] = $sucesso;
        }

        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        //apresenta o formulario de adiciona
        echo view('stocks/fornecedores_adicionar', $data);
    }

    //========================================================
    public function ItemCheckList_adicionar()
    {
        $error = '';
        $success = '';
        $data = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $request = \Config\Services::request();
            $dados = $request->getPost();
        }

        $model = new StocksModel();
        //verificar se ja existe item de check list com os mesmos dados
        if ($error == '') {
            $resultado = $model->checkExistingItemCheck();
            if ($resultado) {
                $error = 'Já existe um checkList com a mesma desigção!!';
                $data['error'] = $error;
            }
        }
        if ($error == '') {
            $model->itemCheck_add();
            $data['success'] = "Adicionado item com Sucesso!!";
        }
        $id_check = $dados['id_servico'];;
        $data['checklists_editar'] = $model->get_checklists_editar($id_check);
        $data['get_checkList'] = $model->get_checkList($id_check);
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }

        echo view('stocks/checklists_editar', $data);
    }

    //========================================================


    public function produtos_editar($id)
    {
        helper('funcoes');
        $id = aesDecrypt($id);
        if ($id == -1) {
            return;
        }
        $model = new StocksModel();
        $erro = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //verifica se ja existe produto com o mesmo nome
            $request = \Config\Services::request();
            if ($model->product_other_check($id, $request->getPost('text_designacao'))) {
                //erro ja existe outro produto com o mesmo nome
                $erro = 'Já existe outro produto com o mesmo nome!';
            }

            if ($erro == '') {
                $existe_ficheiro_para_upload = true;
                if (
                    !file_exists($_FILES['file_imagem']['tmp_name'])  ||
                    !is_uploaded_file($_FILES['file_imagem']['tmp_name'])
                ) {
                    $existe_ficheiro_para_upload = false;
                }
                //verifica se é necessario carregar novo ficheiro
                if ($existe_ficheiro_para_upload) {

                    //atualiza os dados do produto com imagem nova
                    // definicao do nome da imagem do produto
                    $novo_ficheito = round(microtime(true) * 1000) . '.' . pathinfo($_FILES["file_imagem"]["name"], PATHINFO_EXTENSION);
                    //UPLOAD DA IMAGEM 
                    $target_file = '';
                    $target_file .= 'assets/product_images/' . '/';
                    $target_file .= $novo_ficheito;
                    //Codigo confimando o upload do arquivo
                    $file_success = move_uploaded_file($_FILES["file_imagem"]["tmp_name"], $target_file);

                    //atualizacao do produto  na BD
                    if ($file_success) {
                        $model->product_edit($id, $novo_ficheito);
                        // $sucesso = 'Produto adicionado com sucesso!';                   
                    } else {
                        $erro = 'Não foi possível adicionar o produto!';
                    }
                } else {
                    //atualiza os dados do produto sem imagem nova
                    $model->product_edit($id);
                }
                if ($erro == '') {
                    $this->produtos();
                    return;
                }
            }
        }
        //buscar os dados do produto e editar         
        $result = $model->get_product($id);

        //se existir erro passa o mesmo para a View
        if ($erro != '') {
            $data['error'] = $erro;
        }
        $data['produto'] = $result;

        //carregar familias
        $data['familias'] = $model->get_all_families();

        //carregar as taxas
        $data['taxas'] = $model->get_all_taxes();

        //verificar tipo de profile
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }

        //apresenta o formulario de edicao
        echo view('stocks/produtos_editar', $data);
    }
    //========================================================
    public function produtos_eliminar($id_produto, $resposta = 'nao')
    {
        helper('funcoes');
        $id_produto = aesDecrypt($id_produto);
        if ($id_produto == -1) {
            return;
        }
        $model = new StocksModel();
        $data['produto'] = $model->get_product($id_produto);
        if ($resposta == 'sim') {

            //Eliminacao do produto
            $model->delete_product($id_produto);
            //redirecionamento para stock/produtos
            return redirect()->to(site_url('stocks/produtos'));
        }

        //verificar tipo de profile
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/produtos_eliminar', $data);
    }
    //======================================================== 
    public function movimento_adicionar()
    {
        $model = new StocksModel();
        $data['produtos'] = $model->get_all_products();
        $error = '';
        $quantidade = '';
        $tipo_produto = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();
            //verificar a quantidade
            $quantidade = $request->getPost('text_quantidade');
            if ($quantidade < 1 || $quantidade > 10000) {
                $error = "Obrigatorio a  quantidade ser maior que 0 e menor que 10.000 !!";
            }
            //verificar se foi escolhido o produto
            $tipo_produto = $request->getPost('select_parent');
            if ($tipo_produto == 0) {
                $error = "Selecione um produto !!";
            }
            //guardar na base de dados e trata erro
            if ($error == '') {
                $model->movimento_add();
                $model->movimento_add_produto();

                $data['success'] = "Produto adicionado com sucesso";
                //para atualizar a lista de familias
                // $data['familias']= $model->get_all_families();
            } else {
                $data['error'] = $error;
            }
        }

        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/movimentos_adicionar', $data);
    }
    //======================================================== 
    public function movimento_baixar()
    {
        $model = new StocksModel();
        $data['produtos'] = $model->get_all_products();
        $error = '';
        $quantidade = '';
        $tipo_produto = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();
            //verificar a quantidade
            $quantidade = $request->getPost('text_quantidade');
            if ($quantidade < 1 || $quantidade > 10000) {
                $error = "Obrigatorio a  quantidade ser maior que 0 e menor que 10.000 !!";
            }
            //verificar se foi escolhido o produto
            $tipo_produto = $request->getPost('select_parent');
            if ($tipo_produto == 0) {
                $error = "Selecione um produto !!";
            }
            //Verificacao de saldo sulficiente
            if ($error == '') {
                $id_produto = $request->getPost('select_parent');
                $quantidades = $model->get_product($id_produto);
                $saldo = $quantidades['quantidade'];
                if ($saldo - $quantidade < 0) {
                    $error = "Não há saldo suficiente de estoque !!";
                }
            }

            //guardar na base de dados e trata erro
            if ($error == '') {
                $model->movimento_add();
                $model->movimento_del_produto();
                $data['success'] = "Produto baixado com sucesso";
                //para atualizar a lista de familias
                // $data['familias']= $model->get_all_families();
            } else {
                $data['error'] = $error;
            }
        }

        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/movimentos_baixar', $data);
    }
    //========================================================
    private function checkProfile($profile)
    {
        //verifique se o usuário tem permissão para acessar o recurso
        //codigo consegue buscar pedacos de palavras
        if (preg_match("/$profile/", $this->session->profile)) {
            return true;
        } else {
            return false;
        }
    }
    //========================================================
    public function fornecedores()
    {
        //carregar os fornecedores existentes
        $model = new StocksModel();
        $data['fornecedores'] = $model->get_all_fornecedores();
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }
        echo view('stocks/fornecedores', $data);
    }

    //========================================================
    public function descobrir_cep()
    {
        $model = new StocksModel();
        $data['fornecedores'] = $model->get_all_fornecedores();
        if ($this->checkProfile('admin')) {
            $data['admin'] = "true";
        }

        echo view('stocks/descobrir_cep', $data);
    }
    //========================================================
}
