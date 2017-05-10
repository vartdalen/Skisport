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
    include_once('diverse/navbarTemplate.php');
    
    if (!isset($_SESSION['user'])) {
        
        header('location: forside.php');
        
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
                            <form name="formRegistrering" id="formRegistrering" action="bekreftEvent.php" method="post" onsubmit="return bekreft()">
                                <div class="row">

                                    <div class="col-md-12" id="listContainer">

                                        <div class="form-group has-success" id="velgAntallGroup">
                                            <label for="velgAntall">
                                            Antall personer</label>
                                            <input id="velgAntall" name="velgAntall" class="form-control" type="number" required="required" min="1" max="5" value="1" onchange="sjekkTall()"> 
                                        </div>
                                        
                                        <div class="form-group" id="velgGrenGroup">
                                        <label for="velgGren">
                                            Gren</label>
                                            <select id="velgGren" name="velgGren" class="form-control" required="required" onchange="valgtGren()">
                                            <option selected hidden>Velg gren</option>
                                            <option>Skihopp</option>
                                            <option>Slalom</option>
                                            <option>Langrenn</option>
                                            <option>Skiskyting</option>
                                        </select>
                                        </div>

                                        <div class="form-group" id="velgDatoGroup">
                                            <label for="velgDato">
                                            Dato</label>
                                        <select id="velgDato" name="velgDato" class="form-control" required="required" onchange="valgtDato()" disabled>
                                            <option selected hidden>Velg dato</option>
                                            <option>21.01.2017</option>
                                            <option>22.01.2017</option>
                                            <option>23.01.2017</option>
                                            <option>24.01.2017</option>
                                            <option>25.01.2017</option>
                                            <option>26.01.2017</option>
                                            <option>27.01.2017</option>
                                        </select>
                                        </div>

                                        <div class="form-group" id="velgTidGroup">
                                            <label for="velgTid">
                                            Tid</label>
                                            <select id="velgTid" name="velgTid" class="form-control" required="required" onchange="valgtTid()" disabled>
                                            <option selected hidden>Velg tid</option>
                                            <option>10:00-12:30</option>
                                            <option>11:30-14:00</option>
                                            <option>13:00-15:30</option>
                                            </select>
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
                                        <button type="submit" class="btn btn-primary pull-right" name="knappBekreft" id="knappBekreft" disabled>
                                            Bekreft</button>
<!--                                        <span id="test" class="btn btn-primary pull-right" onclick="bekreft()">test</span>-->
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
        
    <!-- JQuery -->
    <script src="js/jquery.min.js"/></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"/></script>
    </body>
</html>