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

function criaTabela2() {
   if (isset($_POST["escon"]))
       $id_atividade = $_POST["escon"]; 
    $username = $_SESSION['username'];
    $sql = "select valor, descr from gasto where id_atividade = $id_atividade";
    $sql2 = "select valor, descr from receita where id_atividade = $id_atividade";
    $bd = mysqli_connect("localhost","root","","eq02") or die("Not connected.");
    $resultado2 = mysqli_query($bd, $sql2);
    $resultado = mysqli_query($bd, $sql);
    
    for ($i=0; $i < 10; $i++) { 
        
   
    $aux = mysqli_fetch_assoc($resultado);
         echo "<tr>";
        echo "
        <td style='border: none;'>".$aux['descr']."</td>
        <td style='border: none; color: red;'> ".$aux['valor']."</td>
        ";
       
      $aux2 = mysqli_fetch_assoc($resultado2);
        echo "
        <td style='border: none;'>".$aux2['descr']."</td>
        <td style='border: none; color: green;'> ".$aux2['valor']."</td>";
        echo "</tr>";
     }
    
}


function soma() {
    if (isset($_POST["escon"]))
        $id_atividade = $_POST["escon"]; 
    $somaGasto = 0;
    $somaReceita = 0;
    $username = $_SESSION['username'];
    $sql = "select valor, descr from gasto where id_atividade = $id_atividade";
    $sql2 = "select valor, descr from receita where id_atividade = $id_atividade";
    $sql3 = "select inv_inicial from atividade where id_atividade = $id_atividade";
    $in = 0;
    $bd = mysqli_connect("localhost","root","","eq02") or die("Not connected.");
    $resultado3 = mysqli_query($bd, $sql3);
    
    
    while($dados = mysqli_fetch_assoc($resultado3)) {
        $in = $in+$dados["inv_inicial"];
    }  
    
    
    $resultado2 = mysqli_query($bd, $sql2);
    $resultado = mysqli_query($bd, $sql);
    while ($aux = mysqli_fetch_assoc($resultado)) {
        $somaGasto = $somaGasto+$aux['valor'];
    }
    while ($aux2 = mysqli_fetch_assoc($resultado2)) {
        $somaReceita = $somaReceita+$aux2['valor'];
    }
    
    $total = $somaReceita - $somaGasto - $in;
    if ($total >= 0) {
        $totalc = "<spam style='color:green;'>R$ ".$total.",00</spam>";
     } else {
        $totalc = "<spam style='color:red;'>R$ ".$total.",00</spam>";
     }
     return $totalc;
}

function in() {
    if (isset($_POST["escon"]))
        $id_atividade = $_POST["escon"]; 
    $username = $_SESSION['username'];
    
    $sql3 = "select inv_inicial from atividade where id_atividade = $id_atividade";
    $in = 0;
    $bd = mysqli_connect("localhost","root","","eq02") or die("Not connected.");
    $resultado3 = mysqli_query($bd, $sql3);
    
    while($dados = mysqli_fetch_assoc($resultado3)) {
        $in = $in+$dados["inv_inicial"];
    }  
    
    
    return $in;
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
            <div style="margin-top: 7%;">
                <table style="width: 50%;" class="table">
                    
                    <tr><td style="text-align: center; border: none;" colspan="4"><b>Descrição da Atividade:</b> <?php echo desc(); ?>&nbsp;&nbsp; <b>Data de Início:</b> <?php echo data(); ?></td></tr>
                    <tr><th style='text-align: center; border: none;' colspan="2">Gastos:</th><th style='text-align: center; border: none;' colspan="2">Receitas:</th> </tr>
                    <tr><td style="border: none;" ><b>Descrição</b></td><td style="border: none;"><b>Valor R$</b></td><td style="border: none;"><b>Descrição</b></td><td style="border: none;"><b>Valor R$</b></td></tr>
                    
                    <?php echo criaTabela2(); ?>
                    <tr><td colspan="2"><b> Investiento Inicial:</b><spam style='color:red;'>&nbsp;R$&nbsp;<?php echo in(); ?>,00</spam></td><td colspan="2"><b>TOTAL:</b> &nbsp;<?php echo soma(); ?></td></tr>
                    
                </table>
            </div>
            
        </center>
        
    </body>
    
</html>