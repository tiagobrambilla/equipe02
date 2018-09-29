<nav class="navbar navbar-dark" style="background-color: black;">
	
          <a class="navbar-brand" href="index.html" style="color: #77bb00;">Software de Gestão Agricola</a>

          <div> 
      <?php
      if ( ! isset($_GET["x"]) || $_GET["x"]=="1" ||  $login == "undefined") {
        $aspa = '"';
     echo "<button class='btn btn-outline-success my-0 my-sm-0' onclick=".$aspa."location.href='singin.php'".$aspa.">Login</button>
                    <button class='btn btn-outline-success my-0 my-sm-0' onclick=".$aspa."location.href='registro.php'".$aspa.">Registre-se</button>";
                    #if ( ! isset( $_SESSION["login"] ) || $login == "undefined") {
                 #header("location:index.php");
                  }else{
                    echo "<button style='color: white; background-color: black; border-color: black'>".nome($bd, "select nome from usuarios where login = '$login'")."</button>&nbsp;<button class='btn btn-outline-success my-0 my-sm-0' onclick=".$aspa."location.href='logoff.php'".$aspa.">Sair</button>";
                  }
                 ?>
                </div>
                	
      </nav>