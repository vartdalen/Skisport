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
    //var_dump($_REQUEST);

    $sql = "SELECT Dato FROM Event WHERE Gren = $gren";
    $resultat = mysqli_query($db, $sql);
    if(!$resultat) {
        $db->rollback();
        $db->error;
    }else {
        console.log($resultat);
        $db->commit();
    }

    $db->close();
    
