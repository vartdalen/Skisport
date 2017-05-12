<!DOCTYPE html>
    
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/loadTableFunctions.js"></script>
<!--        <script>
            $(document).ready(function(){
                $("button").click(function(){
                    $(".utdata").toggle("slow");
                });
            });
        </script>-->
    
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
                        <li><a href='arrangementer.php'>Arrangementer</a></li>
                        <li><a href='utovere.php'>Utøvere</a></li>
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
                                        
                                    echo "<li><a href='oppdaterInfo.php'>Oppdater info</a></li>";
                                        
                                    }
                                        
                                ?>
                                <?php
                                    
                                    if(isset($_SESSION['user'])) { 
                                        
                                    echo "<li><a href='paameldingsOversikt.php'>Påmeldingsoversikt</a></li>";
                                        
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
                <div class="col-md-6">
                    <div class="well well-sm">
                        <form name="forandreBruker" id="forandreBruker" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="fornavn">Bruker</label>
                                    <hr class="separator">
                                    <div class="form-group">
                                        <label for="fornavn">
                                            Epost</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input type="text" class="form-control" name="fornavn" placeholder="Skriv inn eposten(bruker) du vil slette"/>
                                            <span class="input-group-btn"><button class="btn btn-primary pull-right">Oppdater</button></span>
                                        </div>
                                    </div>
                                            
                                    <div class="form-group">
                                        <label for="etternavn">
                                            Fornavn</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input type="text" class="form-control" name="etternavn" placeholder="Skriv inn nytt etternavn"/>
                                            <span class="input-group-btn"><button class="btn btn-primary pull-right">Test 1</button></span>
                                        </div>
                                    </div>
                                            
                                    <hr class="separator">
                                            
                                    <div class="form-group">
                                        <label for="email">
                                            Etternavn</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                            </span>
                                            <input type="email" class="form-control" name="email" placeholder="Skriv inn ny email" />
                                        </div>
                                    </div>
                                            
                                    <hr class="separator">
                                            
                                    <div class="form-group">
                                        <label for="passord">
                                            Passord</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input type="password" id="passord" data-match-error="Skriv inn passord." class="form-control" name="passord" placeholder="Skriv inn nytt passord" required="required"/>
                                            <div class="help-block with-errors"></div>
                                                    
                                        </div>
                                    </div>
                                            
                                    <div class="form-group">
                                        <label for="passord">
                                            Bekreft passord</label>
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
                                            User-level</label>
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
                                <hr class="separator">
                                <br/>
                                        
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right" name="knappBekreft">
                                        Slett</button>
                                </div>
                                        
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div>
                        <button type="submit" class="btn btn-primary" onClick="loadUser()" />
                        Vis tabell
                        </button>
                    </div>
                    <div id="utdataUser" style="display: none;">
                    </div>
                </div>
                
            </div>
        </div>
                
        <!-- Endring for utøvere -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="well well-sm">
                        <form name="forandreAthletes" id="forandreAthletes" action="" method="post">
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <label for="fornavn">Utøvere</label>
                                    <hr class="separator">
                                            
                                    <div class="form-group">
                                        <label for="fornavn">
                                            Fornavn</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input type="text" class="form-control" name="fornavn" placeholder="Skriv inn nytt fornavn"/>
                                        </div>
                                    </div>
                                    
                                    <hr class="separator">
                                            
                                    <div class="form-group">
                                        <label for="etternavn">
                                            Etternavn</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input type="text" class="form-control" name="etternavn" placeholder="Skriv inn nytt etternavn"/>
                                        </div>
                                    </div>
                                            
                                    <hr class="separator">
                                            
                                    <div class="form-group">
                                        <label for="passord">
                                            Øvelse ID</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input type="password" id="passord" data-match-error="Skriv inn passord." class="form-control" name="passord" placeholder="Skriv inn nytt passord" required="required"/>
                                            <div class="help-block with-errors"></div>
                                                    
                                        </div>
                                    </div>
                                    <hr class="separator">
                                </div>
                                      
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                        </div>
                                        <div class="col-md-4">
                                            <span id="addAth" class="btn btn-primary pull-right">Legg til</span>
                                        </div>
                                    </div>   
                                </div>
                                        
                                <br/>
                                        
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right" name="knappSlettAth">
                                        Slett</button>
                                </div>
                                        
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div>
                        <button type="submit" class="btn btn-primary" onClick="loadAthletes()" />
                        Vis tabell
                        </button>
                    </div>
                    <div id="utdataAthletes"  style="display: none;">
                    </div>
                </div>
                
            </div>
        </div>
                
        <!-- Endring for øvelser -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="well well-sm">
                        <form name="forandreExercise" id="forandreExercise" action="" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="fornavn">Øvelser</label>
                                    <hr class="separator">
                                            
                                    <div class="form-group">
                                        <label for="etternavn">
                                            Øvelse ID</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input type="text" class="form-control" name="etternavn" placeholder="Skriv inn nytt etternavn"/>
                                        </div>
                                    </div>
                                            
                                    <hr class="separator">
                                            
                                    <div class="form-group">
                                        <label for="email">
                                            Øvelse navn</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                            </span>
                                            <input type="email" class="form-control" name="email" placeholder="Skriv inn ny email" />
                                        </div>
                                    </div>
                                            
                                    <hr class="separator">
                                            
                                    <div class="form-group">
                                        <label for="passord">
                                            Dato</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input type="password" id="passord" data-match-error="Skriv inn passord." class="form-control" name="passord" placeholder="Skriv inn nytt passord" required="required"/>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <hr class="separator">
                                            
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                        </div>
                                        <div class="col-md-4">
                                            <span id="addEx" class="btn btn-primary pull-right" onclick="">Legg til</span>
                                        </div>
                                    </div>   
                                </div>
                                        
                                <br/>
                                        
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right" name="knappSlettEx">
                                        Slett</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div>
                        <button type="submit" class="btn btn-primary" onClick="loadExercises()" />
                        Vis tabell
                        </button>
                    </div>
                    <div id="utdataExercises"  style="display: none;">
                    </div>
                </div>    
                    
            </div>
        </div>

    <?php
        if (isset($_SESSION['user'])) {
            echo "<br/><br/><br/><br/>"."Du er nå logget inn";
            echo "<br/>".$_SESSION['email'];      
        }
    ?>
        <!-- Bootstrap JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        
    </body>
</html>