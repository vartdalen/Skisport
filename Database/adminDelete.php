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
        <h2>Sletteside admin</h2>
        <a href="adminUpdate.php"><h2>Legg til</h2></a>
        
        <h4>Slett bruker</h4>
        <form action="" name="skjema" method="post" />
        Epost:<br>
        <input type="text" name="Epost" /><br><br>
        
        Fornavn:<br>
        <input type="text" name="Fornavn" /><br><br>
        
        Etternavn:<br>
        <input type="text" name="Etternavn" /><br><br>
        <input type="submit" name="knapp" value="Slett"/><br><br>
    </form>
    
        <h4>Slett utøver</h4>
        <form action="" name="skjema" method="post" />
        Fornavn:<br>
        <input type="text" name="fornavnAthlete" /><br><br>

        Etternavn:<br>
        <input type="text" name="etternavnAthlete" /><br><br>

        <input type="submit" name="knappUtøver" value="Slett"/><br><br>
        </form>

        <h4>Slett øvelse</h4>
        <form action="" name="skjema" method="post" />
        Øvelsesnavn:<br>
        <input type="text" name="navn" /><br><br>

        <input type="submit" name="knappØvelse" value="Slett"/><br><br>
        </form>

        <?php
            if(isset($_POST["knapp"])) {
                
                // Connection variables
                $servername = "student.cs.hioa.no";
                $user = "s315613";
                
                // Database variables
                $navn = $_POST["Fornavn"];
                $etternavn = $_POST["Etternavn"];
                $epost = $_POST["Epost"];
                
                // Connection
                $db = mysqli_connect($servername, $user, "", "s315613");
                $db->autocommit(false);
                if($db->connect_error) {
                    die("Database tilkobling mislykket!");
                }
                
                $sql = "DELETE FROM User WHERE Epost = '$epost' AND Navn = '$navn' AND Etternavn = '$etternavn'";
                $resultat = mysqli_query($db, $sql);
                if(!$resultat) {
                    $db->rollback();
                    echo "Bruker ble ikke slettet. " .$db->error;
                }else {
                    $db->commit();
                    echo "Bruker ble slettet.";
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
                
                // Connection
                $db = mysqli_connect($servername, $user, "", "s315613");
                $db->autocommit(false);
                if($db->connect_error) {
                    die("Database tilkobling mislykket!");
                }
                
                $sql = "DELETE FROM Athletes WHERE Navn = '$navn' AND Etternavn = '$etternavn'";
                $resultat = mysqli_query($db, $sql);
                if(!$resultat) {
                    $db->rollback();
                    echo "Utøver ble ikke slettet. " .$db->error;
                }else {
                    $db->commit();
                    echo "Utøver ble slettet.";
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
