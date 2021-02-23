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
            'name'=>$data['name'],
            'profile'=>$data['profile']
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
        //verifica o profile
        if($this->checkProfile('admin')){
            echo "Sou Admin";
        }else{
            echo "Não sou Admin";
        }
        exit();
        
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
        //apresenta form para recover passaword
        echo view('users/Recover_password');
    }
    //===============================================
    public function reset_password(){
        // metodo 1=========================================
        //reset no users pasword
        //redefine  a password e envia por email

        // $request = \Config\Services::request();
        // $email = $request->getPost('text_email');
    //===============================================
    // verifica se há um usuário neste e-mail
    // se existe muda a senha e envie email

        // $users = new UsersModel();
        // $users->resetPassword($email);

        //metodo 2==========================================
        $request = \Config\Services::request();
        $email = $request->getPost('text_email');
        $users = new UsersModel();
        $result = $users->checkEmail($email);
            if(count($result)!=0){
                //existe email associado
                $users->sendPurl($email, $result[0]['id_user']);
            echo"existe email associado";
        }else{
            echo "Nao existe o email associado";
        }
    }
    //===============================================
    public function redefine_password($purl){
        

        $users = new UsersModel();
        $results = $users->getPurl($purl);
        if(count($results)==0){
            // nenhum purl encontrado redireciona para o main
            return redirect()->to(site_url('main'));
        }else{
            //existe purl na BD
            $data['user'] = $results[0];
            echo view('users/redefine_password',$data);       
        }
    }
    //===============================================
    public function redefine_password_submit(){
        $request = \Config\Services::request();
        $id_user = $request->getPost('text_id_user');
        $nova_password = $request->getPost('text_nova_password');
        $nova_password_repetida = $request->getPost('text_repetir_password');

        $error ='';
        // verifique se ambas as senhas correspondem
        if ($nova_password != $nova_password_repetida){
            $error='As passwords nao são iguais';
            die($error);
        }
        
        //atualização da nova Password
        if($error == ''){
            $users = new UsersModel();
            $users->redefine_password($id_user, $nova_password);
        }

        



    }
    //===============================================
    private function checkProfile($profile){
        //verifique se o usuário tem permissão para acessar o recurso
        if($this->session->profile == $profile){
            return true;
        }else{
            return false;
        }
    }
}