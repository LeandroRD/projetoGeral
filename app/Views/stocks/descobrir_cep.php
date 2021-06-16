<?php
	$this->extend('Layout/layout_users');     
?>
<?php $this->section('conteudo')?>
    <div class="row mt-2 ">
		<div class="col-12 text-center ">
			<h3>Procurar CEP:</h3>
        </div>
        <div class="  col-md-6 col-md-offset-3 marg-fundo card card-claro">
		    <div class=" container">
                <form action="<?php echo site_url('stocks/fornecedores_adicionar_cep') ?>" method="get">
                    <div class="row">
                        <!-- rua -->
                        <div class="col-md-6 col-xs-12 marg-topo-10">
                            <label for="rua">rua</label>
                            <input type="text"name="rua"id="rua2" class="form-control ">
                        </div>
                    </div>
                    <div class="row">
                        <!-- cidade -->
                        <div class=" col-md-6 col-xs-12">
                            <label for="cidade">cidade</label>
                            <input type="text"name="cidade"id="cidade2" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <!-- estado -->
                        <div class="col-md-6 col-xs-12 marg-fundo">
                            <label for="estado">estado</label>
                            <input type="text"name="estado"id="estado2"  class="form-control">
                        </div>
                    </div>
                        <!-- Botao Buscar Cep -->
                    <div class="row">
                        <div class="col-md-7 col-xs-12 marg-fundo ">
                            <button id="btnBuscarCep"class="btn-200 btn btn-primary">Buscar Cep</button>
                        </div>
                    </div>
                    
               <p id="escolha_endereco" class="cor-alerta" style="display:none; ">Escolha o endereço e confirme embaixo!!</p>
                    <ul id="listaCep">
                        </ul>

                    <div class="row">
                        <div class="col-md-6 col-xs-12 marg-fundo" >
                            <input type="text" id="cep_certo" name="cep_certo"class="form-control">
                        </div>
                    </div>
                        <!-- botao submeter -->
                    <div class="row">
                        <div class="col-md-7 col-xs-12">
                            <button class="btn btn-primary btn-200" id="btnBuscarCep"class="submit">Confirme o Cep</button>
                        </div>
                    </div>
                </form>
                    
                <!-- </a>    -->
                <h4 id="cepteste" ></h4> 
            </div>
        </div>           
    </div>   
<?php $this->endSection()?>

