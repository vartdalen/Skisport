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
    
    <script type="text/javascript" src="js/list.js" async/></script>
        
    </head>
    
    
    
    <body>
        
        <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container" id="c1">
            <div class="navbar-header">
                <a class="navbar-brand " href="">Hjem</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="form.php">Arrangementer</a></li>
                </ul>
                
                <div class="dropdown">
                    
                    <ul class="nav navbar-nav" style="float:right;">
  
                        <li role="presentation" class="dropdown" >
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                              Bruker <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="registrerBruker.php">Registrer deg</a></li>
                                <li><a href="login.html">Logg inn</a></li>
                                <li><a href="oppdaterInfo.php">Oppdater informasjon</a></li>
                                <li><a href="admin.php">Admin</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Logg ut</a></li>
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
                                Arrangementer <small>Velg event</small></h1>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="well well-sm">
                            <form name="formRegistrering" id="formRegistrering" action="bekreftEvent.php" method="post">
                                <div class="row">
<!--                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="fornavn">
                                                Fornavn</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="text" class="form-control" name="fornavn" placeholder="Skriv inn fornavn" required="required" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="etternavn">
                                                Etternavn</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <input type="text" class="form-control" name="etternavn" placeholder="Skriv inn etternavn" required="required" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">
                                                Email Adresse</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                                </span>
                                                <input type="email" class="form-control" name="email" placeholder="Skriv inn email" required="required" />
                                            </div>
                                        </div>

                                  </div>-->

                                    <div class="col-md-12" id="listContainer">

                                        <div class="form-group">
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

                                        <div class="form-group">
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

                                        <div class="form-group">
                                            <label for="velgTid">
                                            Tid</label>
                                            <select id="velgTid" name="velgTid" class="form-control" required="required" disabled>
                                            <option selected hidden>Velg tid</option>
                                            <option>10:00-12:30</option>
                                            <option>11:30-14:00</option>
                                            <option>13:00-15:30</option>
                                        </select>
                                         </div> 

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <span id="leggTil" class="btn btn-primary pull-right" onclick="newElement()">Legg til</span>
                                            </div>
                                        </div>   
                                    </div>

                                    <br/>

                                    <div class="col-md-12">
                                        <ul class="list-group" id="eventListe">
                                        </ul>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary pull-right" name="knappBekreft" onclick="bekreft()">
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