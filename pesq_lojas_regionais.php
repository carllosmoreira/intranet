<?php
session_start();

include 'configTeste.php';
//Receber a requisão da pesquisa 
$requestData= $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array(
	1 => 'regionais.regional',
	2 => 'lojas.nomeLoja',
	3 => 'lojasregionais.data'
);

//Obtendo registros de número total sem qualquer pesquisa

	$result_user = "select lojasregionais.idLojasRegionais, regionais.regional, lojas.nomeLoja, lojasregionais.data from lojasregionais, regionais, lojas";

$resultado_user =mysqli_query($con, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados

	$result_usuarios = "select lojasregionais.idLojasRegionais, regionais.regional, lojas.nomeLoja, DATE_FORMAT(data, '%m%Y') as data from lojasregionais, 
	regionais, lojas where lojasregionais.regional = regionais.idRegional and lojasregionais.loja = lojas.idLoja";

if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa

	$result_usuarios.=" AND ( regionais.regional LIKE '%".$requestData['search']['value']."%'";
	$result_usuarios.=" OR lojas.nomeLoja LIKE '%".$requestData['search']['value']."%'";
	$result_usuarios.=" OR lojasregionais.data LIKE '%".$requestData['search']['value']."%' )";
}

$resultado_usuarios=mysqli_query($con, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado

$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']." ";

$resultado_usuarios=mysqli_query($con, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while( $row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {
	$opt_delete_1 = '<div class="alinhado" data-id="'.$row_usuarios["idLojasRegionais"].'"><button class="deletar" data-target="#id01" onclick="pegaID(this)';
	$opt_delete_3 = '">Deletar</button></div>';
	$dado = array();

	$tempMes = substr($row_usuarios["data"], 0, 2);
	$tempAno = substr($row_usuarios["data"], 2, 4);

	$acao = "<a href='cadastro-relacao-lojas-regionais.php?edit=true&id=".$row_usuarios["idLojasRegionais"]."&mes=".$tempMes."&ano=".$tempAno."' class='editar'>Editar</a> ";
	
	$dado[] = $acao;
	$dado[] = $row_usuarios["regional"];
	$dado[] = $row_usuarios["nomeLoja"];
	
	$dado[] = $tempMes."/".$tempAno;

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