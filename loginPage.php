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
    
    ?>
        
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container" id="c1">
            <div class="navbar-header">
                <a class="navbar-brand " href="">Hjem</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="form.php">Arrangementer</a></li>
                </ul>
                
                <div class="dropdown">
                    
                    <ul class="nav navbar-nav" style="float:right;">
  
                        <li role="presentation" class="dropdown" >
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                              Bruker <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="registrerBruker.php">Registrer deg</a></li>
                                <li><a href="#">Logg inn</a></li>
                                <li><a href="oppdaterInfo.php">Oppdater informasjon</a></li>
                                <li><a href="admin.php">Admin</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="logout.php">Logg ut</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </nav>
    
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
            
                    <label for="inputEmail" class="sr-only">Email adresse</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email adresse" required autofocus>
                    <br>
                    <label for="inputPassword" class="sr-only">Passord</label>
                    <input type="password" id="passord" name="passord" class="form-control" placeholder="Passord" required>
                    
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="remember-me"> Husk meg
                        </label>
                    </div>
                    
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
