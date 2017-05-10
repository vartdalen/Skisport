<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <!-- NB! Må ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
<!--    <link rel="stylesheet" type="text/css" href="css/"/>-->
          
    <title>Bruker Hjemmeside</title>

  </head>

  <body>
      
      <?php
        session_start();
        if (!isset ($_POST['knappBekreft'])) {
            
        header('location: forside.php');
            
        }
        
        include_once('diverse/navbarTemplate.php');
        include_once 'klasser.php';
        
        $fornavn = ($_POST["fornavn"]);
        $etternavn = ($_POST["etternavn"]);
        $email = ($_POST["email"]);
        $passord = ($_POST["passord"]);
        
        //lager objekt av typen bruker og poster til databasen med lagre().
        $bruker = new bruker();
        $bruker->set_fornavn($fornavn);
        $bruker->set_etternavn($etternavn);
        $bruker->set_email($email);
        $bruker->set_passord($passord);
        $bruker->set_userlevel(0);
        $bruker->skriv_bruker_til_fil();
        $bruker->lagre($bruker);
        
      ?>
      
      
      
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
