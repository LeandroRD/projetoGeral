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
        $error='';
        $data= [];
        $request = \Config\Services::request();

        //checar se os campos foram preenchidos 
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $username = $request->getPost('text_username');
            $password = $request->getPost('text_password');
            if($username=='' || $password==''){
                $error= 'Erro no preenchimento dos campos';
            }
        
        //checar a BD 
        

        }
        if($error !=''){
            $data['error']=$error;
        }
       
        //mostra a pagina de login
        echo view('users/login',$data);

    }

    private function checkSession(){
        //verifica se existe sessao
        return $this->sessao->has('id_user');
    }
}