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
          
    <title>Admin</title>

  </head>

  <body>
      
    <?php

    session_start();
    
    ?>
      
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container" id="c1">
            <div class="navbar-header">
                <a class="navbar-brand " href="forside.php">Hjem</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="form.php">Påmelding</a></li>
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
                                <li><a href="oppdaterInfo.php">Oppdater informasjon</a></li>
                                <li><a href="#">Admin</a></li>
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
            </div><!--navbar collapse-->
        </div>
    </nav>
      
    <div class="jumbotron jumbotron-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <h1 class="h1">
                                Admin <small>Administrer brukere og arrangementer</small></h1>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="well well-sm">
                            <form name="forandreInformasjon" id="forandreInformasjon" action="" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div class="form-group">
                                            <label for="email">
                                                Email adresse</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                                </span>
                                                <input type="email" class="form-control" name="email" placeholder="Skriv inn email" required="required" />
                                            </div>
                                        </div>
                                        
                                        <hr class="separator">

                                        <div class="form-group">
                                            <label for="fornavn">
                                                Endre fornavn</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="text" class="form-control" name="fornavn" placeholder="Skriv inn nytt fornavn"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="etternavn">
                                                Endre etternavn</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="text" class="form-control" name="etternavn" placeholder="Skriv inn nytt etternavn"/>
                                            </div>
                                        </div>
                                        
                                        <hr class="separator">
                                        
                                        <div class="form-group">
                                            <label for="email">
                                                Endre email edresse</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                                </span>
                                                <input type="email" class="form-control" name="email" placeholder="Skriv inn ny email" />
                                            </div>
                                        </div>
                                        
                                        <hr class="separator">
                                        
                                        <div class="form-group">
                                            <label for="passord">
                                                Endre passord</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="password" id="passord" data-match-error="Skriv inn passord." class="form-control" name="passord" placeholder="Skriv inn nytt passord" required="required"/>
                                                <div class="help-block with-errors"></div>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="passord">
                                                Bekreft endre passord</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="password" data-match="#passord" data-match-error="Passordene matcher ikke." class="form-control" name="passordBekreft" placeholder="Bekreft nytt passord"/>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        
                                        <hr class="separator">
                                        
                                        <div class="form-group">
                                            <label for="user-level">
                                                Endre user-level</label>
                                            <div class="form-group">
                                                <select id="user-level" name="user-level" class="form-control">
                                            <option selected hidden>Velg user-level</option>
                                            <option>0 (vanlig bruker)</option>
                                            <option>1 (admin)</option>
                                        </select>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                  </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <span id="Oppdater" class="btn btn-primary pull-right" onclick="">Oppdater</span>
                                            </div>
                                        </div>   
                                    </div>

                                    <br/>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary pull-right" name="knappBekreft" onclick="bekreft()">
                                            Bekreft</button>
<!--                                        <span id="test" class="btn btn-primary pull-right" onclick="bekreft()">test</span>-->
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    
    <?php


    if (isset($_SESSION['user'])) {

        echo "<br/><br/><br/><br/>"."Du er nå logget inn";
        echo "<br/>".$_SESSION['email'];

    }


    ?>
      
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>