<?php 
include 'conexao.php';
include 'validacao.php';
 	$bd = mysqli_connect("localhost","root","usbw","eq02");
	$descr = $_POST['descr'];
	$username = $_SESSION['username'];
	$inv_inicial = $_POST['inv_inicial'];
	$data_inicial = $_POST['data_inicial'];
	$lucro_esperado = $_POST['lucro_esperado'];
	$sql = "insert into atividade (descr, inv_inicial, data_inicial, lucro_esperado, username) values('$descr', $inv_inicial, '$data_inicial', $lucro_esperado, '$username') ";

	mysqli_query($bd, $sql);

	header('location:logado.php?mensagem=Dados salvos');



?>