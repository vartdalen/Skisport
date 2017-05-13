<?php
      
        if (!isset($_POST['knappBekreft'])) {

        header('location: feilInput.php');

        }
        
        //blir kvitt ubrukelige sessionvariabler
        if (isset($_SESSION['skjemaUtfylt'])) {

            unset($_SESSION['skjemaUtfylt']);
            unset($_SESSION['fornavn']);
            unset($_SESSION['etternavn']);
            unset($_SESSION['epost']);
            unset($_SESSION['passord']);

        }
        
        function validerFornavn() {

            $fornavn = ($_POST["fornavn"]);
            $regexNavn = '/^[a-zA-Z ]{2,40}$/';

            if (!preg_match($regexNavn, $fornavn)) {

                return false;

            } else {
                
                return true;

            }

        }
        
        function validerEtternavn() {

            $etternavn = ($_POST["etternavn"]);
            $regexNavn = '/^[a-zA-Z ]{2,40}$/';

            if (!preg_match($regexNavn, $etternavn)) {
                
                return false;

            } else {
                
                return true;

            }

        }
        
        function validerEpost() {

            $epost = ($_POST["email"]);
            $regexEpost = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';

            if (!preg_match($regexEpost, $epost)) {
                
                return false;

            } else {
                
                return true;

            }

        }
        
        function validerPassord() {
            
            $passord = ($_POST["passord"]);
            $regexPassord = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/';

            if (!preg_match($regexPassord, $passord)) {
                
                return false;

            } else {
                
                return true;

            }
            
        }
        
        function validerRegistrering() {

            if (!validerFornavn() || !validerEtternavn() || !validerEpost() || !validerPassord()) {
                
                header('location: feilInput.php');
                return false;

            } else {
                
            include_once 'klasser.php';
        
            $fornavn = ($_POST["fornavn"]);
            $etternavn = ($_POST["etternavn"]);
            $email = ($_POST["email"]);

            $salt = 'ayylmao';
            $passord = md5($_POST["passord"]+$salt);
            $hashpassord = $passord;

            //lager objekt av typen bruker og poster til databasen med lagre().
            $bruker = new bruker();
            $bruker->set_fornavn($fornavn);
            $bruker->set_etternavn($etternavn);
            $bruker->set_email($email);
            $bruker->set_passord($hashpassord);
            $bruker->set_userlevel(0);
            $bruker->lagre($bruker);
                
            }
        }
            
      ?>