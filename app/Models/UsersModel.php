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
            echo "mensagem de email link para altera password";
            echo'<a href="'.site_url('users/redefine_password/'.$purl).'">Redefinir Password</a>';

           
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
        public function randomPassword($numChars = 8){
            //gera uma senha aleatória
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            return  substr(str_shuffle($chars),0,$numChars) ;
        }

        
}