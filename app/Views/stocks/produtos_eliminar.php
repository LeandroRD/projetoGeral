<?php
	$this->extend('Layout/layout_users');

    // tratar o id do produto a editar
    helper('funcoes');
    $id_produto = aesEncrypt($produto['id_produto']);
?>

<?php $this->section('conteudo')?>
    <div class="row mt-2  ">
		<div class="col-12 text-center ">
			<h3>Produtos - Eliminar</h3>
        </div>
        <div class="col-12 mt-3">   
            <div class="card p-4 text-center bg-warning ">
<div class="row col-md-6 col-md-offset-3 card p-4 text-center vbg-warning card card-claro">            
                <h4>Tem a certeza que prentende eliminar o produto !?</h4>  
                <h3> <b><?php echo $produto['designacao'] ?></h3></b> 
                <!-- <div class="row col-md-8 col-md-offset-1"> -->
                    <div class=" col-md-10 col-md-offset-1 ">
                        <div class="col-md-5 col-md-offset-1 marg-fundo">
                            <a class=" btn cor-botao-secondary btn-200 marg-fundo" href="<?php echo site_url('stocks/produtos') ?>">Não</a>
                        </div>
                        <div class="col-md-5  ">
                            <a class=" btn btn-primary btn-200 " href="<?php echo site_url('stocks/produtos_eliminar/'.$id_produto.'/sim')?> ">Sim</a>
                        </div>
                    </div>        
                <!-- </div> -->
                
                
            </div>
        </div>
        </div>
    </div>
<?php $this->endSection()?>