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

<script>
    $(document).ready(function () {
        $('#gren').on('change', function () {
            var gren = $(this).val();
            if (gren) {
                $.ajax({
                    type: 'POST',
                    url: '.\\Database\\adminDBAjaxURL\\selectEvent.php',
                    data: {Gren : gren},
                    success: function (html) {
                        $('#dato').html(html);
                        $('#tid').html('<option value="">Velg dato først</option>');
                    }
                });
            } else {
                $('#dato').html('<option value="">Velg gren først</option>');
                $('#tid').html('<option value="">Velg dato først</option>');
            }
        });

        $('#dato').on('change', function () {
            var dato = $(this).val();
            var gren2 = $('#gren').val();
            if (dato) {
                $.ajax({
                    type: 'POST',
                    url: '.\\Database\\adminDBAjaxURL\\selectEvent.php',
                    data: {Dato : dato, Gren2 : gren2},
                    success: function (html) {
                        $('#tid').html(html);
                    }
                });
            } else {
                $('#tid').html('<option value="">Velg dato først</option>');
            }
        });
    });
</script>

</head>
<body>
    <?php
    session_start();
    include_once('diverse/navbarTemplate.php');
    include 'Database/dbtilknytning.php';

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

                                <div class="form-group" id="grenGroup">
                                    <label class="control-label" for="gren">
                                        Gren</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-option-vertical"></span>
                                        </span>
                                        <select class="form-control" name="gren" id="gren" onchange="valgtGren()">
                                            <option value="" selected hidden>Velg gren</option>
                                            <?php
                                            // Setter opp første dropdown
                                            $sql = "SELECT DISTINCT Gren FROM Event";
                                            $resultat = mysqli_query($db, $sql);

                                            if (!$resultat) {
                                                die(mysqli_error());
                                            }
                                            $rowCount = $resultat->num_rows;
                                            
                                            if ($rowCount > 0) {
                                                while ($row = mysqli_fetch_array($resultat)) {
                                                    echo "<option>" . $row['Gren'] . "</option>";
                                                }
                                            } else {
                                                echo '<option>Gren ikke tilgjengelig</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group" id="datoGroup">
                                    <label class="control-label" for="dato">
                                        Dato</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                        <select class="form-control" required="required" name="dato" id="dato" onchange="valgtDato()">
                                            <option value="">Velg gren først</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" id="tidGroup">
                                    <label class="control-label" for="tid">
                                        Tid</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                                        </span>
                                        <select class="form-control" required="required" name="tid" id="tid" onchange="valgtTid()">
                                            <option value="">Velg dato først</option>
                                        </select>
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
                                <button type="submit" class="btn btn-primary pull-right" name="knappBekreft" id="knappBekreft" onclick="" disabled>
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