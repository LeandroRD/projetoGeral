<?php
	$this->extend('Layout/layout_users');
    // tratar o id do produto a editar
    // helper('funcoes');
     $id_familia = $familia;
     $designacao='';
     $parent='';

     if($_SERVER['REQUEST_METHOD']=='POST'){
        //recolhe os dados
        $designacao = $_POST['text_designacao'];
        $parent = $_POST['select_parent'];    
    }
?>

<?php $this->section('conteudo')?>
    <div class="row mt-2 col-md-6 col-md-offset-3 card card-claro">
		<div class="col-12 text-center ">
            <br>
			<h3>Confirma as alterações?  </h3>	
        </div>
        <br>
        <div class=" ">
            <form action="<?php echo site_url('stocks/familia_editar_servicos/'.$id_familia) ?>" method="post">
            <div class="row text-center ">
            <input  class="form-control" type="hidden" name="text_designacao" required value = "<?php echo $designacao?>"  >
            <input class="form-control" type="hidden" name="select_parent" required value = "<?php echo $parent?>"  >
                    <div class="row  col-md-8 col-md-offset-2">
                        <div class="marg-fundo col-md-6 ">
                            <a href="<?php echo site_url('stocks/familias') ?>" class="btn cor-botao-secondary btn-200">Não</a>                   
                        </div>
                        <div class="marg-fundo col-md-6 ">
                            <button class="btn btn-primary btn-200">Sim</button>          
                        </div>
                        
                    </div>   
                </div>
                <br>
            </form>
        </div>
    </div>
<?php $this->endSection()?>
