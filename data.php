<?php
session_start();

	require 'DbConnect.php';

	if(isset($_POST['aid'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM funcionarios WHERE idLojaFunc = " . $_POST['aid']);
		$stmt->execute();
		$consultor = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($consultor);
	}

 ?>