<?php
   // incluir o init
   include('../inc/init.php');

   //checar se id_produto foi enviado
   if(!key_exists('id_produto',$data)){
      $response['STATUS']='KO';
      $response['MESSAGEM'] = 'Missing id_produto';
      $response['Token'] = $Token;
      echo json_encode($response);
      die();
    }

    //checar se quantidade foi enviada
    if(!key_exists('quantidade',$data)){
      $response['STATUS']='KO';
      $response['MESSAGEM'] = 'Necessario quantidade';
      $response['Token'] = $Token;
      echo json_encode($response);
      die();
    }

    //checar se quantidade chegou maior que zero
    if($data['quantidade'] < 1){
        $response['STATUS']='KO';
        $response['MESSAGEM'] = ' Quantidade invalida';
        $response['Token'] = $Token;
        echo json_encode($response);
        die();
    }

   $gestor = new cl_gestorBD();

   $response['STATUS']='OK';
   $response['MESSAGEM'] = 'SUCCESS';
   
   //verificar se produto existe e se existe a quantidade disponivel
   $params = array(
    ':id_produto' =>$data['id_produto']
 );
 $response['RESULTS'] = $gestor->EXE_QUERY(
     "SELECT id_produto, quantidade 
      FROM stock_produtos
      WHERE id_produto =:id_produto  
 ",$params);
 //verificar se quantidade é igual a zero
 if(count($response['RESULTS']) == 0){
    $response['STATUS']='KO';
    $response['MESSAGEM'] = ' Produto inexistente';
    $response['Token'] = $Token;
    echo json_encode($response);
    die();
}

//verificar se quantidade é suficiente para o pedido
  if($response['RESULTS'][0]['quantidade'] < $data['quantidade']){
    $response['STATUS']='KO';
    $response['MESSAGEM'] = 'Quantidade indisponível';
    $response['Token'] = $Token;
    echo json_encode($response);
    die();
}


//notes
$observacoes = '';
if(key_exists('observacoes',$data)){
  $observacoes = $data['observacoes'];
}



//buscar os dados do produto selecionado
$params = array(
  ':id_produto' =>$data['id_produto']
);
$results = $gestor->EXE_QUERY(
  "SELECT *, stock_produtos.designacao AS produto_designacao, stock_produtos.id_taxa AS produto_id_taxa
   FROM stock_produtos 
   LEFT JOIN stock_taxas 
   ON stock_produtos.id_taxa = stock_taxas.id_taxas 
   WHERE stock_produtos.id_produto = :id_produto ",$params); 



$produto = $results[0];

//calculo do valor total
$preco_total = $data['quantidade']*$produto['preco'];


//calculo do total com a taxa
if($produto['produto_id_taxa'] !=0){
  $preco_total = $preco_total * (1 + ($produto['percentagem']/100));
}

echo $preco_total;
die();

//remover do estoque

   
   
   
//    //busca a quantidade de produto no estoque
//    $params = array(
//       ':id_produto' =>$data['id_produto']

//    );
   
//    //CONCAT para concatenar dentro da Query
//    $response['RESULTS'] = $gestor->EXE_QUERY("SELECT
//       id_produto, designacao,
//       quantidade 
//    FROM stock_produtos 
   
//    WHERE id_produto = :id_produto
//    ",$params);


//    if(count($response['RESULTS'])==0){
//       $response['MESSAGE']='Produto inexistente';
//    }
   
   //token
   $response['Token']=$Token;

   //output do endpoint
   echo json_encode($response);
   