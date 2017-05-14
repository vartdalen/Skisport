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
        $sql = "SELECT DISTINCT Dato FROM Event Where Gren = '$gren'";
        $resultat = mysqli_query($db, $sql);

        if (!$resultat) {
            die(mysqli_error());
        }

        if (mysqli_num_rows($resultat) > 0) {
            while ($row = mysqli_fetch_array($resultat)) {
                echo "<option selected hidden>" . 'Velg dato' . "</option>";
                echo "<option>" . $row['Dato'] . "</option>";
            }
        } else {
            echo '<option>Dato ikke tilgjengelig</option>';
        }
    }
    
    $dato = $_REQUEST["Dato"];
    $gren2 = $_REQUEST["Gren2"];

    if(isset($dato) && !empty($dato)){
        $sql = "SELECT DISTINCT Tid FROM Event Where Dato = '$dato' AND Gren = '$gren2'";
        $resultat = mysqli_query($db, $sql);

        if (!$resultat) {
            die(mysqli_error());
        }

        if (mysqli_num_rows($resultat) > 0) {
            while ($row = mysqli_fetch_array($resultat)) {
                echo "<option selected hidden>" . 'Velg tid' . "</option>";
                echo "<option>" . $row['Tid'] . "</option>";
            }
        } else {
            echo '<option>Tid ikke tilgjengelig</option>';
        }
    }
?>
