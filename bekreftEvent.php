<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <!-- NB! MÃ¥ ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/cssformConfirm.css"/>
    
    <title>Bekreft påmelding</title>

  </head>

  <body onload="createlist()">
      
        <?php
            
            session_start();
            
                //lager sessionvariabler 
                $_SESSION["listSize"] = $_POST["ls"];
                
                //lager session variabler for alle post-variablene fra listen
                for ($i = 0; $i < $_SESSION["listSize"]; $i++) {

                    $_SESSION["li$i"] = $_POST["$i"];
                    
                }
                
            $listSize = $_SESSION["listSize"];
            
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
                                <li><a href="admin.php">Admin</a></li>
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
                              Arrangementer <small>Bekreft påmelding</small></h1>
                      </div>
                  </div>
              </div>
     </div>
      
      <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="well well-sm">
                            <form name="formBekreftelse" id="formBekreftelse" action="" method="post">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="fornavn">
                                                Fornavn</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="text" class="form-control" name="fornavn" value="bruker sitt fornavn" disabled/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="etternavn">
                                                Etternavn</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="text" class="form-control" name="etternavn" value="bruker sitt etternavn" disabled/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">
                                                Email Adresse</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                                </span>
                                                <input type="email" class="form-control" name="email" value="bruker sin email" disabled/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <ul class="list-group" id="eventListe">
                                        </ul>
                                    </div>

                                    <div class="col-md-12">
<!--                                        <button type="submit" class="btn btn-primary pull-right" name="knappBekreft" onclick="createlist()">
                                            Bekreft</button>-->

                                        <span id="test" class="btn btn-primary pull-right" onclick="createlist()">test</span>
                                        <span id="test2" class="btn btn-primary pull-right" onclick="submitToDb()">test2</span>
                                        <span id="test2" class="btn btn-primary pull-right" onclick="ajax()">test3</span>
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
                            Pilestredet 35, HÃ¸gskolen i Oslo og Akershus<br>
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
                listElement.setAttribute("name", i);
                listElement.setAttribute("id", i);
                listElement.setAttribute("class", "listElement");

                listElement.appendChild(listText);
                form.appendChild(listElement);

            }
            
        }
             
        function submitToDb() {
            
            createlist();
            
            var listValues = document.getElementsByClassName("listElement");
            
            //finner plasseringen av hvert nÃ¸kkelord i hver string og kategoriserer dem i hvert sitt array.
            for (var i = 0; i < listValues.length; i++) {
                
                var listValue = listValues[i];
                var setning = listValue.textContent.split(" ", 5);
                grener[i] = setning[0];
                datoer[i] = setning[2];
                tider[i] = setning[4];
                window.alert(grener[i] + " " + datoer[i] + " " + tider[i]);
            }
             
        }
        
        function ajax() {
        //sender tilbake arrayene til php med json.stringify
//            $.ajax({
//                type: 'POST',
//                url: 'formConfirm.php',
//                data: {json: JSON.stringify(grener)},
//                dataType: 'json'
//            })
//            
//            .done( function(data) {
//                console.log('done');
//                console.log(data);
//            })
//            .fail( function(data) {
//                console.log('fail');
//                console.log(data);
//            });
//            $.ajax({
//                type: 'POST',
//                url: 'formConfirm.php',
//                data: {json: JSON.stringify(datoer)},
//                dataType: 'json'
//            });
            
//            $.ajax({
//                type: 'POST',
//                url: 'formConfirm.php',
//                data: {json: JSON.stringify(tider)},
//                dataType: 'json'
//            })
//            
//            
            
            

//            JSON.stringify(grener);
//            JSON.stringify(datoer);
//            JSON.stringify(tider);
        
        <?php
//        print('{}');
//              $directions = json_decode($_POST['datoer']);
//              var_dump($directions);
//              
//            json_encode($tider);
//            print('{tider}');
//            echo $tider;
        
//            $grener= json_decode('grener');
//            echo $grener;
//            $datoer=json_decode($_POST['datoer']);
//            $tider=json_decode($_POST['tider']);
//            
//            echo $grener.$datoer.$tider;
//            echo $grener.$datoer.$tider;
//            echo $grener.$datoer.$tider;
//            echo $grener.$datoer.$tider;
        
        ?>
            
            }

    </script>

      
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>