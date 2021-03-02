<?php namespace App\Controllers;

use App\Models\CriptoModel;
use CodeIgniter\Controller;


class Cripto extends BaseController{
    //========================================================
    public function index(){
        echo "estou no cripto";
    }
    //========================================================
    public function guardarCartao(){
        $numero_cartao = 'Guilherme';

        $model = new CriptoModel();
        $model->encriptar($numero_cartao);
        echo 'cartao adicionado com sucesso';
    }
    //========================================================
    public function apresentarCartao($id){
        $model = new CriptoModel();
        $resultado = $model->desencriptar($id);
        echo "<pre>";
        print_r($resultado);
        echo "<pre>";    }
    //========================================================
    public function procurarCartao($numero_cartao){
        $model = new CriptoModel();
        $resultado = $model->procurarCartao($numero_cartao);
        echo "<pre>";
        print_r($resultado);
        echo "<pre>";


    }
}