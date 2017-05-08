<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <!-- NB! Må ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
<!--    <link rel="stylesheet" type="text/css" href="css/"/>-->
          
    <title>placeholder</title>

  </head>

  <body>
      
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container" id="c1">
          <div class="navbar-header">
              <a class="navbar-brand " href="forside.php">Hjem</a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <?php

                    if(isset($_SESSION['user'])) { 

                    echo "<li><a href='form.php'>Påmelding</a></li>";

                    }
                    
                ?>
              </ul>

              <div class="dropdown">

                  <ul class="nav navbar-nav" style="float:right;">

                      <li role="presentation" class="dropdown" >
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Bruker <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                              <?php

                                  if(!isset($_SESSION['user'])) { 

                                  echo "<li><a href='registrerBruker.php'>Registrer deg</a></li>";

                                  }

                              ?>

                            <?php

                                if(isset($_SESSION['user'])) { 

                                echo "<li><a href='oppdaterInfo.php'>Påmelding</a></li>";

                                }

                            ?>
                              <?php

                                if(isset($_SESSION['user'])) { 

                                echo "<li><a href='admin.php'>Påmelding</a></li>";

                                }

                            ?>
                              <li role="separator" class="divider"></li>

                              <?php

                                  if(isset($_SESSION['user'])) {

                                  echo "<li><a href='logout.php'>Logg ut</a></li>";

                                  } else {

                                  echo "<li><a href='loginPage.php'>Logg inn</a></li>";

                                  }

                              ?>
                          </ul>
                      </li>
                  </ul>

              </div>

      </div>
    </nav>
    
    <?php
    
    session_start();
    
    if (isset($_SESSION['user'])) {
        
    session_destroy();   
    echo "<br/><br/><br/><br/>"."Du er nå logget ut";
    
    } else {
        
        echo "<br/><br/><br/><br/>"."hold kjeft";
        
    }
    
    ?>
      
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html><?php