<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <!-- NB! Må ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
<!--    <link rel="stylesheet" type="text/css" href="css/"/>-->
          
    <title>Påmeldt</title>
    
    <style>
        
         html, body, .container-table {
            height: 100%;
        }
        .container-table {
            display: table;
        }
        .vertical-center-row {
            display: table-cell;
            vertical-align: middle;
        }
        
        #footer {
        
        text-align: center;

        }
        
    </style>

  </head>

  <body>
      
    <?php

    session_start();
       
    if (!isset($_SESSION['user'])) {
        
        header('location: forside.php');
    
    
    } else if (isset($_SESSION['user'])) {
        
        unset($_SESSION['user']);
        session_destroy();
    
    }
    
    if (isset($_SESSION['user'])){
        
        unset($_SESSION['user']);
        echo "<br/><br/><br/><br/>"."Vennligst kontakt systemansvarlig!";
        session_destroy();
    
    }
    
    include_once ('diverse/navbarTemplate.php');
    
    ?>
      
      <!-- Innhold på siden -->

    <div class="container container-table">

        <div class="row vertical-center-row">
        <!-- Header velkommen -->
        <header class="jumbotron hero-spacer">
            <h1>Du er logget ut.</h1>
            <p>Utloggingen var vellykket. Takk for besøket, kom snart igjen! <br>
            <p><a href="loginPage.php" class="btn btn-primary btn-large">Logg inn</a>
            </p>
        </header>
        <!-- Header slutt -->
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
    <!-- Footer slutt -->
      
      
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
