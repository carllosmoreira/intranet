<?php
session_start();

include 'configTeste.php';
//Receber a requisão da pesquisa 
$requestData= $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array(	
	1 => 'filial',
	2=> 'funcionario',
	3=> 'naoConformidade',
	4=> 'qtd',
	5=> 'data'
);

//Obtendo registros de número total sem qualquer pesquisa

	$result_user = "SELECT id, filial,funcionario,naoConformidade,qtd, data FROM naoconformidade";

$resultado_user =mysqli_query($con, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados

	$result_usuarios = "SELECT id, filial,funcionario,naoConformidade,qtd, data FROM naoconformidade WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa

	$result_usuarios.=" AND ( filial LIKE '%".$requestData['search']['value']."%'";
	$result_usuarios.=" OR funcionario LIKE '%".$requestData['search']['value']."%'";
	$result_usuarios.=" OR naoConformidade LIKE '%".$requestData['search']['value']."%'";
	$result_usuarios.=" OR qtd LIKE '%".$requestData['search']['value']."%'";
	$result_usuarios.=" OR data LIKE '%".$requestData['search']['value']."%' )";
}

$resultado_usuarios=mysqli_query($con, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado

$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']." ";

$resultado_usuarios=mysqli_query($con, $result_usuarios);

// Ler e criar o array de dados
function dataConvertida($dateSql){
		$ano= substr($dateSql, -10,4);
		$mes= substr($dateSql, -5,2);
		$dia= substr($dateSql, -2,2);
		return $dia."/".$mes."/".$ano;
	}
$dados = array();
while( $row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
	$dado = array();
	$acao = $acao = "<a href='edit_usuario.php?id=".$row_usuarios["id"]."' class='editar'>Editar</a> | <a href='#' data-href='deletar.php?id=".$row_usuarios["id"]."' data-toggle='modal' data-target='#confirm-delete'>Deletar</a><br>";
	
	$dado[] = $acao;

	$consultaNome = "SELECT nomeLoja FROM lojas WHERE idLoja=".$row_usuarios["filial"];
	$queryNome = mysqli_query($con, $consultaNome);
	$nome = 0;
	while ($verifica = mysqli_fetch_assoc($queryNome)) {
		$nome = $verifica['nomeLoja'];
	}
	$dado[] = $nome;

	$consultaNome = "SELECT nomeFunc FROM funcionarios WHERE idFunc=".$row_usuarios["funcionario"];
	$queryNome = mysqli_query($con, $consultaNome);
	$nome = 0;
	while ($verifica = mysqli_fetch_assoc($queryNome)) {
		$nome = $verifica['nomeFunc'];
	}
	$dado[] = $nome;
	
	$consultaNome = "SELECT nome FROM tiponaoconformidade WHERE id=".$row_usuarios["naoConformidade"];
	$queryNome = mysqli_query($con, $consultaNome);
	$nome = 0;
	while ($verifica = mysqli_fetch_assoc($queryNome)) {
		$nome = $verifica['nome'];
	}
	$dado[] = $nome;

	$dado[] = $row_usuarios["qtd"];
	$dado[] = dataConvertida($row_usuarios["data"]);

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