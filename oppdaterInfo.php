<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <!-- NB! Må ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
<!--    <link rel="stylesheet" type="text/css" href="css/"/>-->
          
    <title>Brukerinformasjon</title>

  </head>

  <body>
      
     
    <?php

    session_start();
    include_once('diverse/navbarTemplate.php');

    ?>

    <script type="text/javascript">
        
        var removeself = document.getElementById("profil");
        removeself.style.display =  "none";
        
    </script>
      
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>