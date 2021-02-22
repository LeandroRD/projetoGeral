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
        public function randomPassword(){
            //gera uma senha aleatória
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            return  substr(str_shuffle($chars),0,8) ;
        }
}