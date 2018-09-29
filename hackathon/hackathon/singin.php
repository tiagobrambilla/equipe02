<?php

$msg = "";

if ( isset( $_GET["mensagem"] ) )
    $msg = $_GET["mensagem"];



?>

<html>
    
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        
        <!-- Bibliotecas JavaScript que devem ser incluídas nessa ordem: jQuery.js, Popper.js e Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        
        <link rel="shortcut icon" href="imagens/icone.jpeg" type="image/x-icon" />
        
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">
                
                <a style="margin-left: -8%;" class="navbar-brand" href="index.php"><button title="Início" type="button" style="height: 60px; width: 80px; padding-top: 0px" class="btn btn-light btn-lg"><img src="img/home.png"><p>Voltar</p></button></a> 
                <a style="margin-right: 38%;" class="navbar-brand js-scroll-trigger" href="#page-top">Software de Gestão Agrícola</a>
            </div>
        </nav>
        
        
        <form action="login.php" method="post">
            
            <fieldset style = "width: 25%; margin: 0px auto; margin-top: 10%;">
                <legend><h5>IDENTIFIQUE-SE</h5></legend>
                <h5>Login</h5>
                <input class="form-control" type="text" name="username">
                <br>
                <h5>Senha</h5>
                <input class="form-control" type="password" name="password">
                <br>
                <input style="width: 100%;" class="btn btn-primary" type="submit" value="Login">
            </fieldset>
            
            <br><br>
            
            <br>
               
            <p style='background-color: transparent;' type='text' disabled class='alerta'><?php echo $msg?> </p>";
            
            
            
        </form>  
        
        
    </body>
</html>
