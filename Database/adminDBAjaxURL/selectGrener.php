<?php
    // Connection variables
    $servername = "student.cs.hioa.no";
    $user = "s315613";

    // Connection
    $db = mysqli_connect($servername, $user, "", "s315613");
    $db->autocommit(false);
    if($db->connect_error) {
        die("Database tilkobling mislykket!");
    }
    
    $gren = $_REQUEST["Gren"];

        $sql = "SELECT idExercises FROM Exercises ORDER BY idExercises ASC";
        $resultat = mysqli_query($db, $sql);

        if (!$resultat) {
            die(mysqli_error());
        }

        if (mysqli_num_rows($resultat) > 0) {
            while ($row = mysqli_fetch_array($resultat)) {
                echo "<option>" . $row['idExercises'] . "</option>";
            }
        }

