<?php 
    include 'validacao.php';
 	$bd = mysqli_connect("localhost","root","","eq02");
 	$username = $_SESSION['username'];
	$descr = $_POST['descr'];
	$tipo = $_POST['tipo'];
	$valor = $_POST['valor'];
	$result = mysqli_query($bd, "select id_atividade from atividade where username = '$username'");
	$result = $result->fetch_array();
	$id_atividade = intval($result[0]);
	$sql = "insert into gasto (descr, tipo, valor, id_atividade) values('$descr', '$tipo', '$valor', '$id_atividade')";
	
	mysqli_query($bd, $sql);

	header('location: logado.php?mensagem=Dados salvos');
    


?>