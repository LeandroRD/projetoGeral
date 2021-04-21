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

  $id_produto = $data['id_produto'];
  $quantidade = $data['quantidade'];
  $observacoes = $data['observacoes'];

  //checar se quantidade é valida
  if($quantidade <1 || $quantidade >10000){
    $response['STATUS']='KO';
    $response['MESSAGEM'] = 'Quantidade inválida (entre 1 a 10.000).';
    $response['Token'] = $Token;
    echo json_encode($response);
    die();
  }

  $gestor = new cl_gestorBD();

  //verificar se o produto existe
  $params = array(
    ':id_produto' =>$id_produto
 );
 $response['RESULTS'] = $gestor->EXE_QUERY(
     "SELECT id_produto 
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
//===========================================================
//inserir linha de stock_movimentos
$params = array(
  ':id_app'=>$data['app_id'],
  ':id_produto' => $id_produto,
  ':quantidade' => $quantidade,
  ':observacoes'=> $observacoes
);


$gestor->EXE_NON_QUERY(
  "INSERT INTO stock_movimentos 
  VALUES(
  0,
  :id_app,
  :id_produto,
  :quantidade,
  :observacoes,
  0,
  'entrada',
  NOW()
  )",$params);





//===========================================================
//atualizar stock produtos
$params = array(
  ':id_produto' => $id_produto,
  ':quantidade' => $quantidade
);

$gestor->EXE_NON_QUERY("UPDATE stock_produtos
                        SET quantidade =quantidade + :quantidade,
                        atualizacao= NOW()
                        WHERE id_produto = :id_produto
                      ",$params);

$response['STATUS']='OK';
$response['MESSAGEM'] = 'SUCCESS';
//===========================================================

   //token
   $response['Token']=$Token;

   //output do endpoint
   echo json_encode($response);
   