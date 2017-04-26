<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <!-- NB! Må ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/cssformConfirm.css"/>
    
    <script type="text/javascript" src="js/formConfirm.js"></script>
          
    <title>Bekreft Informasjon</title>

  </head>

  <body>
      
        <?php
            //lager sessionvariabler
            session_start();
            $_SESSION["fornavn"] = $_POST["fornavn"];
            $_SESSION["etternavn"] = $_POST["etternavn"];
            $_SESSION["email"] = $_POST["email"];
            
            $_SESSION["listSize"] = $_POST["ls"];
            
            
            $fornavn = $_SESSION["fornavn"];
            $etternavn =  $_SESSION["etternavn"];
            $email = $_SESSION["email"];
            
            $listSize = $_SESSION["listSize"];
            
        ?>
      
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container" id="c1">
            <div class="navbar-header">
                <a class="navbar-brand " href="">Hjem</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="form.php">Arrangementer</a></li>
                    <li><a href="login.html">Admin</a></li>
                </ul>
                
                <ul style="float: right" class="nav navbar-nav">
                    <li id="loggav"><a href="#loggav">Logg av</a></li>
                </ul>
            </div>
        </div>
    </nav>
      
    <div class="jumbotron jumbotron-sm">
              <div class="container">
                  <div class="row">
                      <div class="col-sm-12 col-lg-12">
                          <h1 class="h1">
                              Arrangementer <small>Bekreft Informasjon</small></h1>
                      </div>
                  </div>
              </div>
     </div>
      
      <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="well well-sm">
                            <form name="formRegistrering" id="formRegistrering" action="formConfirm.php" method="post">
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

                                    <div class="col" id="col2col2">
                                        <div class="col-md-2">
                                        </div>
                                    </div>

                                    <div class="col-md-5" id="listContainer">

                                        

                                    </div>

                                    <div class="col-md-12">
                                        <ul class="list-group" id="eventListe">
                                        </ul>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary pull-right" name="knappBekreft" onclick="createlist()">
                                            Bekreft</button>
<!--                                        <span id="test" class="btn btn-primary pull-right" onclick="bekreft()">test</span>-->
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
                            Pilestredet 35, Høgskolen i Oslo og Akershus<br>
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
      
        <?php
        
            echo $listSize."<br/><br/>";
            
            //lager et array som mottar post verdiene til listen på forrige side.
            $listEvents = array();
            for ($i = 0; $i < $listSize; $i++) {
                
                $listEvents[$i] = $_POST["$i"];
                echo $listEvents[$i]."<br/>";
            }
              
        ?>
      
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>