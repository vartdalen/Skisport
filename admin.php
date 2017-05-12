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
    
    if(!isset($_SESSION['user'])) {
                                    
        header('location: forside.php');

    } else if ($_SESSION['userlevel'] != 1) {

        header('location: forside.php');

    }
    
    include_once('diverse/navbarTemplate.php');
    
    ?>
        
    <script type="text/javascript">
        
        var removeself = document.getElementById("admin");
        removeself.style.display =  "none";
        
    </script>
        
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
                        <form name="forandreBruker" id="forandreBruker" action="" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="fornavn">Bruker</label>
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
                                            Endre email</label>
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
                                <hr class="separator">

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
                                            Endre fornavn</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input type="text" class="form-control" name="fornavn" placeholder="Skriv inn nytt fornavn"/>
                                        </div>
                                    </div>
                                    
                                    <hr class="separator">
                                            
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
                                        <label for="passord">
                                            Endre øvelse ID</label>
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
                                            <span id="Oppdater" class="btn btn-primary pull-right" onclick="">Oppdater</span>
                                        </div>
                                    </div>   
                                </div>
                                        
                                <br/>
                                        
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right" name="knappBekreft" onclick="bekreft()">
                                        Bekreft</button>
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
                                            Endre øvelse ID</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input type="text" class="form-control" name="etternavn" placeholder="Skriv inn nytt etternavn"/>
                                        </div>
                                    </div>
                                            
                                    <hr class="separator">
                                            
                                    <div class="form-group">
                                        <label for="email">
                                            Endre navn</label>
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
                                            <span id="Oppdater" class="btn btn-primary pull-right" onclick="">Oppdater</span>
                                        </div>
                                    </div>   
                                </div>
                                        
                                <br/>
                                        
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right" name="knappBekreft" onclick="bekreft()">
                                        Bekreft</button>
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

        <!-- Bootstrap JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        
    </body>
</html>
