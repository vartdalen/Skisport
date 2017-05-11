<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <!-- NB! MÃ¥ ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href=""/>
    
    <title>Bekreft påmelding</title>

  </head>

  <body onload="createlist()">
      
        <?php
            
            session_start();
            //sjekker først om innlogget, for så å sjekke etter post variabel fra forrige side.
            if (!isset($_SESSION['user'])) {
        
            header('location: forside.php');
            
            } else if (!isset($_POST['knappBekreft'])) {
                
            header('location: forside.php');
                
            }
            
            include_once('diverse/navbarTemplate.php');
//trenger midlertidig ikke disse fordi vi henter all brukerinfo og putter i sessionvariabler ved innlogging.            
//            include 'Database/dbtilknytning.php';
//            
//            //henter navn og etternavn fra databasen
//            $email = $_SESSION['email'];
//            $sql = "SELECT Navn, Etternavn FROM User WHERE Epost = '$email'";
//            $resultat = mysqli_query($db, $sql);
//            
//            if(!$resultat) {
//
//            die(mysqli_error());
//
//            }
//            
//            $check = mysqli_num_rows($resultat);
//            
//            if ($check > 0) {
//                
//                $navn = array();
//                $sqlArray = mysqli_fetch_array($resultat);
//                for ($i = 0; $i < 2; $i++) {
//                    
//                $navn[$i] = $sqlArray[$i];
//                
//                } 
//                
//            }
            
            //lager sessionvariabler og listevariabler til bruk på serversiden
            $_SESSION["listSize"] = $_POST["ls"];
                //disse er arrays
            $_SESSION["antall"] = $_POST["antall"];
            $_SESSION["grener"] = $_POST["grener"];
            $_SESSION["datoer"] = $_POST["datoer"];
            $_SESSION["tider"] = $_POST["tider"];
            
            //lager session variabler for alle post-variablene fra listen (for overføring til javascript liste på clientsiden)
            for ($i = 0; $i < $_SESSION["listSize"]; $i++) {

                $_SESSION["li$i"] = $_POST["$i"];

            }
                
            $listSize = $_SESSION["listSize"];
            
        ?>
      
    <div class="jumbotron jumbotron-sm">
              <div class="container">
                  <div class="row">
                      <div class="col-sm-12 col-lg-12">
                          <h1 class="h1">
                              Arrangementer <small>Bekreft påmelding</small></h1>
                      </div>
                  </div>
              </div>
     </div>
      
      <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="well well-sm">
                            <form name="formBekreftelse" id="formBekreftelse" action="eventRegistrertFinal.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="fornavn">
                                                Fornavn</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="text" class="form-control" name="fornavn" value="<?php echo $_SESSION["fornavn"];?>" readonly/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="etternavn">
                                                Etternavn</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="text" class="form-control" name="etternavn" value="<?php echo $_SESSION["etternavn"];?>" readonly/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">
                                                Email Adresse</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                                </span>
                                                <input type="email" class="form-control" name="email" value="<?php echo $_SESSION["user"];?>" readonly/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12" style="text-align: center">
                                        <label class="text-info">Vennligst bekreft at dataene stemmer.</label>
                                        <ul class="list-group" id="eventListe">
                                        </ul>
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
         
//                echo $listSize."<br/><br/>";
            
                //lager et array som mottar post verdiene til listen pÃ¥ forrige side.
                $listEvents = array();
                for ($i = 0; $i < $listSize; $i++) {

                    $listEvents[$i] = $_SESSION["li$i"];
//                    echo $listEvents[$i]."<br/>";
                }
                
                json_encode($listEvents);
        ?>
      
    <script type="text/javascript" async>
        
        var listSize = <?php echo $listSize?>;
        var antall = [];
        var grener = [];
        var datoer = [];
        var tider = [];
        
        //lager liste til bekreftelsessiden
        function createlist() {
            
            var listValues = <?php echo json_encode($listEvents) ?>;
            var form = document.getElementById("formBekreftelse");
           
            for (var i = 0; i < listSize; i++) {
 
                var listElement = document.createElement("li");
                var listText = document.createTextNode(listValues[i]);
                listElement.setAttribute("style", "list-style: none;");
                listElement.setAttribute("name", i);
                listElement.setAttribute("id", i);
                listElement.setAttribute("class", "form-group");
                

                listElement.appendChild(listText);
                form.appendChild(listElement);

            }
            var buttonBack = document.createElement("span");
            buttonBack.setAttribute("name", "knappTilbake");
            buttonBack.setAttribute("type", "button");
            buttonBack.setAttribute("class", "btn btn-primary ");
            buttonBack.innerHTML = "Tilbake";
            buttonBack.onclick = function () {
                location.href = 'form.php';
            };
            form.appendChild(buttonBack);
            
            var button = document.createElement("button");
            button.setAttribute("name", "knappBekreft");
            button.setAttribute("type", "submit");
            button.setAttribute("class", "btn btn-primary pull-right");
            button.innerHTML = "Bekreft";
            form.appendChild(button);
            
        }
       

    </script>

      
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>