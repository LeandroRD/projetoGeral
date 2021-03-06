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
        $error = '';

        if($_SERVER['REQUEST_METHOD']=='POST'){

            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();
            
            //confirmar se ja existe a familia com o mesmo nome
            $resultado = $model->check_family($request->getPost('text_designacao'));
            if($resultado){
                $error = 'Já existe uma família com a mesma desigção!!';
            }
            //guardar na base de dados e trata erro
            if($error ==''){
                $model -> family_add();
                $data['success']= "Familia adicionada com sucesso";
                //para atualizar a lista de familias
                $data['familias']= $model->get_all_families();
            }else{
                $data['error'] = $error;
            }  
        }   
        echo view('stocks/familias_adicionar',$data);
    }
    //========================================================
    public function familia_editar($id_familia){
        //editar familia
        // carregar os dados das familias para passar a View
        $model = new StocksModel();
        $data['familias']= $model->get_all_families();
        $data['familia']=$model->get_family($id_familia);

   

        $error = '';

        if($_SERVER['REQUEST_METHOD']=='POST'){

            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();
            
            //confirmar se ja existe a familia com o mesmo nome
            // $resultado = $model->check_family($request->getPost('text_designacao'));
            // if($resultado){
            //     $error = 'Já existe uma família com a mesma desigção!!';
            // }
            //atualizar os dados da familia na BD 
            if($error ==''){
                $model -> family_edit($id_familia);
                $data['success']= "Familia atualizada com sucesso !!";
                //redirecionamento para stock/familias
            }else{
                $data['error'] = $error;
            }  
        }   
        echo view('stocks/familias_editar',$data);

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
   
}