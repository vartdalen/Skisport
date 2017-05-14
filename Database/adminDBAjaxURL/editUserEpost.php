<?php
    session_start();
    // Connection variables
    $servername = "student.cs.hioa.no";
    $user = "s315613";

    // Connection
    $db = mysqli_connect($servername, $user, "", "s315613");
    $db->autocommit(false);
    if($db->connect_error) {
        die("Database tilkobling mislykket!");
    }
    $nyEpost = $_REQUEST["Epost"];
    $epostSess = $_SESSION["user"];
    
    $sql = "UPDATE User SET Epost = '$nyEpost' WHERE Epost = '$epostSess'";
    $resultat = mysqli_query($db, $sql);
    if(!$resultat) {
        $db->rollback();
    }else {
        $db->commit();
    }

    $db->close();
