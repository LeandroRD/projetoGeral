<?php namespace App\Controllers;
use App\Models\SignupModel;
use CodeIgniter\Controller;

class Main extends BaseController
{
	//====================================================
	public function index()
		{ //verificar se recebera o codigo de novo usuario
			$data = array();
			if (isset($_GET['a'])){
				$a = $_GET['a'];
				$v = $_GET['v'];
			}else{
				$a='home';
			}
			$model = new SignupModel();
			
			switch($a){
				case'validada':      
						$results=$model->validar_user($v);
					if(count($results)!=0){
						//mensagem de codigo de validacao correta
						$results2=$model->validar_purl($results[0]);
						$mensagem = "Conta validada, faça o login";
						$data['login_novo'] = $mensagem;
						echo view('users/login_novo',$data);		
					}else{
						//mensagem de codigo de validacao incorreta
						$mensagem = "Codigo não confere!";
						$data['login_novo'] = $mensagem;
						echo view('users/login_novo',$data);
					}
				break;
				case'home'    :      echo view('Main');break;
			}
								
		}

	//--------------------------------------------------------------------

}
