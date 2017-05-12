<?php

// Funksjoner relatert til tabell Exercises(Øvelser)

function deleteExercise(){
        // Connection variables
        $servername = "student.cs.hioa.no";
        $user = "s315613";

        // Database variables
        $navn = $_POST["navnØvelse"];

        // Connection
        $db = mysqli_connect($servername, $user, "", "s315613");
        $db->autocommit(false);
        if($db->connect_error) {
            die("Database tilkobling mislykket!");
        }

        $sql = "DELETE FROM Exercises WHERE Navn = '$navn'";
        $resultat = mysqli_query($db, $sql);
        if(!$resultat) {
            $db->rollback();
            echo "Øvelse ble ikke slettet. " .$db->error;
        }else {
            $db->commit();
            echo "Øvelse ble slettet.";
        }
        echo "<br/>";

        $db->close();
}

function addExercise(){
        // Connection variables
        $servername = "student.cs.hioa.no";
        $user = "s315613";

        // Database variables
        $navn = $_POST["navnØvelse"];

        // Connection
        $db = mysqli_connect($servername, $user, "", "s315613");
        $db->autocommit(false);
        if($db->connect_error) {
            die("Database tilkobling mislykket!");
        }

        $sql = "INSERT INTO Exercises(Navn) VALUES('$navn')";
        $resultat = mysqli_query($db, $sql);
        if(!$resultat) {
            $db->rollback();
            echo "Øvelse ble ikke lagt til. " .$db->error;
        }else {
            $db->commit();
            echo "Øvelse ble lagt til.";
        }
        echo "<br/>";

        $db->close();
}
