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
            $this->homePage();

        }else{
            //mostrar o formulario login
            $this->login();

        }
	}
	//====================================================
    public function login(){
        //checar se  ja existe sessao vai para homepae
        if ($this->checkSession()){
            $this->homePage();
            return;

        } 
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

        // se check session existe
        if (!$this->checkSession()){
            $this->login();
            return;
        }
        //apresentar homepage view
        echo view('users/homepage');

    }
    //===============================================
    public function logout(){
        //logout
        $this->session->destroy();
        // redirect('users','refresh');
        return redirect()->to(site_url('users'));
    }
    //===============================================

    private function checkSession(){
        //verifica se existe sessao
        return $this->session->has('id_user');
    }
    //===============================================
    public function recover(){
        //aparesenta form para recover passaword
        echo view('users/Recover_password');

    }
}