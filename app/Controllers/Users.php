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
        //checar se a sessao esta ativa
        if($this->checkSession()){
            //sessao ativa

        }else{
            //mostrar o formulario login
            $this->login();

        }
	}
	//====================================================
    public function login(){
        //mostra a pagina de login
        echo view('users/login');

    }

    private function checkSession(){
        //verifica se existe sessao
        return $this->sessao->has('id_user');
    }
}