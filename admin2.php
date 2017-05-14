<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/loadTableFunctions.js"></script>
        <script src="js/adminDbFunctions.js"></script>
        
        <title>Admin</title>
        
        <script>
            $(document).ready(function () {
                var gren = $(this).val();
                    $.ajax({
                        type: 'POST',
                        url: '.\\Database\\adminDBAjaxURL\\selectGrener.php',
                        data: {Gren : gren},
                        success: function (html) {
                            $('#idEx').html(html);
                        }
                    });
            });
        </script>
    </head>
    <body>
        
    <?php
        session_start();
        include_once('diverse/navbarTemplate.php');
        include_once ('Database/adminDbFunctions.php');
        include 'Database/dbtilknytning.php';
        
        if(!isset($_SESSION['user'])) {

            header('location: loginPage.php');

        } else if ($_SESSION['userlevel'] != 1) {

            header('location: feil.php');

        }
    ?>
        
        <script type="text/javascript">
        
            var removeself = document.getElementById("admin");
            removeself.style.display =  "none";
        
        </script>
        
        <div class="jumbotron jumbotron-sm">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <h1 class="h1">
                            Admin <small>Administrer brukere og arrangementer</small></h1>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="fornavn">Bruker</label>
                                <hr class="separator">  
                                <div class="form-group">
                                    <label for="userFornavn">
                                        Fornavn</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                        </span>
                                        <input type="text" class="form-control" id="userFornavn" placeholder="Skriv inn fornavn"/>
                                    </div>
                                </div>
                                
                                <hr class="separator">
                                
                                <div class="form-group">
                                    <label for="userEtternavn">
                                        Etternavn</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                        </span>
                                        <input type="text" class="form-control" id="userEtternavn" placeholder="Skriv inn etternavn" />
                                    </div>
                                </div>
                                
                                <hr class="separator">
                                
                                <div class="form-group">
                                    <label for="userEpost">
                                        Epost</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                        </span>
                                        <input type="text" class="form-control" id="userEpost" placeholder="Skriv inn epost" />
                                    </div>
                                </div>                                    
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary pull-right" value="Slett bruker" onclick="deleteUser()">
                                </div>                                    
                                <hr class="separator">
                                
                                <div class="form-group">
                                    <label for="userEpost1">
                                        Epost</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                        </span>
                                        <input type="text" id="userEpost1" class="form-control" placeholder="Skriv inn bruker sin epost"/>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="userPassord">
                                        Passord</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-option-vertical"></span>
                                        </span>
                                        <input type="password" id="userPassord" class="form-control" placeholder="Skriv inn passord"/>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="submit" class="btn btn-primary pull-right" value="Endre passord" onclick="editPW()">
                                </div>                                    
                                <hr class="separator">
                                
                                <div class="form-group">
                                    <label for="user-level">
                                        Endring av User-level</label>
                                    <div class="form-group">
                                        <select id="user-level" class="form-control">
                                            <option selected hidden>Velg user-level</option>
                                            <option>0 (vanlig bruker)</option>
                                            <option>1 (admin)</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="userEpost2">
                                        Epost</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                        </span>
                                        <input type="text" class="form-control" id="userEpost2" placeholder="Skriv inn bruker sin epost" />
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="submit" class="btn btn-primary pull-right" value="Endre user-level" onclick="editUserLevel()">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div>
                        <button type="submit" class="btn btn-primary" onClick="loadUser()" />
                        Vis tabell
                        </button>
                    </div>
                    <div id="utdataUser" style="display: none;">
                    </div>
                </div>
                
            </div>
        </div>
        
        <!-- Endring for utøvere -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-md-12">                                    
                                <label for="fornavn">Utøvere</label>
                                <hr class="separator">
                                
                                <div class="form-group">
                                    <label for="athFornavn">
                                        Fornavn</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                        </span>
                                        <input type="text" class="form-control" id="athFornavn" placeholder="Skriv inn fornavn"/>
                                    </div>
                                </div>
                                
                                <hr class="separator">
                                
                                <div class="form-group">
                                    <label for="athEtternavn">
                                        Etternavn</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                        </span>
                                        <input type="text" class="form-control" id="athEtternavn" placeholder="Skriv inn etternavn"/>
                                    </div>
                                </div>
                                <hr class="separator">
                                <div class="form-group">
                                    <label for="idEx">
                                        Øvelse ID</label>
                                    <div class="form-group">
                                        <select id="idEx" class="form-control">
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
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <hr class="separator">
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="submit" class="btn btn-primary pull-right" value="Legg til" onclick="addAthletes()">
                                    </div>
                                </div>   
                            </div>
                            
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary pull-right" value="Slett" onclick="deleteAthletes()">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div>
                        <button type="submit" class="btn btn-primary" onClick="loadAthletes()" />
                        Vis tabell
                        </button>
                    </div>
                    <div id="utdataAthletes"  style="display: none;">
                    </div>
                </div>
                
            </div>
        </div>
        
        <!-- Endring for arrangementer -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Arrangementer</label>
                                <hr class="separator">
                                <div class="form-group">
                                    <label for="gren">
                                        Gren</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-option-horizontal"></span>
                                        </span>
                                        <input type="text" class="form-control" id="gren" placeholder="Skriv inn øvelsesnavn" />
                                    </div>
                                    <label for="datoEvent">
                                        Dato</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                        <input type="text" class="form-control" id="datoEvent" placeholder="Skriv inn dato (dd.mm.yyyy)" />
                                    </div>
                                    <label for="tidEvent">
                                        Tid</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                                        </span>
                                        <input type="text" class="form-control" id="tidEvent" placeholder="Skriv inn tid (mm:tt-mm:tt)" />
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="submit" class="btn btn-primary pull-right" value="Legg til" onclick="addEvent()">
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="separator">
                                    <label for="slettEvent">
                                        Event ID</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-option-vertical"></span>
                                        </span>
                                        <input type="text" class="form-control" id="slettEvent" placeholder="Skriv inn event ID'en du vil slette" />
                                    </div> 
                                </div>  
                            </div>
                            <br/>
                            
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary pull-right" value="Slett event" onclick="deleteEvent()">
                                
                            </div> 
                        </div>
                        
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div>
                        <button type="submit" class="btn btn-primary" onClick="loadEvent()" />
                        Vis tabell
                        </button>
                    </div>
                    <div id="utdataEvent"  style="display: none;">
                    </div>
                </div>    
                
            </div>
        </div>
        
        <!-- Bootstrap JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        
    </body>
</html>
