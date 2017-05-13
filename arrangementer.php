<html lang="en">
  <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/loadTableFunctions.js"></script>
        <script src="js/adminDbFunctions.js"></script>
        
    <title>Arrangementer</title>

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
           h1 {
               text-align: center;
           }
        </style>
        
        <script>
            $(document).ready(function(){
                setInterval(function(){
                    $('#utdataEvent').load('.\\Database\\Tabeller\\loadEvent.php')
                }, 1000);
            })
        </script>
    
  </head>

  <body>
      
      <?php
        session_start();
        include_once('diverse/navbarTemplate.php');
      ?>
      
      <!-- Innhold på siden -->

    <div class="container container-table">

        <div class="row vertical-center-row">
            <header class='jumbotron'>
                <h1>Arrangementer</h1>
            </header>
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
    <!-- Footer slutt -->

    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
