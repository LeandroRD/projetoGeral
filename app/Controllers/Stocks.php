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
            $resultado = $model->check_other_family($request->getPost('text_designacao'),$id_familia);
            if($resultado){
                $error = 'Já existe outra família com a mesma desigção!!';
            }
            //atualizar os dados da familia na BD 
            if($error ==''){
                $model -> family_edit($id_familia);
                $data['success']= "Familia atualizada com sucesso !!";
                //redirecionamento para stock/familias
                return redirect()->to(site_url('stocks/familias'));
            }else{
                $data['error'] = $error;
            }  
        }   
        echo view('stocks/familias_editar',$data);

    }
    //========================================================
    public function familia_eliminar($id_familia,$resposta = 'nao'){
        $model = new StocksModel();
        $data['familia']=$model->get_family($id_familia);
        if($resposta=='sim'){
            //Eliminacao da familia
            $model->delete_family($id_familia);
            //redirecionamento para stock/familias
            return redirect()->to(site_url('stocks/familias'));
        }
        
        echo view('stocks/familias_eliminar',$data);

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

        //carregar os produtos existentes
        //carregar os dados da familias para passar a View
        $model = new StocksModel();
        $data['produtos']= $model->get_all_products();
         echo '<pre>';
         print_r($data['produtos']);
         echo '</pre>';
        die();

        echo view('stocks/produtos', $data);
    }
    //========================================================
    public function taxas(){
        //carregar os dados das taxas para passar a View
        $model = new StocksModel();
        $data['taxas']= $model->get_all_taxes();
        echo view('stocks/taxas',$data);
    }
    //========================================================
   public function taxas_adicionar(){
        $error = '';
        $model = new StocksModel();
        //Data = array vazio
        $data = array();
        //adicionar nova taxa
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();
            
            //confirmar se ja existe a taxa com o mesmo nome
            $resultado = $model->check_tax($request->getPost('text_designacao'));
            if($resultado){
                $error = 'Já existe uma taxa com a mesma desigção!!';
            }
            //guardar a nova taxa na base de dados e trata erro
            if($error ==''){
                $model -> tax_add();
                $data['success']= "Taxa adicionada com sucesso";
            }else{
                $data['error'] = $error;
            }  
        }   
        
        echo view('stocks/taxas_adicionar',$data);
   }
    //========================================================
    public function taxas_editar($id_taxa){
        
        //editar taxa
        // carregar os dados das taxas para passar a View
        $model = new StocksModel();
        $data['taxa']=$model->get_tax($id_taxa);
        $error = '';

        if($_SERVER['REQUEST_METHOD']=='POST'){

            //vamos buscar a submissao pelo formulario
            $request = \Config\Services::request();
            
            //confirmar se ja existe a taxa com o mesmo nome
            $resultado = $model->check_other_tax($request->getPost('text_designacao'),$id_taxa);
            if($resultado){
                $error = 'Já existe outra taxa com a mesma desigção!!';
            }
            //atualizar os dados da taxa na BD 
            if($error ==''){
                $model -> tax_edit($id_taxa);
                
                //redirecionamento para stock/familias
                return redirect()->to(site_url('stocks/taxas'));
            }else{
                $data['error'] = $error;
            }  
        }   
        echo view('stocks/taxas_editar',$data);
    }
    //========================================================
    public function taxas_eliminar($id_taxa,$resposta = 'nao'){
        $model = new StocksModel();
        $data['taxa']=$model->get_tax($id_taxa);
        if($resposta=='sim'){
            //Eliminacao da familia
            $model->delete_tax($id_taxa);
            //redirecionamento para stock/familias
            return redirect()->to(site_url('stocks/taxas'));
        }
        
        echo view('stocks/taxas_eliminar',$data);
    }
    //========================================================  
}