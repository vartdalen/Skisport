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
    
    <script type="text/javascript" src="js/registrerBruker.js"/></script>
        
    <style type="text/css">
    #formRegistrering .has-error .control-label,
    #formRegistrering .has-error .help-block,
    #formRegistrering .has-error .form-control-feedback {
        color: #ff0039;
    }

    #formRegistrering .has-success .control-label,
    #formRegistrering .has-success .help-block,
    #formRegistrering .has-success .form-control-feedback {
        color: #18bc9c;
    }
    </style>
    
    </head>
    
    <body>
                
    <?php

    session_start();
    //skal ikke være mulig å registrere seg hvis man er innlogget.
    if (isset($_SESSION['user'])) {

        header('location: forside.php');

    }
    
    include_once('diverse/navbarTemplate.php');

    ?>

    <script type="text/javascript">
        
        var removeself = document.getElementById("registrerDeg");
        removeself.style.display =  "none";
        
        var removesep = document.getElementById("separator");
        removesep.style.display = "none";
        
    </script>

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
                            <form name="formRegistrering" id="formRegistrering" action="bekreftBruker.php" method="post" novalidate>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group has-feedback" id="fornavnGroup">
                                            <label class="control-label" for="fornavn">
                                            Fornavn</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input oninvalid="this.setCustomValidity('Vennligst skriv inn navn.')" id="fornavn" name="fornavn" class="form-control" type="text" required="required" placeholder="Skriv inn fornavn" onchange="testFornavn()">
                                                <span id="successIconFornavn" class="glyphicon glyphicon-ok-circle form-control-feedback" style="display: none"></span>
                                                <span id="errorIconFornavn" class="glyphicon glyphicon-remove-circle form-control-feedback" style="display: none"></span>
                                                
                                            </div>
                                            <div id="hjelpedivFornavn" class="help-block with-errors" style="display: none">Vennligst skriv inn fornavn.</div>
                                        </div>
                                        
                                        <div class="form-group has-feedback" id="etternavnGroup">
                                            <label class="control-label" for="etternavn">
                                            Etternavn</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input oninvalid="this.setCustomValidity('Vennligst skriv inn etternavn.')" id="etternavn" name="etternavn" class="form-control" type="text" required="required" placeholder="Skriv inn etternavn" onchange="testEtternavn()">
                                                <span id="successIconEtternavn" class="glyphicon glyphicon-ok-circle form-control-feedback" style="display: none"></span>
                                                <span id="errorIconEtternavn" class="glyphicon glyphicon-remove-circle form-control-feedback" style="display: none"></span>
                                                
                                            </div>
                                            <div id="hjelpedivEtternavn" class="help-block with-errors" style="display: none">Vennligst skriv inn etternavn.</div>
                                        </div>
                                        
                                        
                                        <hr class="separator">
                                        
                                        <div class="form-group has-feedback" id="epostGroup">
                                            <label class="control-label" for="epost">
                                            Epost adresse
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                                </span>
                                                <input oninvalid="this.setCustomValidity('Vennligst skriv inn gyldig epost.')" id="epost" name="epost" class="form-control" type="text" required="required" placeholder="Skriv inn epost" onchange="testEpost()">
                                                <span id="successIconEpost" class="glyphicon glyphicon-ok-circle form-control-feedback" style="display: none"></span>
                                                <span id="errorIconEpost" class="glyphicon glyphicon-remove-circle form-control-feedback" style="display: none"></span>
                                                
                                            </div>
                                            <div id="hjelpedivEpost" class="help-block with-errors" style="display: none">Vennligst skriv inn gyldig epost.</div>
                                        </div>
                                        
                                        <div class="form-group has-feedback" id="epostBekreftGroup">
                                            <label class="control-label" for="epostBekreft">
                                            Bekreft epost adresse
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                                </span>
                                                <input oninvalid="this.setCustomValidity('Vennligst skriv inn gyldig epost.')" id="epostBekreft" name="epostBekreft" class="form-control" type="text" required="required" placeholder="Bekreft epost" data-match="#epost" data-match-error="Epost adressene matcher ikke." onchange="testEpostBekreft()">
                                                <span id="successIconEpostBekreft" class="glyphicon glyphicon-ok-circle form-control-feedback" style="display: none"></span>
                                                <span id="errorIconEpostBekreft" class="glyphicon glyphicon-remove-circle form-control-feedback" style="display: none"></span>
                                                
                                            </div>
                                            <div id="hjelpedivEpostBekreft" class="help-block with-errors" style="display: none">Vennligst skriv inn gyldig epost som matcher feltet over.</div>
                                        </div>
                                        
                                        <hr class="separator">
                                        
                                        <div class="form-group has-feedback" id="passordGroup">
                                            <label class="control-label" for="passord">
                                            Passord
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-option-horizontal"></span>
                                                </span>
                                                <input oninvalid="this.setCustomValidity('Vennligst skriv inn gyldig passord.')" id="passord" name="passord" class="form-control" type="password" required="required" placeholder="Skriv inn passord" onchange="testPassord()">
                                                <span id="successIconPassord" class="glyphicon glyphicon-ok-circle form-control-feedback" style="display: none"></span>
                                                <span id="errorIconPassord" class="glyphicon glyphicon-remove-circle form-control-feedback" style="display: none"></span>
                                                
                                            </div>
                                            <div id="hjelpedivPassord" class="help-block with-errors" style="display: none">Passordet må være minst 6 tegn langt, og det må en kombinasjon av tall og bokstaver.</div>
                                        </div>
                                        
                                        <div class="form-group has-feedback" id="passordBekreftGroup">
                                            <label class="control-label" for="passordBekreft">
                                            Bekreft passord
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-option-horizontal"></span>
                                                </span>
                                                <input oninvalid="this.setCustomValidity('Vennligst skriv inn gyldig passord.')" id="passordBekreft" name="passordBekreft" class="form-control" type="password" required="required" placeholder="Bekreft passord" data-match="#passord" data-match-error="Passordene matcher ikke." onchange="testPassordBekreft()">
                                                <span id="successIconPassordBekreft" class="glyphicon glyphicon-ok-circle form-control-feedback" style="display: none"></span>
                                                <span id="errorIconPassordBekreft" class="glyphicon glyphicon-remove-circle form-control-feedback" style="display: none"></span>
                                                
                                            </div>
                                            <div id="hjelpedivPassordBekreft" class="help-block with-errors" style="display: none">Vennligst skriv inn gyldig passord som matcher feltet over.</div>
                                        </div>
                                        
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary pull-right" id="knappBekreft" name="knappBekreft" onclick="" disabled>
                                            Bekreft</button>
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
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"/></script>
    </body>
    
</html>
