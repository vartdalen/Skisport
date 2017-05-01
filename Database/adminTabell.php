<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
                text-align: left;
            }
            div#UserTable, #UtøverTable, #ØvelseTable {
                width: 100%;    
                background-color: #f1f1c1;
            }
        </style>
    </head>
    <body>
        
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

            echo "<div id='UserTable';'><table border=1>
            <td>User</td>
            <tr>
            <th>Navn</th>
            <th>Etternavn</th>
            <th>Epost</th>
            <th>UserLevel</th>  
            </tr>";
            while($row = mysqli_fetch_array($resultat)) {
                echo "<tr>";
                echo "<td>" .$row['Navn']. "</td>";
                echo "<td>" .$row['Etternavn']. "</td>";
                echo "<td>" .$row['Epost']. "</td>";
                echo "<td>" .$row['UserLevel']. "</td>";
                echo "</tr>";
            }
            echo "</table></div>" . "<br>";
            
            mysqli_select_db($db, "s315613");
            $sql = "SELECT * FROM Athletes";
            $resultat = mysqli_query($db, $sql);

            echo "<div id='UtøverTable'><table border=1>
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
            
            mysqli_select_db($db, "s315613");
            $sql = "SELECT * FROM Exercises";
            $resultat = mysqli_query($db, $sql);

            echo "<div id='ØvelseTable'><table border=1>
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
            mysqli_close($db);
        ?>
    </body>
</html>
