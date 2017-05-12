<?php
    
    session_start();
    
    include('dbtilknytning.php');
    
    $email = $_POST['email'];
    
    $salt = 'ayylmao';
    $passord = md5($_POST['passord']+$salt);

    $sql = "SELECT * FROM User WHERE Epost = '$email' AND Password = '$passord'";
    $resultat = mysqli_query($db, $sql);

    if(!$resultat) {

        die(mysqli_error());

    }

    $check = mysqli_num_rows($resultat);

    if ($check > 0) {
        
        $userinfo = array();
        $sqlArray = mysqli_fetch_array($resultat);
        for ($i = 0; $i < 5; $i++) {

            $userinfo[$i] = $sqlArray[$i];

        }
        
        $_SESSION['user'] = $userinfo[0];
        $_SESSION['fornavn'] = $userinfo[1];
        $_SESSION['etternavn'] = $userinfo[2];
        $_SESSION['userlevel'] = $userinfo[3];
        $_SESSION['passord'] = $userinfo[0];
        header('location:../forside.php');

    }

    else {

        echo 'Ugyldig email eller passord.';

    }
    
    ?>
