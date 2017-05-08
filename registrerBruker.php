<!DOCTYPE html>

<html>
    <head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Bootstrap CSS -->
    
    <!-- NB! Må ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/cssform.css"/>
    
    <title>Registrer deg</title>
    
    <script type="text/javascript" src="js/list.js" async/></script>
        
    </head>
    
    <body>
        
       
    <?php
      
    session_start();
    include 'klasser.php';
      
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
                                <li><a href="#">Registrer deg</a></li>
                                <li><a href="loginPage.php">Logg inn</a></li>
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
                                Registrer deg <small></small></h1>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="well well-sm">
                            <form name="formRegistrering" id="formRegistrering" action="bekreftBruker.php" method="post" data-toggle="validator">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="fornavn">
                                                Fornavn</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="text" class="form-control" name="fornavn" placeholder="Skriv inn fornavn" required="required" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="etternavn">
                                                Etternavn</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="text" class="form-control" name="etternavn" placeholder="Skriv inn etternavn" required="required" />
                                            </div>
                                        </div>
                                        
                                        <hr class="separator">

                                        <div class="form-group">
                                            <label for="email">
                                                Email Adresse</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                                </span>
                                                <input type="email" id="email" data-match-error="Skriv inn email." class="form-control" name="email" placeholder="Skriv inn email" required="required" />
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="email">
                                                Bekreft email adresse</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                                </span>
                                                <input type="email" data-match="#email" data-match-error="Email adressene matcher ikke."class="form-control" name="emailBekreft" placeholder="Bekreft email"/>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        
                                        <hr class="separator">
                                        
                                        <div class="form-group">
                                            <label for="passord">
                                                Passord</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="password" id="passord" data-match-error="Skriv inn passord." class="form-control" name="passord" placeholder="Skriv inn passord" required="required"/>
                                                <div class="help-block with-errors"></div>
                                                
                                            </div>
                                        </div>
                                        
                                        <!-- NB! Må hashes! -->
                                        <div class="form-group">
                                            <label for="passord">
                                                Bekreft passord</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="password" data-match="#passord" data-match-error="Passordene matcher ikke." class="form-control" name="passordBekreft" placeholder="Bekreft passord"/>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                    <div class="col" id="col2col2">
                                        <div class="col-md-2">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-8">
                                            </div>
                                          
                                        </div>   
                                    </div>

                                    <br/>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary pull-right" name="knappBekreft" onclick="">
                                            Bekreft</button>
<!--                                        <span id="test" class="btn btn-primary pull-right" onclick="bekreft()">test</span>-->
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>

    <!-- JQuery -->
    <script src="js/jquery.min.js"/></script>
    <script src="http://1000hz.github.io/bootstrap-validator/dist/validator.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"/></script>
    </body>
    
</html>