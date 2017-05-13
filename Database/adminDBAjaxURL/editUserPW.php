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
    $password = $_REQUEST["Passord"];
    $epost = $_REQUEST["Epost"];
    
    $salt = 'ayylmao';
    $newPassord = md5($_REQUEST["Passord"]+$salt);
    $finalpassword = $newPassord;
    
    $sql = "UPDATE User SET Password = '$finalpassword' WHERE Epost = '$epost'";
    $resultat = mysqli_query($db, $sql);
    if(!$resultat) {
        $db->rollback();
    }else {
        $db->commit();
    }

    $db->close();
