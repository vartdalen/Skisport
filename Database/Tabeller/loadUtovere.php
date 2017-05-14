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
    $sql = "SELECT Athletes.idAthletes as ath_id, Athletes.Navn as ath_navn, Athletes.Etternavn as ath_surn, Exercises.Navn as exe_navn
            FROM Athletes
            INNER JOIN Exercises ON Athletes.idExercises = Exercises.idExercises;";
    $resultat = mysqli_query($db, $sql);
        
    echo "<div id='UtøverTable'><table class='table table-bordered table table-striped responsive'>
    <tr>
    <th>Utøver ID</th>
    <th>Utøvernavn</th>
    <th>Etternavn</th>
    <th>Gren</th>  
    </tr>";
    while($row = mysqli_fetch_array($resultat)) {
        echo "<tr>";
        echo "<td>" .$row['ath_id']. "</td>";
        echo "<td>" .$row['ath_navn']. "</td>";
        echo "<td>" .$row['ath_surn']. "</td>";
        echo "<td>" .$row['exe_navn']. "</td>";
        echo "</tr>";
    }
    echo "</table></div>" . "<br>";
?>