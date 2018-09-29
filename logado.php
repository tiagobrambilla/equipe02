<?php
include 'funcoes.php'; 
?>
<html>
<?php
 $msg = "";
 if(isset($_GET['mensagem'])) {
 $msg = $_GET['mensagem']; 
 
}
?>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
	<title>Software de Gestão Agricola</title>
	<meta charset="utf-8">
</head>
<body>
	<?php include("navbar.php") ?>

	<br><br><button class='btn btn-outline-success my-0 my-sm-0' style="margin-left: 50px;"><img src="img/mais.png" width="20px"> &nbsp;Nova Atividade</button>
	
	<div id="tabela" style="margin: 10%;"><table><?php echo criaTabela(); ?></table></div>

	<div id="novaAtividade">
		<form action="novaAtividade.php" method="post">
			Descrição da atividade: <input type="text" name="descr"><br>
			Investimento inicial: <input type="number" name="inv_inicial"><br>
			Data de inicio: <input type="date" name="data_inicial"><br>
			Lucro Esperado: <input type="number" name="lucro_esperado"><br>
			<button onclick="">cancelar</button><input type="submit" name="salvar"><br>
			<p style="color: green"><?php echo $msg; ?></p>

		</form>
	</div>
	<div id="novoGasto">
		<form action="novoGasto.php" method="post">
			Descrição do gasto: <input type="text" name="descr"><br>
			Tipo do gasto: <select name="tipo">
				<option value="adubos">Adubos</option>
				<option value="contr">Contratação de serviços</option>
				<option value="def_agri">Defensivos agricolas</option>
				<option value="manutencao">Manutenção</option>
				<option value="outros">Outros</option>
			</select> <br>
			Valor: <input type="number" name="valor"><br>
			<button onclick="">cancelar</button><input type="submit" name="salvar"><br>
			<p style="color: green"><?php echo $msg; ?></p>

		</form>
	</div>
</html>