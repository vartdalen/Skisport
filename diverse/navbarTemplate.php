<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container" id="c1">
        <div class="dropdown">
                    <ul class="nav navbar-right navbar-brand">
                        <li role="presentation" class="dropdown">
                            <div class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                
                                <?php if(isset($_SESSION['user'])) {
                                    echo "<span style=' margin-right: 0.5em;' class='glyphicon glyphicon-user'></span>";
                                    echo $_SESSION['fornavn'];
                                } else {
                                    echo "<span style=' margin-right: 0.5em; color:#3D3C3A' class='glyphicon glyphicon-user'></span>";
                                    echo "Bruker";
                                }
                                ?>
                                <span class="caret"></span>
                            </div>
                            <ul class="dropdown-menu">
                                <?php
                                    if(!isset($_SESSION['user'])) { 

                                    echo "<li id='registrerDeg'><a href='registrerBruker.php'>Registrer deg</a></li>";

                                    }
                                ?>
                                <?php
                                    if(isset($_SESSION['user'])) { 

                                    echo "<li id='profil'><a href='oppdaterInfo.php'>Profil</a></li>";

                                    }
                                ?>
                                <?php
                                    if(isset($_SESSION['user'])) { 

                                    echo "<li id='kalender'><a href='paameldingsOversikt.php'>Kalender</a></li>";

                                    }
                                ?>
                                <?php
                                    if(isset($_SESSION['user'])) {

                                        if ($_SESSION['userlevel'] == 1) {

                                        echo "<li id='admin'><a href='admin.php'>Admin</a></li>";

                                        }

                                    }
                                ?>
                                <li id="separator" role="separator" class="divider"></li>
                                <?php
                                    if(isset($_SESSION['user'])) {

                                    echo "<li id='logout'><a href='logout.php'>Logg ut</a></li>";

                                    } else {

                                    echo "<li id='login'><a href='loginPage.php'>Logg inn</a></li>";

                                    }
                                ?>
                            </ul>
                        </li>
                    </ul>
                </div>
        
            <div class="navbar-header">
            
            <a class="navbar-brand" href="forside.php"><span style=' margin-right: 0.5em;' class='glyphicon glyphicon-home'></span>Hjem</a>
            <a class="navbar-brand" href='arrangementer.php'><small>Arrangementer</small></a>
            <a class="navbar-brand" href='utovere.php'><small>Utøvere</small></a>
            <?php

                if(isset($_SESSION['user'])) { 

                echo "<a class='navbar-brand' href='form.php'><small>Påmelding</small></a>";

                }

            ?>
            
                
           
            
    </div>
           
</nav>