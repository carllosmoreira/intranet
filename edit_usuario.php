<?php
session_start();
include_once("configTeste.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM naoconformidade WHERE id = '$id'";
$resultado_usuario = mysqli_query($con, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

header("Location: nao-conformidades.php?id=".$id."&filial=".$row_usuario['filial']."&func=".$row_usuario['funcionario']."&edit=1&conform=".$row_usuario['naoConformidade']."&qtd=".$row_usuario['qtd']."&data=".$row_usuario['data']);
?>