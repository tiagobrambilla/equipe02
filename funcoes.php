<?php
function criaTabela1() {
    
    $username = $_SESSION['username'];
    $sql = "select id_atividade, descr, inv_inicial, data_inicial, data_final, lucro_esperado from atividade where username = '$username'";
    $bd = mysqli_connect("localhost","root","","eq02") or die("Not connected.");
    $resultado = mysqli_query($bd, $sql);
    while($aux = mysqli_fetch_assoc($resultado)) { 
        
        echo "<tr>
        <td><form action='novoGasto.php' method='post'> <input type='hidden' name='escon' id='escon' value='".$aux['id_atividade']."'> <input type='submit' class='btn btn-outline-success' style='margin-left: 10px;' id='botao' value='Novo Gasto'></form></td>
        <td><form action='novaReceita.php' method='post'> <input type='hidden' name='escon' id='escon' value='".$aux['id_atividade']."'> <input type='submit' class='btn btn-outline-success' style='margin-left: 10px;' id='botao' value='Nova Receita'></form></td>
        <td>".$aux['descr']."&nbsp;&nbsp;&nbsp;  </td>
        <td> Iniciado em:".$aux['data_inicial']." </td>
        <td> &nbsp;&nbsp;&nbsp;Investimento inicial:<spam style='color:red;'> R$".$aux['inv_inicial']."</spam></td>
        <td> <form action='detalhes.php' method='post'> <input type='hidden' name='escon' id='escon' value='".$aux['id_atividade']."'> <input type='submit' class='btn btn-outline-success' style='margin-left: 10px;' id='botao' value='Detalhes'></form></td>
        <td> <form action='exclui.php' method='post'> <input type='hidden' name='escon' id='escon' value='".$aux['id_atividade']."'> <input type='submit' class='btn btn-outline-success' style='margin-left: 10px;' id='botao' value='Exclui'></form></td>
        </tr>";
        
    }
}



function nome($bd, $sql) {
    $nome = "";
    
    $resultado = mysqli_query($bd, $sql);
    
    
    while($dados = mysqli_fetch_assoc($resultado)) {
        $nome = $nome.$dados["nome"];
    }  
    
    return $nome;
}




?>