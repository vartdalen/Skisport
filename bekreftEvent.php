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
        
            header('location: feilIkkeLogin.php');
            
            } else if (!isset($_POST['knappBekreft'])) {
                
            header('location: feil.php');
                
            }
            
            include_once('diverse/navbarTemplate.php');
            
            //lager sessionvariabler og listevariabler til bruk på serversiden
            $listSize = $_POST["ls"];
            
            $listEvents = array();
            
            //lager et array som mottar post verdiene til listen på forrige side.
            for ($i = 0; $i < $listSize; $i++) {

                $listEvents[$i] = $_POST["$i"];

            }
            
            //encoder for bruk i js
            json_encode($listEvents);
            
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
                                            <label for="epost">
                                                Epost Adresse</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                                </span>
                                                <input type="email" class="form-control" name="epost" value="<?php echo $_SESSION["user"];?>" readonly/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12" style="text-align: center">
                                        <label class="text-info">Vennligst bekreft at dataene stemmer.</label>
                                        <ul class="list-group" id="eventList">
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
      
    <!--dette scriptet måtte stå inne i denne filen for å kunne hente json encoded array $listEvents og php variablen $listSize--> 
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
            
            var antallhtml = document.createElement("input");
            var grenerhtml = document.createElement("input");
            var datoerhtml = document.createElement("input");
            var tiderhtml = document.createElement("input");
            
            for (var i = 0; i < listSize; i++) {
                //synlig, ikke-postbar oversikt:
                var listElement = document.createElement("li");
                var listText = document.createTextNode(listValues[i]);
                listElement.setAttribute("style", "list-style: none;");
                listElement.setAttribute("name", i);
                listElement.setAttribute("id", i);
                listElement.setAttribute("class", "form-group");

                listElement.appendChild(listText);
                form.appendChild(listElement);
                
                //usynlig, postbare listeelementer som kan deles opp:
                var fullSetning = document.createElement("input");

                fullSetning.setAttribute("type","hidden");
                fullSetning.setAttribute("name", i);
                fullSetning.setAttribute("value", listElement.innerHTML);

                form.appendChild(fullSetning);
                
                
                var setning = fullSetning.value.split(" ", 7);
                antall[i] = setning[0];
                grener[i] = setning[2];
                datoer[i] = setning[4];
                tider[i] = setning[6];

                antallhtml.setAttribute("type","hidden");
                antallhtml.setAttribute("name", "antall");
                antallhtml.setAttribute("value", antall);
                form.appendChild(antallhtml);

                grenerhtml.setAttribute("type","hidden");
                grenerhtml.setAttribute("name", "grener");
                grenerhtml.setAttribute("value", grener);
                form.appendChild(grenerhtml);

                datoerhtml.setAttribute("type","hidden");
                datoerhtml.setAttribute("name", "datoer");
                datoerhtml.setAttribute("value", datoer);
                form.appendChild(datoerhtml);

                tiderhtml.setAttribute("type","hidden");
                tiderhtml.setAttribute("name", "tider");
                tiderhtml.setAttribute("value", tider);
                form.appendChild(tiderhtml);

            }
            
            var listSizePassable = document.createElement("input");
            listSizePassable.setAttribute("type","hidden");
            listSizePassable.setAttribute("name", "listSize");
            listSizePassable.setAttribute("value", listSize);
            form.appendChild(listSizePassable);

            var buttonBack = document.createElement("span");
            buttonBack.setAttribute("name", "knappTilbake");
            buttonBack.setAttribute("type", "button");
            buttonBack.setAttribute("class", "btn btn-primary ");
            buttonBack.innerHTML = "Tilbake";
            buttonBack.onclick = function () {
                location.href = 'form.php';
            }
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