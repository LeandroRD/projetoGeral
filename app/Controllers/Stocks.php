<?php namespace App\Controllers;
use App\Models\CriptoModel;
// use CodeIgniter\Controller;

class Stocks extends BaseController{
    //========================================================
    public function index(){
        echo view('stocks/main');
    }
    //========================================================
    public function familias(){
        echo view('stocks/familias');
    }
    //========================================================
    public function movimentos(){
        echo view('stocks/movimentos');
    }
    //========================================================
    public function produtos(){
        echo view('stocks/produtos');
    }
    //========================================================
    public function taxas(){
        echo view('stocks/taxas');
    }
    //========================================================

}