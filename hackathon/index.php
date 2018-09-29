<!DOCTYPE html>
<html lang="en">
    
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title>Software de Gestão Agrícola</title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        
        <!-- Bibliotecas JavaScript que devem ser incluídas nessa ordem: jQuery.js, Popper.js e Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
         
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Custom styles for this template -->
        <link href="css/scrolling-nav.css" rel="stylesheet">
        
    </head>
    
    <body id="page-top">
        
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Software de Gestão Agrícola</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div style="float: left; margin-right: -7%; ">
                    <?php
                    if ( ! isset($_GET["x"]) || $_GET["x"]=="1" ||  $login == "undefined") {
                        $aspa = '"';
                        echo "<button class='btn btn-primary' onclick=".$aspa."location.href='singin.php'".$aspa.">Login</button>
                        <button class='btn btn-primary' onclick=".$aspa."location.href='registro.php'".$aspa.">Registre-se</button>";
                        #if ( ! isset( $_SESSION["login"] ) || $login == "undefined") {
                        #header("location:index.php");
                    }else{
                        echo "<button style='color: white; background-color: black; border-color: black'>".nome($bd, "select nome from usuarios where login = '$login'")."</button>&nbsp;<button class='btn btn-primary' onclick=".$aspa."location.href='logoff.php'".$aspa.">Sair</button>";
                    }
                    ?>
                </div>
            </div>
        </nav>
        
        <header style="background-image: url('img/agro.jpg');"  class="bg-primary text-white">
            <div class="container text-center">
                <h1>Software de Gestão Agrícola</h1>
                <p class="lead">Seja bem-vindo ao Software de Gestão Agrícola</p>
            </div>
        </header>
        
        <section  id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2>Sobre</h2>
                        <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
                        <ul>
                            <li>Clickable nav links that smooth scroll to page sections</li>
                            <li>Responsive behavior when clicking nav links perfect for a one page website</li>
                            <li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the navbar</li>
                            <li>Minimal custom CSS so you are free to explore your own unique design options</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
        
        <!-- Footer -->
        <footer style="background-image: url('img/agro0.jpg');" class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
            </div>
            <!-- /.container -->
        </footer>
        
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        
        <!-- Custom JavaScript for this theme -->
        <script src="js/scrolling-nav.js"></script>
        
    </body>
    
</html>
