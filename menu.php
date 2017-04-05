<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="font-family: verdana, sans-serif, arial;">
        
    <!-- Bootstrap CSS -->
    <!-- NB! Må ligge ØVERST i <body>. -->
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
<!--    <link rel="stylesheet" type="text/css" href="cssmenu.css"> funker ikke-->
    
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container" id="c1">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Hjem</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">Arrangementer</a></li>
                    <li><a href="login.html">Admin</a></li>
                </ul>
                
                <ul style="float: right" class="nav navbar-nav">
                    <li id="loggav"><a href="#loggav">Logg av</a></li>
                </ul>
            </div><!--navbar collapse-->
        </div>
    </nav>

<form>
    
    <div class="container" style="background-color: #E8E8EE; margin-top: 5em; padding: 1em; border: 1px solid #ccc; border-radius: 4px; width: 50%;" >
        <div class="form-group">

            <label>Email adresse</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Skriv inn Email">
        
        </div>
        <div class="form-group">
            
            <label>Fornavn</label>
            <input type="text" class="form-control" id="inputFornavn" placeholder="Skrin inn fornavn">
            
        </div>
        <div class="form-group">
            
            <label>Etternavn</label>
            <input type="text" class="form-control" id="inputEtternavn" placeholder="Skrin inn etternavn">
            
        </div>
        <fieldset class="form-group row">
            
            <legend class="col-form-legend col-sm-1">Arrangementer</legend>
            <br/><br/>
                    <div class ="col-sm-10">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="gridCheckbox" id="gridCheckbox1" value="valg1"> valg1</input><br>
                                <input class="form-check-input" type="checkbox" name="gridCheckbox" id="gridCheckbox2" value="valg2"> valg2</input><br>
                                <input class="form-check-input" type="checkbox" name="gridCheckbox" id="gridCheckbox3" value="valg3"> valg3</input><br>
                            </label>  
                        </div>
                    </div>
        </fieldset>
        
        
    </div>
    
</form>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"</script>
    
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </body>
</html>