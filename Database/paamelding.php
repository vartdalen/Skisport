<?php
      
        if (!isset($_SESSION['user'])) {

        header('location: loginPage.php');

        } else if (!isset($_POST['knappBekreft'])) {

        header('location: feilInput.php');

        }
        
    //      include_once('diverse/navbarTemplate.php');

        function validerAntall() {

            $listSize = $_POST["listSize"];

            $antall = $_POST["antall"];
            $regexAntall = '/^(?:[1-5]|0[1-5])$/';

            //looper gjennom arrayet og sjekker en og en verdi. +=2 for å skippe kommaene.
            for ($i = 0; $i < ($listSize*2)-1; $i+=2) {

                if (!preg_match($regexAntall, $antall[$i])) {

                    return false;

                } else {

                    return true;

                }

            }

        }

        function validerGrener() {

            $listSize = $_POST["listSize"];
            
            //grener er er et array der hver enkelt tegn har egen indeks, fikser det med å bruke explode().
            $grener = $_POST["grener"];
            $grenerExploded = explode(',', $grener);
            
            $regexGrener = '/^[a-zA-Z]{3,15}$/';
            
            //looper gjennom arrayet og sjekker en og en verdi. +=2 for å skippe kommaene.
            for ($i = 0; $i < ($listSize*2)-1; $i+=2) {

                if (!preg_match($regexGrener, $grenerExploded[$i])) {
                    
                    return false;

                } else {

                    return true;

                }

            }

        }

        function validerDatoer() {

            $listSize = $_POST["listSize"];

            //datoer er er et array der hver enkelt tegn har egen indeks, fikser det med å bruke explode().
            $datoer = $_POST["datoer"];
            $datoerExploded = explode(',', $datoer);

            $regexDatoer = '/^\d{2}\.\d{2}\.\d{4}$/';

            //looper gjennom arrayet og sjekker en og en verdi.
            for ($i = 0; $i < $listSize; $i++) {

                if (!preg_match($regexDatoer, $datoerExploded[$i])) {

                    return false;

                } else {

                    return true;

                }

            }

        }

        function validerTider() {

            $listSize = $_POST["listSize"];

            //tider er er et array der hver enkelt tegn har egen indeks, fikser det med å bruke explode().
            $tider = $_POST["tider"];
            $tiderExploded = explode(',', $tider);

            $regexTider = '/^\d{2}\:\d{2}\-\d{2}\:\d{2}$/';

            //looper gjennom arrayet og sjekker en og en verdi.
            for ($i = 0; $i < $listSize; $i++) {

                if (!preg_match($regexTider, $tiderExploded[$i])) {

                    return false;

                } else {

                    return true;

                }

            }

        }

        function validerPaamelding() {

            if (!validerAntall() || !validerGrener() || !validerDatoer() || !validerTider()) {
                
                header('location: feilInput.php');
                return false;

            } else {
                
                include_once 'dbtilknytning.php';
                
                $db->autocommit(false);
                
                if($db->connect_error) {
                    die("Database tilkobling mislykket!");
                }
                
                $listSize = $_POST["listSize"];
                
                $epost = $_SESSION['user'];
                
                //$antall, $grener, $datoer og $tiderer array der hver enkelt tegn har egen indeks, fikser det med å bruke explode().
                $antall = $_POST["antall"];
                $antallExploded = explode(',', $antall);
                $grener = $_POST["grener"];
                $grenerExploded = explode(',', $grener);
                $datoer = $_POST["datoer"];
                $datoerExploded = explode(',', $datoer);
                $tider = $_POST["tider"];
                $tiderExploded = explode(',', $tider);
                
                for($i = 0; $i < $listSize; $i++) {
                    
                    $sql = "Insert into Registration(Epost, Personer, Gren, Dato, Tid) Values('$epost', '$antallExploded[$i]', '$grenerExploded[$i]', '$datoerExploded[$i]', '$tiderExploded[$i]')";
                    $resultat = $db->query($sql);
                    
                    if(!$resultat) {
                        
                        echo "Feil! Påmelding ble ikke registrert.".$db->error;
                        
                    }
                    
                    $db->commit();
                    
                }
                $db->close();
                header('location: paameldt.php');
            }

        }

        validerPaamelding();

      ?>