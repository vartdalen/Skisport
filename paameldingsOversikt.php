<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <!-- NB! Må ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/loadTableFunctions.js"></script>
    <script src="js/adminDbFunctions.js"></script>
          
    <title>Kalender</title>
    
    <style>
            html, body, .container-table {
               height: 100%;
           }
           .container-table {
               display: table;
               padding-top: 7em;
           }
           .vertical-center-row {
               display: table-cell;
               vertical-align: middle;
           }
           #footer {
                text-align: center;
           }
           h1 {
               text-align: center;
           }
        </style>
        
        <script>
            $(document).ready(function(){
                setInterval(function(){
                    $('#utdataEvent').load('.\\Database\\Tabeller\\loadKalender.php')
                }, 1000);
            });
        </script>

  </head>

  <body>
      
    <?php

    session_start();
    
    if (!isset($_SESSION['user'])) {
        
        header('location: loginPage.php');
        
    }
    
    include_once('diverse/navbarTemplate.php');

    ?>

    <script type="text/javascript">
        
        var removeself = document.getElementById("kalender");
        removeself.style.display =  "none";
        
    </script>
    
    <div class="container container-table">
    
        <div class="jumbotron jumbotron-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <h1 class="h1">
                                Kalender <small>Oversikt over dine påmeldinger</small></h1>
                        </div>
                    </div>
                </div>
         

        <div id="utdataEvent">
        </div>

        <hr>
       
        <!-- Footer -->
        <footer>
            <div class="row">
                <div id="footer" class="col-lg-12">
                    <p>Copyright &copy; Webprogrammering Prosjektoppgave HiOA - 2017</p>
                </div>
            </div>
        </footer>
        </div>
    </div>
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>