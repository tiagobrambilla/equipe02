<?php 
include 'validacao.php';
include 'conexao.php';
include 'funcoes.php';

$msg = '';
if (isset($_POST["escon"]))
    $id_atividade = $_POST["escon"]; 


if (isset($_POST['valor'])) {
    
    $username = $_SESSION['username'];
    $bd = mysqli_connect("localhost","root","","eq02");
    $id_atividade = $_POST['id_atividade'];
    $descr = $_POST['descr'];
    $valor = $_POST['valor'];
    $sql = "insert into receita (descr, valor, id_atividade) values('$descr', '$valor', '$id_atividade')";
    
    mysqli_query($bd, $sql);
    
    header('location: logado.php?mensagem=Dados Salvos');
}
?>	
<html>
    <head>
        <title>Receita</title>
        <meta charset="utf-8">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        
        <!-- Bibliotecas JavaScript que devem ser incluídas nessa ordem: jQuery.js, Popper.js e Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Software de Gestão Agrícola</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
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
            <fieldset style = "width: 35%; margin-left: 5%; margin-top: 10%;">
                <form action="" method="post">
                    <input type="number" name="id_atividade" id="id_atividade" hidden value="<?php echo($id_atividade); ?>">
                    <h5>Descrição da receita:</h5> <input class="form-control" type="text" name="descr"><br>
                    <h5>Valor:</h5> <input class="form-control" type="number" name="valor"><br>
                    <button class="btn btn-danger" onclick="">Cancelar</button>&nbsp;<input class="btn btn-success" type="submit" name="salvar"><br>
                    <p style="color: green; margin-top: 2%;"><?php echo $msg; ?></p>
                    
                </form>
            </fieldset>
        </center>
    </body>
</html>