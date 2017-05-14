<?php
    session_start();
    // Tilkobling til database
    $servername = "student.cs.hioa.no";
    $user = "s315613";
    $db = mysqli_connect($servername, $user, "", "s315613");
    if(!$db) {
        die("Database tilkobling mislykket!");
    }
    
    $epost = $_SESSION['user'];
    
    // Henter og printer ut database-informasjon til tabeller
    mysqli_select_db($db, "s315613");
    $sql = "SELECT Personer, Gren, Dato, Tid FROM Registration WHERE Epost = '$epost' ORDER BY Dato";
    $resultat = mysqli_query($db, $sql);

    echo "<div><table class='table-bordered table table-striped responsive'>
    <tr>
    <th>Personer</th>
    <th>Gren</th>
    <th>Dato</th>
    <th>Tid</th>
    </tr>";
    if(mysqli_num_rows($resultat) > 0){
        while($row = mysqli_fetch_array($resultat)) {
            echo "<tr>";
            echo "<td>" .$row['Personer']. "</td>";
            echo "<td>" .$row['Gren']. "</td>";
            echo "<td>" .$row['Dato']. "</td>";
            echo "<td>" .$row['Tid']. "</td>";
            echo "</tr>";
        } 
    }
?>