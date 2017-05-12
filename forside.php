<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <!-- NB! Må ligge under meta taggene i <head> -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link href="css/forside.css" rel="stylesheet">
    <!--    <link rel="stylesheet" type="text/css" href="css/"/>-->
          
    <title>Ski-VM</title>

  </head>

  <body>

<!--- Navbar start -->
<?php
include "diverse/navbarTemplate.php";
?>
<!-- Navbar slutt -->
 
<!-- Innhold på siden -->

<div class="container">

    <!-- Header velkommen -->
    <header class="jumbotron hero-spacer">
        <h1>Velkommen til Ski-VM 2017</h1>
        <p>Her kan du lage bruker, melde deg som publikum, se utøvere og mye mer.</p>
        <p><a class="btn btn-primary btn-large">Lag bruker</a>
        </p>
    </header>
    <!-- Header slutt -->
    <hr>

    <!-- Tittel -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Valg</h3>
        </div>
    </div>
    <!-- Tittel slutt -->

    <!-- Valg -->
    <div class="row text-center">

        <div class="col-md-4 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="img/langrennsmall.jpg" alt="Ski bilde" class="bilde">
                <div class="caption">
                    <h3>Arrangementer</h3>
                    <p>Få oversikt over alle events og meld deg på som publikum.</p>
                    <p>
                        <a href="arrangementer.php" class="btn btn-primary">Se arrangementer</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="img/slalomsmall.jpg" alt="Ski bilde" class="bilde">
                <div class="caption">
                    <h3>Logg inn</h3>
                    <p>Har du allerede en bruker? Klikk nedenfor for å gå til påloggingen.</p>
                    <p>
                        <a href="loginPage.php" class="btn btn-primary">Logg inn</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="img/skiskytingsmall.jpg" alt="Ski bilde" class="bilde">
                <div class="caption">
                    <h3>Registrer deg</h3>
                    <p>Klikk nedenfor for å registrere en bruker, dersom du ikke har en fra før.</p>
                    <p>
                        <a href="registrerBruker.php" class="btn btn-primary">Registrer</a>
                    </p>
                </div>
            </div>
        </div>

    </div>
    <!-- Valg slutt -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Webprogrammering Prosjektoppgave HiOA - 2017</p>
            </div>
        </div>
    </footer>

</div>
    <!-- Footer slutt -->
   

    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>