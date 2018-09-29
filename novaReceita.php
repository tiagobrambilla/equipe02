<?php 
include 'validacao.php';
	$username = $_SESSION['username'];
 	$bd = mysqli_connect("localhost","root","","eq02");
	$descr = $_POST['descr'];
	$valor = $_POST['valor'];
	$result = mysqli_query($bd, "select id_atividade from atividade where username = '$username'");
	$result = $result->fetch_array();
	$id_atividade = intval($result[0]);
	$sql = "insert into receita (descr, valor, id_atividade) values('$descr', $valor, $id_atividade)";

	mysqli_query($bd, $sql);

	
    header('location:logado.php?mensagem=Dados Salvos');

?>