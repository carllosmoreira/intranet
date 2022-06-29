<?php
session_start();
include_once("configTeste.php");
/* Inclui bibliotecas de classes */
require_once 'classe-nao-conformidadeDAO.php';

if( isset($_GET["success"])){
	if($_GET["success"]==1){
		header("Location: nao-conformidades.php#exampleModal");
	}elseif($_GET["success"]==0){
		header("Location: nao-conformidades.php");
	}
}elseif ( !isset($_GET["success"])){
	
	if( isset($_GET["loja"]) && isset($_GET["consultor"]) && isset($_GET["nao_conformidade"]) 
	&& isset($_GET["qtd"]) && isset($_GET["data"]) ){
	
	if($_SESSION['editando'] == 0){
		$recebe = new Classe_Nao_Conformidade_DAO();
		//Preenche todos os campos do novo objeto
		$recebe->filial = $_GET["loja"];
		$recebe->funcionario = $_GET["consultor"];
		$recebe->naoConformidade = $_GET["nao_conformidade"];
		$recebe->qtd = $_GET["qtd"];
		$recebe->data = $_GET["data"];

		$recebe->inserir($recebe);
	}elseif($_SESSION['editando'] == 1){
		$result_usuario = "update naoconformidade set filial = ".$_GET["loja"].", funcionario = ".$_GET["consultor"].", naoconformidade = ".$_GET["nao_conformidade"].", qtd = ".$_GET["qtd"].", data = '".$_GET["data"]."' WHERE id=".$_SESSION['idNaoconformidade'];
		$resultado_usuario = mysqli_query($con, $result_usuario);
		if(mysqli_affected_rows($con)){
			header("Location: nao-conformidades.php");
		}else{
			header("Location: nao-conformidades.php");
		}
		unset($_SESSION['editando']);
	}
	


	}else {
		echo "<script type= 'text/javascript'>alert('Falta campo');</script>";
	}
}

?>