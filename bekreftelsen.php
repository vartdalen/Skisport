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
        <h1>Gratulerer!</h1>
        <p>Du er nå påmeldt arrangement til Ski-VM 2017. Klikk på nedenfor for å gå til kalender og se hva du er meldt på</p>
        <p><a href="paameldingsOversikt.php" class="btn btn-primary btn-large">Kalender</a>
        </p>
    </header>
    <!-- Header slutt -->
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