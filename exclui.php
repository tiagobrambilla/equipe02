<?php 
include 'validacao.php';
                   
 
if (isset($_POST['escon'])) {

	$username = $_SESSION['username'];
 	$bd = mysqli_connect("localhost","root","","eq02");
 	$id_atividade = $_POST['escon'];
	$sql1 = "delete from gasto where id_atividade = $id_atividade";
	$sql2 = "delete from receita where id_atividade = $id_atividade";
	$sql3 = "delete from atividade where id_atividade = $id_atividade";
	mysqli_query($bd, $sql1);
	mysqli_query($bd, $sql2);
	mysqli_query($bd, $sql3);
}
header("location:logado.php")
?>