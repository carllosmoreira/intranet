<?php
session_start();

include_once("configTeste.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	
		$result_usuario = "DELETE FROM naoconformidade WHERE id='$id'";
		$resultado_usuario = mysqli_query($con, $result_usuario);
		if(mysqli_affected_rows($con)){
			header("Location: nao-conformidades.php");
		}else{
			header("Location: nao-conformidades.php");
		}
		unset($_SESSION['editando']);
	
}else{
	header("Location: nao-conformidades.php");
}
