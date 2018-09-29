<?php 
include 'conexao.php';
include 'validacao.php';
include 'funcoes.php'; 


function desc() {
 if (isset($_POST["escon"]))
       $id_atividade = $_POST["escon"];

   		$descricao = "";
   		$username = $_SESSION['username'];
   		$sql = "select descr from atividade where id_atividade = $id_atividade";
   		$bd = mysqli_connect("localhost","root","","eq02");
   		 $resultado = mysqli_query($bd, $sql);
       
           
         while($dados = mysqli_fetch_assoc($resultado)) {
          $descricao = $descricao.$dados["descr"];
      }  
        
        return $descricao;
}

function data() {
 if (isset($_POST["escon"]))
       $id_atividade = $_POST["escon"];

   		$data = "";
   		$username = $_SESSION['username'];
   		$sql = "select data_inicial from atividade where id_atividade = $id_atividade";
   		$bd = mysqli_connect("localhost","root","","eq02");
   		 $resultado = mysqli_query($bd, $sql);
       
           
         while($dados = mysqli_fetch_assoc($resultado)) {
          $data = $data.$dados["data_inicial"];
      }  
        
        return $data;
}
function receita() {
 if (isset($_POST["escon"]))
       $id_atividade = $_POST["escon"];

   		
   		$username = $_SESSION['username'];
   		$sql = "select valor, descr from receita where id_atividade = $id_atividade";
   		$bd = mysqli_connect("localhost","root","","eq02");
   		 $resultado = mysqli_query($bd, $sql);
       
           
         while($dados = mysqli_fetch_assoc($resultado)) {
          echo "valor = ".$dados['valor']." descrição: ".$dados['descr'];
      }  
        
       
}

function gasto() {
 if (isset($_POST["escon"]))
       $id_atividade = $_POST["escon"];

   		$username = $_SESSION['username'];
   		$sql = "select valor, descr from gasto where id_atividade = $id_atividade";
   		$bd = mysqli_connect("localhost","root","","eq02");
   		$resultado = mysqli_query($bd, $sql);
       
           
         while($dados = mysqli_fetch_assoc($resultado)) {
          echo "valor = ".$dados['valor']." descrição: ".$dados['descr'];
      }  
       
}

       ?>
<!DOCTYPE html>
<html>
 <head>
        <title>Software de Gestão Agricola | Detalhes</title>
        <meta charset="utf-8">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        
        <!-- Bibliotecas JavaScript que devem ser incluídas nessa ordem: jQuery.js, Popper.js e Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="imagens/icone.jpeg" type="image/x-icon" />
        
    </head>
<body>
     
    
    <div style="max-height: 100%; margin: 1%;" id="tabela" ><table style="width: 100%;" class="table"><?php echo criaTabela2(); ?></table></div>
    
	<table class="table">
        
		<tr><td><?php echo desc(); ?></td><td><?php echo data(); ?></td><td><?php echo receita(); ?></td><td><?php echo gasto(); ?></td></tr>
		
        <tr>PRECISA BUSCAR NO BD OS RESUTADOS</tr>
		<tr>TOTAL R$:</tr>
	</table>

	

</body>

</html>