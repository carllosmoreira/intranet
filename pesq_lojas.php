<?php
session_start();

include 'configTeste.php';
//Receber a requisão da pesquisa 
$requestData= $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array(	
	1 => 'nomeLoja',
	2 => 'AGLoja',
	3 => 'cnpjLoja'
);

//Obtendo registros de número total sem qualquer pesquisa

	$result_user = "SELECT idLoja, nomeLoja, AGLoja, cnpjLoja FROM lojas";

$resultado_user =mysqli_query($con, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados

	$result_usuarios = "SELECT idLoja, nomeLoja, AGLoja, cnpjLoja FROM lojas WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa

	$result_usuarios.=" AND ( nomeLoja LIKE '%".$requestData['search']['value']."%'";
	$result_usuarios.=" AND ( AGLoja LIKE '%".$requestData['search']['value']."%'";
	$result_usuarios.=" AND ( cnpjLoja LIKE '%".$requestData['search']['value']."%' )";
}

$resultado_usuarios=mysqli_query($con, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado

$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']." ";

$resultado_usuarios=mysqli_query($con, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while( $row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {
	$opt_delete_1 = '<div class="alinhado" data-id="'.$row_usuarios["idLoja"].'"><button class="deletar" data-target="#id01" onclick="pegaID(this)';
	$opt_delete_3 = '">Deletar</button></div>';
	$dado = array();
	$acao = "<a href='cadastro-loja.php?edit=true&id=".$row_usuarios["idLoja"]."' class='editar'>Editar</a> ".$opt_delete_1.$opt_delete_3;
	
	$dado[] = $acao;
	$dado[] = $row_usuarios["nomeLoja"];
	$dado[] = $row_usuarios["AGLoja"];
	$dado[] = $row_usuarios["cnpjLoja"];

	$dados[] = $dado;
}


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json