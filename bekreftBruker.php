<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <!-- NB! MÃ¥ ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    
    <title>Bekreft Informasjon</title>

  </head>

  <body>
      
    <?php
    session_start();
    if (!isset($_POST['knappBekreft'])) {

        header('location: forside.php');

    }
    
    include 'klasser.php';
    include_once('diverse/navbarTemplate.php');

    //lager objekt av typen bruker
    $bruker = new bruker();
    $bruker->set_fornavn($_POST["fornavn"]);
    $bruker->set_etternavn($_POST["etternavn"]);
    $bruker->set_email($_POST["epostBekreft"]);
    $bruker->set_passord($_POST["passordBekreft"]);
    $bruker->set_userlevel(0);

    ?>
      
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
                    <div class="col-md-6">
                        <div class="well well-sm">
                            <form name="formBekreftBruker" id="formBekreftBruker" action="BrukerRegistrertFinal.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">

                                     <div class="form-group">
                                            <label for="fornavn">
                                                Fornavn</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="text" id="fornavn" class="form-control" name="fornavn" value="<?php echo $bruker->get_fornavn();?>" readonly/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="etternavn">
                                                Etternavn</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="text" class="form-control" name="etternavn" value="<?php echo $bruker->get_etternavn();?>" readonly/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">
                                                Email Adresse</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                                </span>
                                                <input type="email" class="form-control" name="email" value="<?php echo $bruker->get_email();?>" readonly/>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="passord">
                                                Passord</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="password" class="form-control" name="passord" value="<?php echo $bruker->get_passord();?>" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
      
    <script type="text/javascript">
          
        var form = document.getElementById("formBekreftBruker");
          
          var buttonBack = document.createElement("span");
            buttonBack.setAttribute("name", "knappTilbake");
            buttonBack.setAttribute("type", "button");
            buttonBack.setAttribute("class", "btn btn-primary");
            buttonBack.innerHTML = "Tilbake";
            buttonBack.onclick = function () {
                location.href = 'registrerBruker.php';
            };
            form.appendChild(buttonBack);
            
            var button = document.createElement("button");
            button.setAttribute("name", "knappBekreft");
            button.setAttribute("type", "submit");
            button.setAttribute("class", "btn btn-primary pull-right");
            button.innerHTML = "Bekreft";
            form.appendChild(button);
          
    </script>
      
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
