<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <!-- NB! Må ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
<!--    <link rel="stylesheet" type="text/css" href="css/"/>-->
          
    <title>Bruker registrert</title>

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
        if (!isset ($_POST['knappBekreft'])) {
            
        header('location: forside.php');
            
        }
        
//        include_once 'Database/registering.php';
        include_once('diverse/navbarTemplate.php');
        include_once 'klasser.php';
        
        $fornavn = ($_POST["fornavn"]);
        $etternavn = ($_POST["etternavn"]);
        $email = ($_POST["email"]);
        
        $salt = 'ayylmao';
        $passord = md5($_POST["passord"]+$salt);
        
        //lager objekt av typen bruker og poster til databasen med lagre().
        $bruker = new bruker();
        $bruker->set_fornavn($fornavn);
        $bruker->set_etternavn($etternavn);
        $bruker->set_email($email);
        $bruker->set_passord($passord);
        $bruker->set_userlevel(0);
        $bruker->lagre($bruker);
        
      ?>
      
      <!-- Innhold på siden -->

    <div class="container container-table">

        <div class="row vertical-center-row">
        <!-- Header velkommen -->
        <header class="jumbotron hero-spacer">
            <h1>Takk for din registrering.</h1>
            <p>Du har nå muligheten til å melde deg på våre arrangementer og forandre brukerinformasjon og påmeldte arrangementer. 
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
