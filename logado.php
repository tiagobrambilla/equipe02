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
        
        <!-- Bibliotecas JavaScript que devem ser incluídas nessa ordem: jQuery.js, Popper.js e Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        <title>Software de Gestão Agricola</title>
        <meta charset="utf-8">
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
        <div style="margin-top: 2%;">
        <br><br><button class='btn btn-outline-success my-0 my-sm-0' style=" margin-left: 50px; " ><img src="img/mais.png" width="20px"> &nbsp;Nova Atividade</button>
        </div>
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
        <div id="novoGasto">
            <form action="novaReceita.php" method="post">
                Descrição da receita: <input type="text" name="descr"><br>
                Valor: <input type="number" name="valor"><br>
                <button onclick="">cancelar</button><input type="submit" name="salvar"><br>
                <p style="color: green"><?php echo $msg; ?></p>
                
            </form>
        </div>
    </body>
</html>