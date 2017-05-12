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
        
        <script>
            $(document).ready(function(){
                loadUser();
                loadAthletes();
                loadExercises();
            })
        </script>
        
        <title>Admin</title>
    </head>
    <body>
        
    <?php
        session_start();
        include_once('diverse/navbarTemplate.php');
        include_once ('Database/adminDbFunctions.php');
        
        if(!isset($_SESSION['user'])) {

            header('location: forside.php');

        } else if ($_SESSION['userlevel'] != 1) {

            header('location: forside.php');

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
    
    <hr class="separator">
    <div id="dbSuccess"></div>
    
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <button type="submit" class="btn btn-primary" onClick="loadUser()" />
                        Vis tabell
                        </button>
                    </div>
                    <div id="utdataUser">
                    </div>
                </div>
            </div>
        </div>
                
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <button type="submit" class="btn btn-primary" onClick="loadAthletes()" />
                        Vis tabell
                        </button>
                    </div>
                    <div id="utdataAthletes">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <button type="submit" class="btn btn-primary" onClick="loadExercises()" />
                        Vis tabell
                        </button>
                    </div>
                    <div id="utdataExercises">
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        
    </body>
</html>
