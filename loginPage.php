<!DOCTYPE html>

<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <!-- Bootstrap CSS -->
    <!-- NB! Må ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/csslogin.css"/>
    
    <title>Logg inn</title>
        
    </head>
    
    <body>
    
    <?php

    session_start();
    include_once('diverse/navbarTemplate.php');
    
    if (isset($_SESSION['user'])) {
        
        header('location: forside.php');
        
    }

    ?>

    <script type="text/javascript">
        
        var removeself = document.getElementById("login");
        removeself.style.display =  "none";
        
        var removesep = document.getElementById("separator");
        removesep.style.display = "none";
        
    </script>
    
    <div class="jumbotron jumbotron-sm">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <h1 class="h1">
                        Velkommen <small>Vennligst logg inn</small></h1>
                </div>
            </div>
        </div>
    </div>
        
    <div class="container" id="loginbox">

        <form class="form-signin" action="Database/login.php" method="post">
                    <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                            </span>
                            <label for="inputEmail" class="sr-only">Email adresse</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email adresse" required autofocus>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-option-horizontal"></span>
                        </span>
                        <label for="inputPassword" class="sr-only">Passord</label>
                        <input type="password" id="passord" name="passord" class="form-control" placeholder="Passord" required>
                    </div>
                    <br>
                    
                    <div class="col-sm-12">   
                        <div class="col-sm-3"></div>    
                        <div class="col-sm-6"><button class="btn btn-lg btn-primary btn-block" type="submit" name="knappLogin">Logg inn</button></div>
                        <div class="col-sm-3"></div>
                    </div>
                        
        </form>

    </div> <!--container-->
        
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
