<?php
include_once("conexao.php");

function criaTabela() {
	$username = "adm";
	$sql = "select descr, inv_inicial, data_inicial, data_final, lucro_esperado from atividade";
	$resultado = mysqli_query($sql, $bd);
	echo "$resultado";
}
?>