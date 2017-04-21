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
        <form action="" name="skjema" method="post" />
            Navn:<br>
            <input type="text" name="navn" /><br>
            Etternavn:<br>
            <input type="text" name="etternavn" /><br>
            Epost:<br>
            <input type="text" name="epost" /><br><br>
            <input type="submit" name="knapp" value="Registrer"/>
        </form>
        <?php
            if(isset($_POST["knapp"])) {
                
                // Connection variables
                $servername = "student.cs.hioa.no";
                $user = "s315613";
                
                // Database variables
                $navn = $_POST["navn"];
                $etternavn = $_POST["etternavn"];
                $epost = $_POST["epost"];
                
                // Connection
                $db = mysqli_connect($servername, $user, "", "s315613");
                $db->autocommit(false);
                if($db->connect_error) {
                    die("Database tilkobling mislykket!");
                }
                
                $sql = "INSERT INTO Brukere (Navn, Etternavn, Epost) ";
                $sql.= "VALUES ('$navn', '$etternavn', '$epost');";
                $resultat = mysqli_query($db, $sql);
                if(!$resultat) {
                    $db->rollback();
                    echo "Bruker ble ikke opprettet. " .$db->error;
                }else {
                    $db->commit();
                    echo "Bruker ble registrert.";
                }
                echo "<br/>";

                $db->close();
            }
            ?>
    </body>
</html>
