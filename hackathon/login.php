<?php
   include_once("validacao.php");
   include_once("conexao.php");
   
   if ( isset($_POST["username"]) )
      $username = $_POST["username"];
   else
      $username = "";
   
   if ( isset($_POST["password"]) )
      $password = $_POST["password"];
   else
      $password = "";

   $sql = "select nome from login where username = '$username' and password = '$password' ";

   $resultado = mysqli_query($bd,$sql);

   if ( mysqli_num_rows($resultado) == 1 ) {

      $dados = mysqli_fetch_assoc($resultado);

      session_start();
        
      $_SESSION["username"] = $username;
 
      header("location: logado.php");
      
   }else 
       header("location: singin.php?mensagem=SENHA OU LOGIN INCORRETOS!");
     

?>


















