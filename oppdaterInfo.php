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
    <script src="profilValidering"></script>
          
    <title>Profil</title>
    
  </head>

  <body>
      
     
    <?php

    session_start();
    
    if(!isset($_SESSION['user'])) {

        header('location: loginPage.php');

    }
    
    include_once('diverse/navbarTemplate.php');
    
    ?>

    <script type="text/javascript">
        
        var removeself = document.getElementById("profil");
        removeself.style.display =  "none";
        
    </script>

    <div class="jumbotron jumbotron-sm">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <h1 class="h1">
                        Profil <small>Valider og oppdater informasjon</small></h1>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="well">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#navn" data-toggle="tab">Navn</a></li>
              <li><a href="#epost" data-toggle="tab">Epost</a></li>
              <li><a href="#passord" data-toggle="tab"> Passord</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="navn">
                    <form id="tab1">
                        <br>
                        <div class="form-group" id="fornavnGroup">
                            <label for="userFornavn">
                                Bytt fornavn</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                </span>
                                <input type="text" class="form-control" id="fornavn" onchange="validerFornavn()" placeholder="Skriv inn nytt fornavn"/>
                                <span id="successIconFornavn" class="glyphicon glyphicon-ok-circle form-control-feedback" style="display: none"></span>
                                <span id="errorIconFornavn" class="glyphicon glyphicon-remove-circle form-control-feedback" style="display: none"></span>
                            </div>
                            <div id="hjelpedivFornavn" class="help-block with-errors" style="display: none">Vennligst skriv inn fornavn. Æ, ø og å er desverre ikke tillatt.</div>
                        </div>

                        <hr class="separator">

                        <div class="form-group" id="etternavnGroup">
                            <label for="userEtternavn">
                                Bytt etternavn</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                </span>
                                <input type="text" class="form-control" id="etternavn" onchange="validerEtternavn()" placeholder="Skriv inn nytt etternavn"/>
                                <span id="successIconEtternavn" class="glyphicon glyphicon-ok-circle form-control-feedback" style="display: none"></span>
                                <span id="errorIconEtternavn" class="glyphicon glyphicon-remove-circle form-control-feedback" style="display: none"></span>
                            </div>
                            <div id="hjelpedivEtternavn" class="help-block with-errors" style="display: none">Vennligst skriv inn etternavn. Æ, ø og å er desverre ikke tillatt.</div>
                        </div>

                        <input  type="submit" class="btn btn-primary pull-left" value="Endre navn" onclick="editNavn()">
                        <div class="clearfix"></div>

                    </form>
                </div>

                <div class="tab-pane fade" id="epost">
                    <form id="tab2">
                        <br>
                        <div class="form-group" id="epostGroup">
                            <label for="userEpost1">
                                Bytt epost</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" id="epost" class="form-control" onchange="validerEpost() "placeholder="Skriv inn ny epost"/>
                                <span id="successIconEpost" class="glyphicon glyphicon-ok-circle form-control-feedback" style="display: none"></span>
                                <span id="errorIconEpost" class="glyphicon glyphicon-remove-circle form-control-feedback" style="display: none"></span>
                            </div>
                            <div id="hjelpedivFornavn" class="help-block with-errors" style="display: none">Vennligst skriv inn fornavn. Æ, ø og å er desverre ikke tillatt.</div>
                        </div>

                        <input type="submit" class="btn btn-primary pull-left" value="Endre epost" onclick="editEpost()">
                        <div class="clearfix"></div>

                    </form>
                </div>

              <div class="tab-pane fade" id="passord">
                    <form id="tab3">
                        <br>
                        <div class="form-group" id="passordGroup">
                            <label for="userPassord">
                                Bytt passord</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-option-vertical"></span>
                                </span>
                                <input type="password" id="passord" class="form-control" onchange="validerPassord()" placeholder="Skriv inn nytt passord"/>
                                <span id="successIconPassord" class="glyphicon glyphicon-ok-circle form-control-feedback" style="display: none"></span>
                                <span id="errorIconPassord" class="glyphicon glyphicon-remove-circle form-control-feedback" style="display: none"></span>
                            </div>
                        </div>

                        <hr class="separator">

                        <div class="form-group" id="passordBekreftGroup">
                            <label for="userPassord">
                                Bekreft nytt passord</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-option-vertical"></span>
                                </span>
                                <input type="password" data-match="#passord" id="passordBekreft" class="form-control" onchange="validerPassord()" placeholder="Bekreft nytt passord"/>
                                <span id="successIconPassordBekreft" class="glyphicon glyphicon-ok-circle form-control-feedback" style="display: none"></span>
                                <span id="errorIconPassordBekreft" class="glyphicon glyphicon-remove-circle form-control-feedback" style="display: none"></span>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary pull-left" value="Endre passord" onclick="editPW()">
                        <div class="clearfix"></div>
                    </form>
              </div>
            </div>
        </div>
    </div>
    
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>