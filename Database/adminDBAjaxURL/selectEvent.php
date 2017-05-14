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

    if(isset($gren) && !empty($gren)){
        $sql = "SELECT Dato FROM Event Where Gren = '$gren'";
        $resultat = mysqli_query($db, $sql);

        if (!$resultat) {
            die(mysqli_error());
        }
        $rowCount = $resultat->num_rows;

        if ($rowCount > 0) {
            while ($row = mysqli_fetch_array($resultat)) {
                echo "<option>" . $row['Dato'] . "</option>";
            }
        } else {
            echo '<option>Dato ikke tilgjengelig</option>';
        }
    }

    $dato = $_REQUEST["Dato"];

    if(isset($dato) && !empty($dato)){
        $sql = "SELECT Tid FROM Event Where Dato = '$dato'";
        $resultat = mysqli_query($db, $sql);

        if (!$resultat) {
            die(mysqli_error());
        }
        $rowCount = $resultat->num_rows;

        if ($rowCount > 0) {
            while ($row = mysqli_fetch_array($resultat)) {
                echo "<option>" . $row['Tid'] . "</option>";
            }
        } else {
            echo '<option>FEIL: Tid ikke tilgjengelig</option>';
        }
    }
?>