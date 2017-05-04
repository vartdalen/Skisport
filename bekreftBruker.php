<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <!-- NB! MÃ¥ ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/cssformConfirm.css"/>
    
    <title>Bekreft Informasjon</title>

  </head>

  <body onload="submitToDb()">
      
        <?php
            
        session_start();
        
        include 'classes.php';
        
        //lager sessionvariabler 
        $_SESSION["fornavn"] = $_POST["fornavn"];
        $_SESSION["etternavn"] = $_POST["etternavn"];
        $_SESSION["email"] = $_POST["email"];

        $fornavn = $_SESSION["fornavn"];
        $etternavn =  $_SESSION["etternavn"];
        $email = $_SESSION["email"];
            
        if($_REQUEST["knappBekreft"]) {

            $bruker = new bruker();
            $bruker->set_fornavn($_REQUEST["fornavn"]);
            $bruker->set_etternavn($_REQUEST["etternavn"]);
            $bruker->set_email($_REQUEST["emailBekreft"]);
            $bruker->set_passord($_REQUEST["passordBekreft"]);
            $bruker->skriv_bruker_til_fil();

        }
                
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
                                <li><a href="login.html">Logg inn</a></li>
                                <li><a href="oppdaterInfo.php">Oppdater informasjon</a></li>
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
      
    <div class="jumbotron jumbotron-sm">
              <div class="container">
                  <div class="row">
                      <div class="col-sm-12 col-lg-12">
                          <h1 class="h1">
                              Registrer deg <small>Bekreft Informasjon</small></h1>
                      </div>
                  </div>
              </div>
     </div>
      
      <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="well well-sm">
                            <form name="formBekreftelse" id="formBekreftelse" action="" method="post">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="fornavn">
                                                Fornavn</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="text" class="form-control" name="fornavn" value="<?php echo $fornavn; ?>" disabled/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="etternavn">
                                                Etternavn</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="text" class="form-control" name="etternavn" value="<?php echo $etternavn; ?>" disabled/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">
                                                Email Adresse</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                                </span>
                                                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" disabled/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
<!--                                        <button type="submit" class="btn btn-primary pull-right" name="knappBekreft" onclick="createlist()">
                                            Bekreft</button>-->

                                        <span id="test" class="btn btn-primary pull-right" onclick="createlist()">test</span>
                                        <span id="test2" class="btn btn-primary pull-right" onclick="submitToDb()">test2</span>
                                        <span id="test2" class="btn btn-primary pull-right" onclick="ajax()">test3</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <form>
                        <legend><span class="glyphicon glyphicon-globe"></span> Kundeservice</legend>
                        <address>
                            <strong>Carlo & Co, Inc.</strong><br>
                            Pilestredet 35, HÃ¸gskolen i Oslo og Akershus<br>
                            Oslo, Akershus<br>
                            Telefon: 696 96 969
                        </address>
                        <address>
                            <strong>Carlo Hoa Ngyuen</strong><br>
                            <a href="mailto:#">carlohoa@gmail.com</a>
                        </address>
                        </form>
                    </div>
                </div>
            </div>
      
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>