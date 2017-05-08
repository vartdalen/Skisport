<?php

Class bruker {
                
                private $fornavn;
                private $etternavn;
                private $email;
                private $passord;
                private $userlevel;
                
                public function set_fornavn($fornavn) {
                    
                    $this->fornavn = $fornavn;
                    
                }
                
                public function get_fornavn() {
                    
                    return $this->fornavn;
                    
                }
                
                
                public function set_etternavn($etternavn) {
                    
                    $this->etternavn = $etternavn;
                    
                }
                
                public function get_etternavn() {
                    
                    return $this->etternavn;
                    
                }
                
                
                public function set_email($email) {
                    
                    $this->email = $email;
                    
                }
            
                public function get_email() {
                    
                    return $this->email;
                    
                }
                
                
                public function set_passord($passord) {
                    
                    $this->passord = $passord;
                    
                }
                
                public function get_passord() {
                    
                    return $this->passord;
                    
                }
                
                public function set_userlevel($userlevel) {
                    
                    $this->userlevel = $userlevel;
                    
                }
                
                public function get_userlevel() {
                    
                    return $this->userlevel;
                    
                }
                
                public function skriv_bruker_til_fil() {
                    
                    $stringTilFil = $this->fornavn.",".$this->etternavn.
                                    ",".$this->email.",".$this->passord.
                                    ",".$this->userlevel."\n";
                    
                    filhandterer::skriv_fil($stringTilFil);
                    
                }
                
                public function lagre($bruker) {
        
                    //$epost = $bruker->get_email();
                    $epost = $bruker->get_email();
                    $fornavn = $bruker->get_fornavn();
                    $etternavn = $bruker->get_etternavn();
                    $userlvl = $bruker->get_userlevel();
                    $passord = $bruker->get_passord();

                    // Connection variables
                    $servername = "student.cs.hioa.no";
                    $user = "s315613";

                    // Connection
                    $db = new mysqli($servername, $user, "", "s315613");
                    $db->autocommit(false);
                    if($db->connect_error) {
                        die("Database tilkobling mislykket!");
                    }

                    $sql = "Insert into User(Epost, Navn, Etternavn, UserLevel, Password) Values('$epost', '$fornavn', '$etternavn', '$userlvl', '$passord')";
                    $resultat = $db->query($sql);
                    if(!$resultat) {
                        echo "Feil! Bruker ble ikke registrert." .$db->error;
                    }else {
                        echo "Bruker ble registrert.";
                    }
                    echo "<br/>";
                    $db->commit();
                    $db->close();
                }
                
            }

Class filhandterer {
                
                static function skriv_fil($tekst) {
                    
                    $resultat = true;
                    $filref = fopen("klassedump.txt", "a");
                    
                    if (!$filref) {
                        
                        $resultat = false;
                        
                    } else {
                        
                        $ok = fwrite($filref, $tekst);
                        if(!$ok) {
                            
                            $resultat = false;
                            
                        }
                        
                    }
                    
                    if($resultat) {
                        
                        echo "informasjon er skrevet til fil<br/>";
                        
                    } else {
                        
                        echo "informasjon er ikke skrevet til fil<br/>";
                        
                    }
                    
                }
                
            }

?>