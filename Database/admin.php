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
            Vennligst skriv inn epost:<br>
            <input type="text" name="navn" /><br><br>
            <input type="submit" name="knapp" value="Slett bruker"/>
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
            
            $url = "";
            $json = file_get_contents($url);
            $data = json_decode($json, true);
            
            echo "<table border=1>";
            echo "<tr>
                    <th>Epost</th>
                    <th>Navn</th>
                    <th>Etternavn</th>
                    <th>UserLevel</th>
                 </tr>";
            for ($i = 0; $i < $data.length; $i++){
                $row = $data['User'][$i];
                $no = $i + 1;
                echo "<tr>
                        <td>$no</td>
                        <td>$row[Epost]</td>
                        <td>$row[Navn]</td>
                        <td>$row[Etternavn]</td>
                        <td>$row[UserLevel]</td>
                     </tr>";
            }
            echo "</table>";
        
            if(isset($_POST["knapp"])) {
                
                // Connection variables
                $servername = "student.cs.hioa.no";
                $user = "s315613";
                
                // Database variables
                $navn = $_POST["navn"];
                
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
                    echo "Bruker ble ikke slettet. " .$db->error;
                }else {
                    $db->commit();
                    echo "Bruker ble slettet.";
                }
                echo "<br/>";

                $db->close();
            }
        ?>
    </body>
</html>
