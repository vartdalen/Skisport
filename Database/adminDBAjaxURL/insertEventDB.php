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
    $dato = $_REQUEST["Dato"];
    $tid = $_REQUEST["Tid"];
    
    $sql = "INSERT INTO Event(Gren, Dato, Tid) VALUES('$gren', '$dato', '$tid')";
    $resultat = mysqli_query($db, $sql);
    if(!$resultat) {
        $db->rollback();
    }else {
        $db->commit();
    }

    $db->close();

