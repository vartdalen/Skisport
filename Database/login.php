<?php
    
    session_start();
    
    include('loginDbtilknytning.php');
    
    $_SESSION['email'] = $_POST['email'];
    
    $email = $_SESSION['email'];
    $passord = $_POST['passord'];

    $sql = "SELECT * FROM User WHERE Epost = '$email' AND Password = '$passord'";
    $resultat = mysqli_query($db, $sql);

    if(!$resultat) {

        die(mysqli_error());

    }

    $check = mysqli_num_rows($resultat);

    if ($check > 0) {

        $_SESSION['user'] = $email;
        header('location:../forside.php');

    }

    else {

        echo 'Ugyldig email eller passord.';

    }
    
    ?>
