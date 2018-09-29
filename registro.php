<?php
include_once("validacao.php");
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
        <title>Verificadorde Nota Fiscal Eletrônica</title>
        <meta charset="utf-8">
        
        
        <link rel="shortcut icon" href="imagens/icone.jpeg" type="image/x-icon" />
 
    </head>
    
    <body>
        <center>
            <h3>CADASTRO DE USUÁRIOS</h3>
            
            <fieldset class="fieldcad1">
                <legend><h5>DADOS DO USUÁRIO</h5></legend>
                
                <form action="registro.php" method="post">
                    Login <input class="cadcampo" type="text" name="username" value="<?php echo $username; ?>"><br><br>
                    Nome <input class="cadcampo" type="text" name="nome" value="<?php echo $nome; ?>"><br><br>
                    Senha <input class="cadcampo" type="password" name="password" value="<?php echo $password; ?>"><br><br>
                    <br><br>
                    <input type="submit" class="cadbotao" value="LIMPAR">
                    <input type="submit" name="acao" class="cadbotao" value="<?php echo $descr_acao; ?>">
                </form>
            </fieldset>
            <br><br>
            
            <a href="index.php"><img class="backimg" src="imagens/voltar.png"></a>
            <br>
            <?php echo $mensagem ?>
        </center>
    </body>
</html>

<?php
    
    mysqli_close($bd);
            
?>