<!DOCTYPE html>
<html>
<?php
include 'validacao.php';
include 'funcoes.php';
include 'conexao.php'; 


?>
<html>
    <?php
    $msg = "";
    if(isset($_GET['mensagem'])) {
        $msg = $_GET['mensagem']; 
        
    }
    ?>
    <head>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
         <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <!-- Bibliotecas JavaScript que devem ser incluídas nessa ordem: jQuery.js, Popper.js e Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        <link href="css/estilos.css"  rel="stylesheet">
        
        <title>Software de Gestão Agricola</title>
        <meta charset="utf-8">
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">
                <a style="margin-left: -8%;" class="navbar-brand" href="logado.php"><button title="Início" type="button" style="height: 60px; width: 80px; padding-top: 0px" class="btn btn-light btn-lg"><img src="img/home.png"><p>Voltar</p></button></a>
                <a style="margin-left: 8%;" class="navbar-brand js-scroll-trigger" href="#page-top">Software de Gestão Agrícola</a>
                <div style="float: left; margin-right: -7%; ">
                    <?php
                    
                    
                    if ( ! isset( $_SESSION["username"] ) || $username == "undefined") {
                        header("location:index.php");
                    }else{
                        $aspa = '"';
                        echo "<spam style='color:white;'>".nome($bd, "select nome from login where username = '$username'")."</spam>&nbsp;&nbsp;&nbsp;<button class='btn btn-primary' onclick=".$aspa."location.href='logoff.php'".$aspa.">Sair</button>";
                    }
                    ?>
                </div>
            </div>
        </nav>
        
        <center>
     <div style="margin-top: 10%;">
     	<table style="width: 30%;" class="table table-striped">
     		<tr><td><h5>Tipo</h5></td><td><h5>Valor Total</h5></td></tr>
     		<tr><td><b>Adubos</b></td><td>R$<?php echo consulta("select valor from gasto, atividade, login where gasto.id_atividade = atividade.id_atividade and login.username = atividade.username and tipo = 'adubos' and login.username = '$username';")?>,00</td></tr>
     		<tr><td><b>Contratação de Serviços</b></td><td>R$<?php echo consulta("select valor from gasto, atividade, login where gasto.id_atividade = atividade.id_atividade and login.username = atividade.username and tipo = 'contr' and login.username = '$username';")?>,00</td></tr>
     		<tr><td><b>Defensivos Agricolas</b></td><td>R$<?php echo consulta("select valor from gasto, atividade, login where gasto.id_atividade = atividade.id_atividade and login.username = atividade.username and tipo = 'def_agri'  and login.username = '$username';")?>,00</td></tr>
     		<tr><td><b>Manutenção</b></td><td>R$<?php echo consulta("select valor from gasto, atividade, login where gasto.id_atividade = atividade.id_atividade and login.username = atividade.username and tipo = 'manutencao' and login.username = '$username';")?>,00</td></tr>
     		<tr><td><b>Investimento</b></td><td>R$<?php echo consulta("select valor from gasto, atividade, login where gasto.id_atividade = atividade.id_atividade and login.username = atividade.username and tipo = 'invest' and login.username = '$username';")?>,00</td></tr>
     		<tr><td><b>Outros</b></td><td>R$<?php echo consulta("select valor from gasto, atividade, login where gasto.id_atividade = atividade.id_atividade and login.username = atividade.username and tipo = 'outros' and login.username = '$username';")?>,00</td></tr>
     	</table>
        
</div>
      </center>   
</body>
</html>