<?php

namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model
{   //Inicio da variavel conectada na BD
    protected $db;

    //==========================================
    public function __construct(){
        $this->db = db_connect();
     }
    //==========================================
    public function verifyLogin($username, $password){

            $params = array(
                $username,
                md5(sha1($password))
            );
            $query = "SELECT * FROM users WHERE username = ? AND passwrd = ?";
            $results = $this->db->query($query,$params)->getResult('array');

            if(count($results)==0){
                return false;
            }else{
                
                //retorna aos valores do login
                return $results[0];
            }            
         }
    //==========================================
    public function verifyActive($username, $password){
        //verifica se conta esta ativa
        $params = array(
            $username,
            md5(sha1($password))
        );
        $query = "SELECT * FROM users WHERE username = ? AND passwrd = ? AND active = 1";
        $results = $this->db->query($query,$params)->getResult('array');

        if(count($results)==0){
            return false;
        }else{
            //atualizar campo last_login da BD
            $params = array(
                $results[0]['id_user']
            ); 
            $this->db->query("UPDATE users SET last_login = NOW()
            WHERE id_user = ?",$params); 
            //retorna aos valores do login
            return $results[0];
        }            
     }
//==========================================
    public function resetPassword($email){
            //redefinir a senha do usuário
            // verifica se já há um usuário com o e-mail
            $params = array(
                $email    
            );
            $query = "SELECT id_user FROM users WHERE email = ?";
            $results = $this->db->query($query,$params)->getResult('array');
           
            if(count($results)!= 0){
                //existe email  igual na BD

                // mudar a senha dos usuários
                $newPassword = $this->randomPassword();
                $params = array(
                    md5(sha1($newPassword)),
                    $results[0]['id_user']
                );
                $query = "UPDATE users SET passwrd = ? WHERE id_user = ?";
                $this->db->query($query,$params);
                echo('(Mensagem de email)');
                echo 'A sua nova password é : '. $newPassword;
                return true;

            }else{
                //nao existe email igual
                echo "nao existe este email registrado";
                return false;
            }
        }
    //==========================================
    public function checkEmail($email){
            //verifica se o e-mail é de uma conta de usuário
            $params=array(
                $email
            );
            $query = "SELECT id_user FROM users WHERE email =?";
            return $this->db->query($query,$params)->getResult('array');

        }
        //==========================================
    //Gerar um codigo purl de 6 caracteres e guardar na BD
    public function sendPurl($email, $id_user){
            $purl = $this->randomPassword(6);
            $params = array(
                $purl,
                $id_user
            );
            $query = "UPDATE users SET purl =? WHERE id_user =?";
            $this->db->query($query,$params);

            // envio do email
            echo "Mensagem de email link para alterar password ";
            echo'<a href="'.site_url('users/redefine_password/'.$purl).'"> Redefinir Password</a>';         
        }
    //==========================================
    public function getPurl($purl){
            //retorna a linha com o purl fornecido
            $params=array(
                $purl
            );
            $query = "SELECT id_user FROM users WHERE purl = ?";
            return  $this->db->query($query,$params)->getResult('array');    
        }
    //==========================================
    public function redefine_password($id,$pass){
            //metodo que atualiza a users password na BD
            $params = array(
                md5(sha1($pass)),
                $id
            );
            $query = "UPDATE users SET passwrd = ? WHERE id_user =?";
            $this->db->query($query,$params); 
            //remove o registro PURL na BD de USERS
            $params = array(
                $id
            );
            $this->db->query("UPDATE users SET purl='' WHERE id_user = ?",$params);        
        }
    //==========================================
    public function getUsers(){
            //retorna todos os usuarios da BD
            $query = "SELECT * FROM users";
            return  $this->db->query($query)->getResult('array');    

        }
    //==========================================
    public function getUser($id_user){
            //retorna  o usuario da BD
            $params = array($id_user);
            $query = "SELECT * FROM users WHERE id_user =?";
            return  $this->db->query($query,$params)->getResult('array');    

        }
    //==========================================
    public function checkExistingUser(){
            // verifica se já existe um usuário com o mesmo Nome de Usuário ou Endereço de Email
            $request = \Config\Services::request();
            $dados = $request->getPost(); 
            
            $params = array(
                $dados['text_name'],
                $dados['text_email']   
            );
           
            return $this->db->query("SELECT id_user FROM users WHERE username = ? OR email = ?",$params)->getResult('array');

        }   
    //==========================================
    public function checkAnotherUserEmail($id_user){
            // verifica se outro usuario com o mesmo nome ou email
            $request = \Config\Services::request();
            $dados = $request->getPost(); 
            
            $params = array(
                $dados['text_email'],
                $id_user   
            );
            return $this->db->query("SELECT id_user FROM users WHERE  email = ? AND id_user <> ?",$params)->getResult('array');
        }   
    //==========================================
    public function addNewUser(){
            $request = \Config\Services::request();
            $dados = $request->getPost();
            //profile
            $profileTemp = array();
            if(isset($dados['check_admin'])){
                array_push($profileTemp,'admin');
            }
            if(isset($dados['check_moderator'])){
                array_push($profileTemp,'moderator');
            }
            if(isset($dados['check_user'])){
                array_push($profileTemp,'user');
            }

            //codigo implode para inserir "virgulas" 
            $profile = implode(',',$profileTemp);
            
            $params=array(
                $dados['text_name'],
                md5(sha1($dados['text_password'])),
                $dados['text_name'],
                $dados['text_email'],
                $profile
            );
            //Query para inserir um novo user
            $this->db->query("INSERT INTO users(username, passwrd, name, email, profile) 
                              VALUES(?,?,?,?,?)",$params);
        }
    //==========================================
    public function randomPassword($numChars = 8){
            //gera uma senha aleatória
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            return  substr(str_shuffle($chars),0,$numChars) ;
        }
    //==========================================
    public function editUser(){
            //editar os dados do utilizador na BD
            $request = \Config\Services::request();
            $dados = $request->getPost();
            //profile
            $profileTemp = array();
            if(isset($dados['check_admin'])){
                array_push($profileTemp,'admin');
            }
            if(isset($dados['check_moderator'])){
                array_push($profileTemp,'moderator');
            }
            if(isset($dados['check_user'])){
                array_push($profileTemp,'user');
            }

            //codigo implode para inserir "virgulas" 
            $profile = implode(',',$profileTemp);

            $params=array(
                $dados['text_name'],
                $dados['text_email'],
                $profile,
                $dados['id_user']
            );
            $this->db->query('UPDATE users 
                              SET name = ?, email = ?, profile = ? 
                              WHERE id_user = ?',$params );
        }
    //==========================================
    public function checkAnotherUserName($id_user){
            // verifica se outro usuario com o mesmo nome ou nome
            $request = \Config\Services::request();
            $dados = $request->getPost(); 
            
            $params = array(
                $dados['text_name'],
                $id_user   
            );
            return $this->db->query("SELECT id_user FROM users WHERE  name = ? AND id_user <> ?",$params)->getResult('array');
        }   
    //==========================================
    public function deleteUser($id_user){
            
            $params =array(
                $id_user
            );
            $this->db->query('UPDATE users SET deleted = UNIX_TIMESTAMP() WHERE id_user = ?',$params);
        }
    //==========================================
    public function recoverUser($id_user){
            // recuperar user deletado
            $params =array(
                $id_user
            );
            $this->db->query('UPDATE users SET deleted = 0 WHERE id_user = ?',$params);


        }

        

        
}