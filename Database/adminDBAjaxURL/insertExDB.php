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
    var_dump($_REQUEST);

    $sql = "INSERT INTO Exercises(Navn) VALUES('$navn')";
    $resultat = mysqli_query($db, $sql);
    if(!$resultat) {
        $db->rollback();
        echo "Øvelse ble ikke lagt til. " .$db->error;
    }else {
        $db->commit();
        echo "Øvelse ble lagt til.";
    }
        
    $db->close();


