<?php


function criaTabela() {
	$username = $_SESSION['username'];
	$sql = "select descr, inv_inicial, data_inicial, data_final, lucro_esperado from atividade where username = '$username'";
	$bd = mysqli_connect("localhost","root","","eq02") or die("Not connected.");
	$resultado = mysqli_query($bd, $sql);
	 while($aux = mysqli_fetch_assoc($resultado)) { 
	 
	 echo "<tr>
     <td><a href='#novoGasto'> <button class='btn btn-outline-success' style='margin-left: 10px;'><img src='img/mais.png' width='20px'> &nbsp;Novo Gasto</button></a>
     <a href='#novaReceita'> <button  class='btn btn-outline-success' style='margin-left: 5px;'><img src='img/mais.png' width='20px'> &nbsp;Nova Receita</button></a></td>
     <td>".$aux['descr']."&nbsp;&nbsp;&nbsp;  </td>
     <td> Iniciado em:".$aux['data_inicial']." </td>
     <td> &nbsp;&nbsp;&nbsp;Investimento inicial:<spam style='color:red;'> R$".$aux['inv_inicial']."</spam></td>
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