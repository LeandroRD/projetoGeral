<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Users extends BaseController
{	
    private $sessao;

    public function __construct(){
        $this->sessao = session();
    }
	//====================================================
	public function index()
	{
        //=====================================
        //Exemplo para testar com a funcao TESTE()
		// $session = session();
        // $this->sessao->set('nome','Carlos');

        // echo "<pre>";
        //     print_r($_SESSION);
        // echo"</pre>";
        //=====================================

        //login com sucesso
        $dados = [
            'id_user'=>1,
            'name'=>'joao'
        ];
        $this->sessao->set($dados);
	}
	//====================================================

    public function teste(){
        echo $this->sessao->nome;
    }
    //====================================================
    public function menu_inicial(){
        if(!$this->sessao->has('id_user')){
            echo"Acesso negado";
            exit();       
        }
        echo 'estou no menu principal';
    }

    private function checkSessao(){
        //verifica se existe sessao
        return $this->sessao->has('id_user');
    }
}