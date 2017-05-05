<?php

Class arrangement {
                
                private $gren;
                private $dato;
                private $email;
                private $passord;
                private $userlevel;
                
                public function set_gren($gren) {
                    
                    $this->gren = $gren;
                    
                }
                
                public function get_gren() {
                    
                    return $this->gren;
                    
                }
                
                
                public function set_dato($dato) {
                    
                    $this->dato = $dato;
                    
                }
                
                public function get_dato() {
                    
                    return $this->dato;
                    
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
                
                public function skriv_arrangement_til_fil() {
                    
                    $stringTilFil = $this->gren.",".$this->dato.
                                    ",".$this->email.",".$this->passord."\n";
                    
                    filhandterer::skriv_fil($stringTilFil);
                    
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

