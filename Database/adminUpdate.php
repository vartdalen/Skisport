<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Legg til</h2>
        <a href="adminDelete.php"><h2>Tilbake</h2></a>
        
        <h4>Forandre bruker</h4>
        <form action="" name="skjema" method="post" />
            Skriv inn epost:<br>
            <input type="text" name="Epost" /><br><br>

            UserLevel(0-1):<br>
            <input type="text" name="UserLevel" /><br><br>
            <input type="submit" name="knapp" value="Oppdater"/><br><br>
        </form>
        
        <h4>Legg til utøver</h4>
        <form action="" name="skjema" method="post" />
            Skriv inn fornavn:<br>
            <input type="text" name="fornavnAthlete" /><br><br>
            
            Skriv inn etternavn:<br>
            <input type="text" name="etternavnAthlete" /><br><br>

            Skriv inn idExercises:<br>
            <input type="text" name="idExercises" /><br><br>
            <input type="submit" name="knappUtøver" value="Opprett"/><br><br>
        </form>
                
        <h4>Legg til øvelse</h4>
        <form action="" name="skjema" method="post" />
            Øvelsesnavn:<br>
            <input type="text" name="navnExercises" /><br><br>
            
            Dato:<br>
            <input type="text" name="dato" /><br><br>
            
            <input type="submit" name="knappØvelse" value="Opprett"/><br><br>
        </form>
        <?php
        
            if(isset($_POST["knapp"])) {
                
                // Connection variables
                $servername = "student.cs.hioa.no";
                $user = "s315613";
                
                // Database variables
                $epost = $_POST["Epost"];
                $userLevel = $_POST["UserLevel"];
                
                // Connection
                $db = mysqli_connect($servername, $user, "", "s315613");
                $db->autocommit(false);
                if($db->connect_error) {
                    die("Database tilkobling mislykket!");
                }
                
                $sql = "UPDATE User SET UserLevel = '$userLevel' WHERE Epost = '$epost'";
                $resultat = mysqli_query($db, $sql);
                if(!$resultat) {
                    $db->rollback();
                    echo "Bruker ble ikke oppdatert. " .$db->error;
                }else {
                    $db->commit();
                    echo "Bruker ble oppdatert.";
                }
                echo "<br/>";

                $db->close();
            }
            
            if(isset($_POST["knappUtøver"])) {
                
                // Connection variables
                $servername = "student.cs.hioa.no";
                $user = "s315613";
                
                // Database variables
                $navn = $_POST["fornavnAthlete"];
                $etternavn = $_POST["etternavnAthlete"];
                $idExercises = $_POST["idExercises"];
                
                // Connection
                $db = mysqli_connect($servername, $user, "", "s315613");
                $db->autocommit(false);
                if($db->connect_error) {
                    die("Database tilkobling mislykket!");
                }
                
                $sql = "INSERT INTO Athletes (Navn, Etternavn, idExercises) ";
                $sql.= "VALUES ('$navn', '$etternavn', '$idExercises');";
                $resultat = mysqli_query($db, $sql);
                if(!$resultat) {
                    $db->rollback();
                    echo "Utøver ble ikke opprettet. " .$db->error;
                }else {
                    $db->commit();
                    echo "Utøver ble lagt til.";
                }
                echo "<br/>";

                $db->close();
            }
            
            if(isset($_POST["knappØvelse"])) {
                
                // Connection variables
                $servername = "student.cs.hioa.no";
                $user = "s315613";
                
                // Database variables
                $navn = $_POST["navnØvelse"];
                
                // Connection
                $db = mysqli_connect($servername, $user, "", "s315613");
                $db->autocommit(false);
                if($db->connect_error) {
                    die("Database tilkobling mislykket!");
                }
                
                $sql = "DELETE FROM User WHERE Epost = '$navn'";
                $resultat = mysqli_query($db, $sql);
                if(!$resultat) {
                    $db->rollback();
                    echo "Øvelse ble ikke slettet. " .$db->error;
                }else {
                    $db->commit();
                    echo "Øvelse ble slettet.";
                }
                echo "<br/>";

                $db->close();
            }
        ?>
    </body>
</html>
