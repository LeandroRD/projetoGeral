<?php namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;


class Users extends BaseController
{	
    protected $session;

    public function __construct(){
        $this->session = session();
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
        $data= array();
        $request = \Config\Services::request();

        //checar se os campos foram preenchidos 
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $username = $request->getPost('text_username');
            $password = $request->getPost('text_password');
            if($username=='' || $password==''){
                $error= 'Erro no preenchimento dos campos';
            }
        
            //checar a BD 
            if($error ==''){
                $model = new UsersModel();
                $result = $model->verifyLogin($username,$password);
                
                if(is_array($result)){
                    //login valido
                    
                    // echo"ok";
                    // exit();

                    $this->setSession($result);
                    $this->homePage();
                    return;
                    
                    
                   
                }else{
                    //login invalido
                    $error= 'Login inválido !!';   
                }    
            }
        }
        
        if($error !=''){
            $data['error']=$error;
        }
    
        //mostra a pagina de login
        echo view('users/login',$data);
    }
    //===============================================
    private function setSession($data){
        // Iniciar sessao
        $session_data=array(
            
            'id_user'=>$data['id_user'],
            'name'=>$data['name']
    );
    
       $this->session->set($session_data);

    }    
    //===============================================
    public function homePage(){
        echo"entrei na Aplicação";
        echo"<pre>";
        print_r($_SESSION);
        echo"</pre>";

    }
    //===============================================

    private function checkSession(){
        //verifica se existe sessao
        return $this->session->has('id_user');
    }
}