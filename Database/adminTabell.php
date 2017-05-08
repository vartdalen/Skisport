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
        
        <script>
            function showUser(str) {
                if (str == "") {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else { 
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET","http://localhost/ProsjektSkiVM/Skisport/Database/adminTabell.php?q="+str,true);
                    xmlhttp.send();
                }
            }
            
            $.ajax({
                type: "GET",
                url: http://localhost/ProsjektSkiVM/Skisport/Database/adminTabell.php?
                success:function
            })
        </script>
    </head>
    <body>
        <h3>Admin hjemmeside</h3>
        <form>
            <select name="users" onchange="showUser(this.value)">
                <option value="">Select a Databasetable:</option>
                <option value="1">User</option>
                <option value="2">Athletes</option>
                <option value="3">Exercises</option>
                <option value="4">Event</option>
            </select>
        </form>
        <br>
        <div id="txtHint"><b>Database info will be listed here...</b></div>
        <br>
        
        <?php
            $q = intval($_GET['q']);
            
            // Tilkobling til database
            $servername = "student.cs.hioa.no";
            $user = "s315613";
            $db = mysqli_connect($servername, $user, "", "s315613");
            if(!$db) {
                die("Database tilkobling mislykket!");
            }
            
            // Henter og printer ut database-informasjon til tabeller
            mysqli_select_db($db, "s315613");
            $sql = "SELECT * FROM '".$q."'";
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
