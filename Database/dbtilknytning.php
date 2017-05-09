<?php

    //koble til databasen
    $servername = "student.cs.hioa.no";
    $user = "s315613";
    $db = mysqli_connect($servername, $user, "", "s315613");
    if(!$db) {
        die("Database tilkobling mislykket!");
    } 
//    else {
//        echo "Databasetilknytning opprettet!";
//    }
    
?>

