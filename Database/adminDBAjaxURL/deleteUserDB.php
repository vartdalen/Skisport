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

    $navn = $_REQUEST["Navn"];
    $etternavn = $_REQUEST["Etternavn"];
    $epost = $_REQUEST["Epost"];

    $sql = "DELETE FROM User WHERE Navn = '$navn' AND Etternavn = '$etternavn' AND Epost = '$epost'";
    $resultat = mysqli_query($db, $sql);
    if(!$resultat) {
        $db->rollback();
    }else {
        $db->commit();
    }

    $db->close();
