<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <!-- NB! Må ligge under meta taggene i <head>. -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
<!--    <link rel="stylesheet" type="text/css" href="css/"/>-->
          
    <title>placeholder</title>

  </head>

  <body>
    
    <?php
    
    session_start();
    
    if (isset($_SESSION['user'])) {
        
    session_destroy();   
    echo "<br/><br/><br/><br/>"."Du er nå logget ut";
    
    } else {
        
        echo "<br/><br/><br/><br/>"."hold kjeft";
        
    }
    
    ?>
      
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html><?php
