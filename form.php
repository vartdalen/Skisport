<html>
    <head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Bootstrap CSS -->
    
    <!-- NB! Må ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/cssform.css"/>
    
    <title>Registrer deg</title>
    <!-- JQuery -->    <script src="js/jquery.min.js"></script>    <!-- Bootstrap JavaScript --> 
    <script src="js/bootstrap.min.js"/></script>
    <script type="text/javascript" src="js/list.js" async/></script>
    <!--<script type="text/javascript" src="js/hentEventFunksjoner.js" async/></script>-->
    <script type="text/javascript" src="js/hentEventFunksjoner2.js" async/></script>
    
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
    
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin:0;
    }
    </style>
        
    </head>
    
    
    
    <body>
        
    <?php

    session_start();
    include_once('diverse/navbarTemplate.php');
    
    if (!isset($_SESSION['user'])) {
        
        header('location: feilIkkeLogin.php');
        
    }
    
    if (isset($_POST['knappBekreft'])) {
    
        $_SESSION['skjemautfylt'] = 1;
    
    
    }
    
    ?>
            <div class="jumbotron jumbotron-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <h1 class="h1">
                                Arrangementer <small>Velg event</small></h1>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="well well-sm">
                            <form class="form" name="formRegistrering" id="formRegistrering" action="bekreftEvent.php" method="post" onsubmit="return bekreft()">
                                <div class="row">

                                    <div class="col-md-12" id="listContainer">
                                            
                                        <div class="form-group has-success has-feedback" id="velgAntallGroup">
                                            <label class="control-label" for="velgAntall">
                                            Antall personer</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input id="velgAntall" name="velgAntall" class="form-control" type="number" required="required" min="1" max="5" value="1" onchange="sjekkTall()">
                                                <span id="successIconAntall" class="glyphicon glyphicon-ok-circle form-control-feedback"></span>
                                                <span id="errorIconAntall" class="glyphicon glyphicon-remove-circle form-control-feedback" style="display: none"></span>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="form-group" id="velgGrenGroup">
                                        <label class="control-label" for="velgGren">
                                            Gren</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-option-vertical"></span>
                                                </span>
                                                
                                                <?php
                                                
                                                    include 'Database/dbtilknytning.php';

                                                    $sql = "SELECT Gren FROM Event";
                                                    $resultat = mysqli_query($db, $sql);
                                                    
                                                    if(!$resultat) {
                                                        die(mysqli_error());
                                                    }
                                                    
                                                    if(mysqli_num_rows($resultat) > 0){
                                                        $select= '<select id="velgGren" name="velgGren" class="form-control" required="required" onchange="valgtGren(); selectDato(this.value);"><option selected hidden>Velg gren</option>';
                                                    while($rs = mysqli_fetch_array($resultat)){

                                                        $select.='<option>';
                                                        $select.=$rs['Gren'];
                                                        $select.='</option>';
                                                          
                                                    }
                                                    
                                                    $select.='</select>';
                                                    echo $select;
                                                    
                                                    }
//                                                
                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group" id="velgDatoGroup">
                                            <label class="control-label" for="velgDato">
                                            Dato</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                                
                                                <?php
                                                
                                                    include 'Database/dbtilknytning.php';

                                                    $sql = "SELECT Dato FROM Event";
                                                    $resultat = mysqli_query($db, $sql);
                                                    
                                                    if(!$resultat) {

                                                        die(mysqli_error());

                                                    }
                                                    
                                                   // $rowcount = -1;
                                                    
                                                    if(mysqli_num_rows($resultat)){
                                                    $select= '<select id="velgDato" name="velgDato" class="form-control" required="required" onchange="valgtDato();" disabled><option selected hidden>Velg dato</option>';
                                                    while($rs=mysqli_fetch_array($resultat)){
                                                        //$rowcount++;
                                                        $select.='<option>';
                                                        $select.=$rs['Dato'];
                                                        $select.='</option>';
                                                          
                                                    }
                                                    
                                                    $select.='</select>';
                                                    echo $select;
                                                    
                                                    }
                                                
                                                ?>
                                                
                                            </div>
                                        </div>

                                        <div class="form-group" id="velgTidGroup">
                                            <label class="control-label" for="velgTid">
                                            Tid</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                                                </span>
                                                
                                                <?php
                                                
                                                    include 'Database/dbtilknytning.php';

                                                    $sql = "SELECT Tid FROM Event";
                                                    $resultat = mysqli_query($db, $sql);
                                                    
                                                    if(!$resultat) {

                                                        die(mysqli_error());

                                                    }
                                                    
                                                    if(mysqli_num_rows($resultat)){
                                                    $select= '<select id="velgTid" name="velgTid" class="form-control" required="required" onchange="valgtTid()" disabled><option selected hidden>Velg tid</option>';
                                                    while($rs=mysqli_fetch_array($resultat)){
                                                        
                                                        $select.='<option>';
                                                        $select.=$rs['Tid'];
                                                        $select.='</option>';
                                                          
                                                    }
                                                    
                                                    $select.='</select>';
                                                    echo $select;
                                                    
                                                    }
//                                                
                                                ?>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="text-danger" id="errorSkjema"></div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <button id="leggTil" class="btn btn-primary pull-right" onclick="return newElement()" disabled>Legg til</button>
                                            </div><h4 class="text-info" style="margin-left: 1em">Dine arrangementer:</h4>
                                        </div>
                                    </div>

                                    <br/>

                                    <div class="col-md-12" id="eventListeDiv">
                                        <ul class="list-group" id="eventListe">
                                        </ul>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary pull-right" name="knappBekreft" id="knappBekreft" onclick="sjekkListe()" disabled>
                                            Bekreft</button>
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
  
    </body>
</html>