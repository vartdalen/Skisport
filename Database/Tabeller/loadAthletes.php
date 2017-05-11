<?php
    // Tilkobling til database
    $servername = "student.cs.hioa.no";
    $user = "s315613";
    $db = mysqli_connect($servername, $user, "", "s315613");
    if(!$db) {
        die("Database tilkobling mislykket!");
    }   

    // Henter og printer ut database-informasjon til tabeller
    mysqli_select_db($db, "s315613");
    $sql = "SELECT * FROM Athletes";
    $resultat = mysqli_query($db, $sql);

    echo "<div id='UtøverTable'><table class='table table-bordered table table-striped responsive'>
    <td>Utøvere</td>
    <tr>
    <th>Utøver ID</th>
    <th>Navn</th>
    <th>Etternavn</th>
    <th>Øvelse ID</th>  
    </tr>";
    while($row = mysqli_fetch_array($resultat)) {
        echo "<tr>";
        echo "<td>" .$row['idAthletes']. "</td>";
        echo "<td>" .$row['Navn']. "</td>";
        echo "<td>" .$row['Etternavn']. "</td>";
        echo "<td>" .$row['idExercises']. "</td>";
        echo "</tr>";
    }
    echo "</table></div>" . "<br>";
?>

