<?php namespace App\Controllers;

use App\Models\SignupModel;
use CodeIgniter\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Signup extends BaseController
{   
    //========================================================
    public function index(){
        $this->signup();
     }
    //========================================================
    public function signup(){
        echo view('users/signup');
    }
    //========================================================
    public function novo_user_adicionar(){
        $erro = false;
        $mensagem ='';
        
        $model = new SignupModel();
        $data = array();
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $request = \Config\Services::request();
            $dados = $request->getPost();
            
            //recolhe dos dados
            $nome_completo = $_POST['text_nome_completo'];
            
            $utilizador = $_POST['text_utilizador'];
            $senha1  = $_POST['text_senha_1'];
            $senha2  = $_POST['text_senha_2'];

            //verifica se senhas sao iguais
            if($senha1 != $senha2){
            $erro = true;
                $mensagem= 'As Senhas estão diferente!!';
            }       
        }
        
        //verificar se existe outro email com o mesmo nome
        $model = new SignupModel();
        if(!$erro){ 
            $results=$model->checkAnotherNewUserEmail($dados['text_email']);              
            if(count($results)!=0){
                $mensagem= 'Já existe outro usuario com o mesmo email!!';   
                $erro = true;                  
            }
                  
        }
        $email = $dados['text_email'];
        
        //verificar se existe outro nome completo igual
        $model = new SignupModel();
        if(!$erro){ 
            $results=$model->checkAnotherNewUserCompleto($dados['text_nome_completo']);              
            if(count($results)!=0){
                $mensagem='Já existe outro usuario com o mesmo nome!!';   
                $erro = true;                      
            }
        }

         //verificar se existe outro username  igual
         $model = new SignupModel();
         if(!$erro){ 
             $results=$model->checkAnotherNewUser($dados['text_utilizador']);              
             if(count($results)!=0){
                $mensagem ='Já existe outro usuario com o mesmo username!!';                          
             }
         }
         //enviar email

          if(!$erro){
            //gerar codigo aleatorio  
            helper('funcoes');
            $id_cod_aleatorio = CriarCodigoAlfanumericoSemSinais(30);
            //  $data = new DateTime();

            $model = new SignupModel();
            $model -> Sign_add($id_cod_aleatorio);

            // echo 'inserido na BD</br>';
            
            

            $email_a_enviar = new emails();
            $config = include('config.php');
            $link = $config['BASE_URL'].'?a=validada&v='.$id_cod_aleatorio;
            //preparacao dos dados do email
            $temp = [
                $email,
                'SPACET - Ativação da Conta do Cliente TESTE NO PROJETO GERAL',
                 '<p>Clique no link seguinte para validar a sua conta de cliente</p>'.
                  '<a href="'.$link.'">'.$link.'</a>'
            ];

        $mensagem_enviada = $email_a_enviar ->EnviarEmailCliente($temp);
        $data['success']= "Email enviado com sucesso!";
        // echo"email Enviada ok ";
        }
        if($erro !=''){
            $data['erro'] = $mensagem;

        }
        echo view('users/signup',$data);
             
     }
}
// =========================================================
class emails{       
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
}

