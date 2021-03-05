<?php namespace App\Controllers;
use App\Models\StocksModel;
use CodeIgniter\Controller;

class Stocks extends BaseController{
    //========================================================
    public function index(){
        echo view('stocks/main');
    }
    //========================================================
    public function familia_adicionar(){
        echo "familia_adicionar";

    }
    //========================================================
    public function familia_editar($id_familia){
        echo "familia_editar";

    }
    //========================================================
    public function familia_eliminar($id_familia){
        echo "familia_eliminar";

    }
    //========================================================
    public function familias(){
        //carregar os dados da familias para passar a View
        $model = new StocksModel();
        $data['familias']= $model->get_all_families();

       
        // echo '<pre>';
        //     print_r($data['familias']);
        // echo '</pre>';
        // die();
        echo view('stocks/familias',$data);
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