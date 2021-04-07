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
	public function index(){
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
        //checar se  ja existe sessao vai para homepage
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
            'profile'=>$data['profile']);
       $this->session->set($session_data);
     }    
    //===============================================
    public function homePage(){

        // se check session existe
        if (!$this->checkSession()){
            $this->login();
            return;
        }
        $data = array();
       //verifica se user é admin
       if($this->checkProfile('admin')){
           $data['admin'] = true;
       }
        
        //apresentar homepage view
        echo view('users/homepage',$data);
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
            echo" existe email associado";
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
    public function teste($value){
        if($this->checkProfile($value)){
            echo"Existe";
        }else{
            echo "Não Existe";
        }
     }
    //===============================================
    private function checkProfile($profile){
        //verifique se o usuário tem permissão para acessar o recurso
        //codigo consegue buscar pedacos de palavras
        if(preg_match("/$profile/", $this->session->profile)){
            return true;
        }else{
            return false;
        }
     }
    //===============================================
    public function op1(){
        echo "OP1";
     }
    //===============================================
    public function op2(){
        echo "OP2";
     }
    //===============================================
    public function admin_users(){
        //checar se  ja existe sessao vai para homepae
        if (!$this->checkSession()){
            $this->homePage();
            return;

        }
        // verifique se o usuário tem permissão
        if($this->checkProfile('admin')==false){
            return redirect()->to(site_url('users'));  
        }
        //buscar a lista de utilizadores registrados
        $users = new UsersModel;
        $results = $users->getUsers();
        $data['users'] = $results;
        
        echo view('users/admin_users',$data);
     }
    //===============================================
    public function admin_new_user(){
        //checar se  ja existe sessao vai para homepae
        if (!$this->checkSession()){
            $this->homePage();
            return;

        }
        // verifique se o usuário tem permissão
        if($this->checkProfile('admin')==false){
            return redirect()->to(site_url('users'));  
        }
        //adicionar um novo usuario na BD
        $error='';
        $data= array();
        

        // verificar se houve uma submissao
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //ir buscar os dados do post
            $request = \Config\Services::request();
            $dados = $request->getPost();

            //verifica se vieram os dados corretos
            if($dados['text_name']==''||
               $dados['text_password']==''||
               $dados['text_password_repetir']==''||
               $dados['text_name']==''||
               $dados['text_email']=='')
            
            {
                $error = 'preencha todos os campos de texto!!';
            }

            //verifica se as passwords coincidem
            if($error ==''){
                if ($dados['text_password'] !=  $dados['text_password_repetir']){
                    $error = 'As Passwords não coicidem!!'; 
                }
            }
            if($error ==''){
                //verifica se pelo menos uma check de profile foi checada
                if(!isset($dados['check_admin'])&&
                   !isset($dados['check_moderator'])&&
                   !isset($dados['check_user'])){
                    $error = 'Indique pelo menos, um tipo de Profile !!'; 
                }
            }
            
            $model = new UsersModel();
            
            //verificar se ja existe um user com o mesmo username ou email
            if($error ==''){
                $result = $model->checkExistingUser();
                if(count($result)!=0){
                    $error= "Já Existe um utilizador com esses dados";
                }
            }

            if($error==''){
                $model->addNewUser();
                return redirect()->to(site_url('users/admin_users'));       
            }
            
        }

        //verificar se ha erro
        if($error !=''){
            $data['error'] = $error;

        }

        echo view('users/admin_new_user',$data);
     }
    //===============================================
    public function admin_edit_user($id_user){
         //evitar se usuario forçar deletar a si mesmo pelo browser
         if($id_user == $this->session->id_user ){          
            return redirect()->to(site_url('users'));            
        }

        //checar se  ja existe sessao vai para homepae
        if (!$this->checkSession()){
            $this->homePage();
            return;

        }
        // verifique se o usuário tem permissão
        if($this->checkProfile('admin')==false){
            return redirect()->to(site_url('users'));  
        }
        $error='';
        $data= array();
        
        //se  houve submissao
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //trata a alteracao dos dados do user
            
            //verificar se os campos estao corretos
            
            $request = \Config\Services::request();
            $dados = $request->getPost();

            //verifica se vieram os dados  preenchidos
            if($dados['text_name']==''||
               $dados['text_email']=='')
            
            {
                $error = 'preencha todos os campos de texto!!';
            }

            if($error ==''){
                //verifica se pelo menos uma check de profile foi checada
                if(!isset($dados['check_admin'])&&
                   !isset($dados['check_moderator'])&&
                   !isset($dados['check_user'])){
                        $error = 'Indique pelo menos, um tipo de Profile !!'; 
                        
                }
            }
   
            //verificar se existe outro utilizador com os mesmo email
            $model = new UsersModel(); 
            if($error == ''){
                $results=$model->checkAnotherUserEmail($dados['id_user']);
                
                if(count($results)!=0){
                    $error='Já existe outro usuario com o mesmo email!!';
                     
                }
            }
            
            //verificar se existe outro utilizador com o mesmo nome
            $model = new UsersModel(); 
            if($error == ''){
                $results=$model->checkAnotherUserName($dados['id_user']);               
                if(count($results)!=0){
                    $error='Já existe outro usuario com o mesmo nome!!';                     
                }
            }
            //ultima verificacao de erros para a edicao do user
            if($error == ''){
                $model->editUser();
                return redirect()->to(site_url('users/admin_users'));    
               
            }
           
        }
        
        //abrir o quadro para edicao do utilizador
        $users = new UsersModel();

        //verifica se vieram dados do user
        $user=$users->getUser($id_user);

        //condicao para que nao altere para o numero do usuario admin no endereco de browser 
        if(count($user) == 0 || $user[0]['id_user'] == $this->session->id_user){    
           return redirect()->to(site_url('users/admin_users'));
        }
        
        $data['user'] = $user[0];
        
        //se nao houver nenhum erro fara a edicao
        if ($error != ''){
            $data['error'] = $error;
        } 
        echo view('users/admin_edit_user',$data);   
     } 
    //===============================================
    public function admin_delete_user($id_user,$response =''){
        //evitar se usuario forçar deletar a si mesmo pelo browser      
        if($id_user == $this->session->id_user ){          
            return redirect()->to(site_url('users'));            
        }
        
        // checar se  ja existe sessao vai para homepae
        if (!$this->checkSession()){
            $this->homePage();
            return;
        }
        
        // verifique se o usuário tem permissão
        if($this->checkProfile('admin')==false){
            return redirect()->to(site_url('users'));  
        }
        
        $model = new UsersModel();
        
        //verificar se veio resposta de yes
        
       
        if($response == 'yes'){
          
            $model->deleteUser($id_user);
            return redirect()->to(site_url('users/admin_users'));  
        }

        //apresentar quadro para questionar se pretende eliminar user
        
        $data['user'] = $model->getUser($id_user)[0];
        echo view('users/admin_delete_user',$data);
       
     }
    //===============================================
    public function admin_recover_user($id_user, $response=''){
        //evitar se usuario forçar deletar a si mesmo pelo browser
        if($id_user == $this->session->id_user ){          
            return redirect()->to(site_url('users'));            
        }
        
        // checar se  ja existe sessao vai para homepae
        if (!$this->checkSession()){
            
            $this->homePage();
            return;
        }
        // verifique se o usuário tem permissão
        if($this->checkProfile('admin')==false){        
            return redirect()->to(site_url('users'));  
        }
       
        $model = new UsersModel();
        
        //verificar se veio resposta de yes   
       if($response == 'yes'){
           $model->recoverUser($id_user);
           return redirect()->to(site_url('users/admin_users'));  
       }

       //apresentar quadro para questionar se pretende recuperar o  usuario 
       $data['user'] = $model->getUser($id_user)[0];
       echo view('users/admin_recover_user',$data);
     }   
}
