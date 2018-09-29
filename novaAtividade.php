<?php 
include 'conexao.php';
 	$bd = mysqli_connect("localhost","root","usbw","eq02");
	$descr = $_POST['descr'];
	$inv_inicial = $_POST['inv_inicial'];
	$data_inicial = $_POST['data_inicial'];
	$lucro_esperado = $_POST['lucro_esperado'];
	$sql = "insert into atividade (descr, inv_inicial, data_inicial, lucro_esperado) values('$descr', $inv_inicial, '$data_inicial', $lucro_esperado) ";

	mysqli_query($bd, $sql);

	header('location:logado.php?mensagem=Dados salvos');


?>