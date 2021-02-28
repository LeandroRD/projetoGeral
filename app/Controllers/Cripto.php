<?php namespace App\Controllers;

use App\Models\CriptoModel;
use CodeIgniter\Controller;


class Cripto extends BaseController{
    public function index(){
        echo "estou no cripto";
    }
    public function guardarCartao(){
        $numero_cartao = '764859fd';

        $model = new CriptoModel();
        $model->encriptar($numero_cartao);
        echo 'cartao adicionado com sucesso';
    }
}