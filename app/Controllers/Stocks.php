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
        //adicionar nova familia

        

        // carregar os dados das familias para passar a View
        $model = new StocksModel();
        $data['familias']= $model->get_all_families();
        if($_SERVER['REQUEST_METHOD']=='POST'){

            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();
            $id_parent = $request->getPost('select_parent');
            $designacao = $request->getPost('text_designacao');

            $this->verDados(array($id_parent,$designacao));
            // echo $id_parent,'<br>';
            // echo $designacao;
            // helper('funcoes');
           
            die();
        }
        echo view('stocks/familias_adicionar',$data);

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
    private function verDados($array){
        echo '<pre>';
        echo'dados do array';
        foreach ($array as $key => $value) {
            echo '<p> $key => '.$value.'</p>';
        }

        echo '</pre>';
        die();
    }
}