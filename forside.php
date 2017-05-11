<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <!-- NB! Må ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
          
    <title>placeholder</title>

  </head>
  
  
      
      <?php
      
      session_start();
      include_once('diverse/navbarTemplate.php');
      
      ?>
      
    <?php

    if (isset($_SESSION['user'])) {
        
        echo "<br/><br/><br/><br/>"."Du er nå logget inn";
        echo "<br/>".$_SESSION['user'];
        echo "<br/>".$_SESSION['userlevel'];
    
    }
    ?>
      
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>

