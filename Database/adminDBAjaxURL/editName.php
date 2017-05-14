<?php
    session_start();
    $epostSess = $_SESSION["user"];
    
    // Connection variables
    $servername = "student.cs.hioa.no";
    $user = "s315613";

    // Connection
    $db = mysqli_connect($servername, $user, "", "s315613");
    $db->autocommit(false);
    if($db->connect_error) {
        die("Database tilkobling mislykket!");
    }
    
    // Hvis fornavn-feltet er fylt ut, men ikke etternavn
    $fornavn = $_REQUEST["Fornavn"];
    
    if(isset($fornavn) && (!empty($fornavn))){
        $db = mysqli_connect($servername, $user, "", "s315613");
        $db->autocommit(false);
        if($db->connect_error) {
            die("Database tilkobling mislykket!");
        }
        
        $sql = "UPDATE User SET Navn = '$fornavn' WHERE Epost = '$epostSess'";
        $resultat = mysqli_query($db, $sql);
        
        if(!$resultat) {
            $db->rollback();
        }else {
            $db->commit();
        }
        $db->close();
    }
    
    //Hvis etternavn-feltet er fylt ut, men ikke fornavn
    $etternavn = $_REQUEST["Etternavn"];
    
    if(isset($etternavn) && (!empty($etternavn))){
        $db = mysqli_connect($servername, $user, "", "s315613");
        $db->autocommit(false);
        if($db->connect_error) {
            die("Database tilkobling mislykket!");
        }
        
        $sql = "UPDATE User SET Etternavn = '$etternavn' WHERE Epost = '$epostSess'";
        $resultat = mysqli_query($db, $sql);
        
        if(!$resultat) {
            $db->rollback();
        }else {
            $db->commit();
        }
        $db->close();
    }
    
    if(isset($etternavn) && ($fornavn)){
        $db = mysqli_connect($servername, $user, "", "s315613");
        $db->autocommit(false);
        if($db->connect_error) {
            die("Database tilkobling mislykket!");
        }
        
        $sql = "UPDATE User SET Etternavn = '$etternavn', Navn = '$fornavn' WHERE Epost = '$epostSess'";
        $resultat = mysqli_query($db, $sql);
        
        if(!$resultat) {
            $db->rollback();
        }else {
            $db->commit();
        }
        $db->close();
    }
