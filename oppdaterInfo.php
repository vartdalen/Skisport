<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <!-- NB! Må ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
<!--    <link rel="stylesheet" type="text/css" href="css/"/>-->
          
    <title>Brukerinformasjon</title>

  </head>

  <body>
      
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
                                <li><a href="login.html">Logg inn</a></li>
                                <li><a href="#.php">Oppdater informasjon</a></li>
                                <li><a href="admin.php">Admin</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Logg ut</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                </div>
            </div><!--navbar collapse-->
        </div>
    </nav>
      
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>