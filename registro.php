<?php

include_once("conexao.php");

$mensagem = "";

$username = "";
$nome = "";
$password = "";


if ( ! isset($_POST["acao"]) )
    $descr_acao = "CADASTRAR";
else {
    $acao = $_POST["acao"];
    
    if (strtoupper($acao) == "CADASTRAR" || strtoupper($acao) == "CADASTRAR") {
        
        $username = mysqli_real_escape_string($bd, $_POST["username"]);
        $nome = mysqli_real_escape_string($bd, $_POST["nome"]);  
        $password = mysqli_real_escape_string($bd, $_POST["password"]);
        
    }  
    
    if (strtoupper($acao) == "CADASTRAR") {
        
        $sql = "insert into login (username, nome, password)
        values ('$username', '$nome', '$password')";
        
        if (! mysqli_query($bd, $sql)) {
            if (mysqli_errno($bd) == 1062)
                $mensagem = "<p style='color: red;'>O Nome de usuário informado '$username' já existe, tente outro!</p>";
            else
                $mensagem = "<h3 style='color: red;'>OCORREU UM ERRO AO INSERIR OS DADOS</h3>
                <h3>Erro: ".mysqli_error($bd)."</h3>
                <h3>Código: ".mysql_errno($bd)."</h3>";
            
            $descr_acao = "CADASTRAR";
        } else{
            $descr_acao = "CADASTRAR";
            $mensagem = "<p style='color: green;'>Cadastro efetuado com sucesso!</p><br>";
        }
    }
    
    if (strtoupper($acao) == "CADASTRAR") {
        
        $descr_acao = "CADASTRAR";
        
        $sql = " update login
        set
        nome = '$nome',
        password = '$password'
        where
        username = '$username' ";
        
        if ( ! mysqli_query($bd, $sql) ){
            $mensagem = "<h3 style='color: red;'>Ocorreu um erro ao alterar os dados</h3>
            <h3>".mysqli_error($bd)."</h3>".$sql."<h4>".mysqli_errno($bd)."</h4>";
        }else{
            $mensagem = "<p style='color: green;'>Dados cadastrados com sucesso!</p>";
        }
    }
    
    
    if (strtoupper($acao) == "BUSCAR") {
        
        $username = $_POST["username"];
        
        $descr_acao = "CADASTRAR";
        
        $sql = "select username, nome, password
        from login
        where username = '$username'"; 
        
        $resultado = mysqli_query($bd, $sql);
        
        if (mysqli_num_rows($resultado) == 1) {
            
            $dados = mysqli_fetch_assoc($resultado);
            
            $login = $dados["username"];
            $nome = $dados["nome"];
            $senha = $dados["password"];
        }
    }
}

 
?>

<html>
    
    <head>
        <title>Registrar</title>
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
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">
                
                <a style="margin-left: -8%;" class="navbar-brand" href="index.php"><button title="Início" type="button" style="height: 60px; width: 80px; padding-top: 0px" class="btn btn-light btn-lg"><img src="img/home.png"><p>Voltar</p></button></a> 
                <a style="margin-right: 39%;" class="navbar-brand js-scroll-trigger" href="#page-top">Software de Gestão Agrícola</a>
            </div>
        </nav>
        
        
        <center>
            <h3>CADASTRO DE USUÁRIOS</h3>
            
            <fieldset style = "width: 25%; margin: 0px auto; margin-top: 10%;">
                <legend><h5>DADOS DO USUÁRIO</h5></legend>
                
                <form action="registro.php" method="post">
                    <h5>Login</h5> <input class="form-control" type="text" name="username" value="<?php echo $username; ?>"><br>
                    <h5>Nome</h5> <input class="form-control" type="text" name="nome" value="<?php echo $nome; ?>"><br>
                    <h5>Senha</h5> <input class="form-control" type="password" name="password" value="<?php echo $password; ?>"><br>
        
                    <input type="submit" class="btn btn-primary" value="LIMPAR">
                    <input type="submit" name="acao" class="btn btn-primary" value="<?php echo $descr_acao; ?>">
                </form>
            </fieldset>
           
            <br>
            <?php echo $mensagem ?>
        </center>
    </body>
</html>

<?php
    
    mysqli_close($bd);
            
?>