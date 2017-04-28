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
        <a href="adminJSON.php"><h2>Tilbake</h2></a>
        
        <h4>Legg til bruker</h4>
        <form action="" name="skjema" method="post" />
            Skriv inn epost:<br>
            <input type="text" name="Epost" /><br><br>
            
            Skriv inn fornavn:<br>
            <input type="text" name="Fornavn" /><br><br>
            
            Skriv inn etternavn:<br>
            <input type="text" name="Etternavn" /><br><br>
            
            Skriv inn UserLevel(0-1):<br>
            <input type="text" name="UserLevel" /><br><br>
            <input type="submit" name="knapp" value="Opprett"/><br><br>
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
            // Connection variables
            $servername = "student.cs.hioa.no";
            $user = "s315613";
            
            $db = mysqli_connect($servername, $user, "", "s315613");
            if($db->connect_error) {
                die("Database tilkobling mislykket!");
            }
            
            //$sql = "Select * from User";
            $sql = "SELECT Athletes.idAthletes, Athletes.Navn, Athletes.Etternavn, Exercises.navn, Exercises.Dato
                    FROM Athletes
                    INNER JOIN Exercises ON Athletes.idExercises = Exercises.idExercises";
            $resultat = $db->query($sql);
            $rader = array();
            
            while($rad = $resultat->fetch_object()) {
                $rader[] = $rad;
                echo "<br>";
            }
            
            $jasonData = json_encode($rader, JSON_PRETTY_PRINT);
            echo $jasonData;
        
            if(isset($_POST["knapp"])) {
                
                // Connection variables
                $servername = "student.cs.hioa.no";
                $user = "s315613";
                
                // Database variables
                $navn = $_POST["Fornavn"];
                $etternavn = $_POST["Etternavn"];
                $epost = $_POST["Epost"];
                $userLevel = $_POST["UserLevel"];
                
                // Connection
                $db = mysqli_connect($servername, $user, "", "s315613");
                $db->autocommit(false);
                if($db->connect_error) {
                    die("Database tilkobling mislykket!");
                }
                
                $sql = "INSERT INTO User (Navn, Etternavn, Epost, UserLevel) ";
                $sql.= "VALUES ('$navn', '$etternavn', '$epost', '$userLevel');";
                $resultat = mysqli_query($db, $sql);
                if(!$resultat) {
                    $db->rollback();
                    echo "Bruker ble ikke opprettet. " .$db->error;
                }else {
                    $db->commit();
                    echo "Bruker ble lagt til.";
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
