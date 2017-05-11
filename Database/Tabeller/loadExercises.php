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
    $sql = "SELECT * FROM Exercises";
    $resultat = mysqli_query($db, $sql);

    echo "<div id='ØvelseTable'><table class='table table-bordered table table-striped responsive'>
    <td>Øvelser</td>
    <tr>
    <th>Øvelse ID</th>
    <th>Navn</th>
    <th>Dato</th>
    </tr>";
    while($row = mysqli_fetch_array($resultat)) {
        echo "<tr>";
        echo "<td>" .$row['idExercises']. "</td>";
        echo "<td>" .$row['Navn']. "</td>";
        echo "<td>" .$row['Dato']. "</td>";
        echo "</tr>";
    }
    echo "</table></div>" . "<br>";
?>

