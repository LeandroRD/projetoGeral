<?php

namespace App\Models;
use CodeIgniter\Model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SignupModel extends Model
{
    protected $db;
    //==================================================
    public function __construct(){
        $this->db = db_connect();
     }
     //===============================================================================
     public function checkAnotherNewUserEmail(){
        // verifica se outro usuario com  email
        $request = \Config\Services::request();
        $dados = $request->getPost(); 
        
        $params = array(
            $dados['text_email']
               
        );
        return $this->db->query("SELECT email FROM users WHERE  email = ? ",$params)->getResult('array');
    }
    //===============================================================================
    public function checkAnotherNewUserCompleto(){
        // verifica se outro usuario com o mesmo nome completo
        $request = \Config\Services::request();
        $dados = $request->getPost(); 
        
        $params = array(
            $dados['text_nome_completo']
               
        );
        return $this->db->query("SELECT name FROM users WHERE  name = ? ",$params)->getResult('array');
    }
    //===============================================================================
    public function checkAnotherNewUser(){
        // verifica se outro usuario com o mesmo username
        $request = \Config\Services::request();
        $dados = $request->getPost(); 
        
        $params = array(
            $dados['text_utilizador']
               
        );
        return $this->db->query("SELECT username FROM users WHERE  username = ? ",$params)->getResult('array');
    }
    //===============================================================================
    public function EnviarEmailCliente($dados){

        // dados[0] = endereço de email do cliente
        // dados[1] = assunto
        // dados[2] = mensagem
        require 'phpmailer/src/Exception.php';
        require 'phpmailer/src/PHPMailer.php';
        require 'phpmailer/src/SMTP.php';

        $configs = include('config.php');

        //configurações
        $configs = include('config.php');
    
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );
        $mail->isHTML();

        //Relatorio de problemas no envio de email é =2
        $mail->SMTPDebug = $configs['MAIL_DEBUG'];
        $mail->Host = $configs['MAIL_HOST'];
        $mail->Port = $configs['MAIL_PORT'];;
        $mail->SMTPAuth = true;
        $mail->Username = $configs['MAIL_USERNAME'];;                        
        //$mail->Username = 'fsdfdsf';                        
        $mail->Password = $configs['MAIL_PASSWORD'];;
        $mail->setFrom ($configs['MAIL_FROM'], 'SPACET');
        $mail->addAddress($dados[0],$dados[0]);
        $mail->CharSet = "UTF-8";
        //assunto
        $mail->Subject = $dados[1];
        //mensagem
        $mail->Body = $dados[2];               
        //envio da mensagem
        $enviada = false;
        if($mail->send()){ $enviada = true; }
        return $enviada;
    }
    //=======================================================
    public function Sign_add($id_cod_aleatorio){

        //adiciona um novo User  na BD
        $request = \Config\Services::request();
        $dados = $request->getPost();
        $params = array(
            $dados['text_email'], 
            $dados['text_nome_completo'], 
            $dados['text_utilizador'],
            md5(sha1($dados['text_senha_1'])), 
            // $dados['text_senha_1'], 
            $id_cod_aleatorio
        );
        
        //Query para inserir um novo user
        $this->db->query("INSERT INTO users(email,name,username,passwrd, purl,active,profile) 
        VALUES(?,?,?,?,?,0,'user')",$params);
     }
     //=======================================================
     public function validar_user($validar){
        $params = array($validar);
            return $this->db->query("SELECT id_user FROM users WHERE  purl = ? ",$params)->getResult('array');
     }
     //=======================================================
     public function validar_purl($validar){
       
        $params = array($validar);
        return $this->query("UPDATE users SET active = 1
        WHERE id_user = ?",$params);
       
     }
      

   
            
            
            
            
    }
