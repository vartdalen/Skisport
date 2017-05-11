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
    $sql = "SELECT * FROM User";
    $resultat = mysqli_query($db, $sql);

    echo "<div id='UserTable'><table class='table-bordered table table-striped responsive'>
    <td>User</td> 
    <tr>
    <th>Epost</th>
    <th>Navn</th>
    <th>Etternavn</th>
    <th>UserLevel</th>
    </tr>";
    while($row = mysqli_fetch_array($resultat)) {
        echo "<tr>";
        echo "<td>" .$row['Epost']. "</td>";
        echo "<td>" .$row['Navn']. "</td>";
        echo "<td>" .$row['Etternavn']. "</td>";
        echo "<td>" .$row['UserLevel']. "</td>";
        echo "</tr>";
    }
    echo "</table></div>" . "<br>";
?>