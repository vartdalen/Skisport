/**
 * Denne JS-filen inneholder alle ADMIN funksjoner som er knyttet til endring/sletting/adding til Database-tabellene
 * 
 */

/**
 * Funksjoner for relatert til tabell Exercises(Øvelser)
 * 
 */
function addExercise(){
    const getUrl = ".\\Database\\adminDBAjaxURL\\insertExDB.php";

    const name = $('#navnØvelse').val();
    if(name == ''){
        alert('Skriv inn øvelsesnavn!');
        return false;
    }
    
    $.ajax({
        url: getUrl,
        type: "POST",
        data:{ Navn: name },
        success:function(res){
            alert(res + 'Øvelse ble lagt til!');
        },
        error:function(err){
            console.log(err);
        }
    });
}

function deleteExercise(){
    const getUrl = ".\\Database\\adminDBAjaxURL\\deleteExDB.php";

    const name = $('#navnØvelse').val();
    if(name == ''){
        alert('Skriv inn øvelsesnavn!');
        return false;
    }
    
    $.ajax({
        url: getUrl,
        type: "POST",
        data:{ Navn: name },
        success:function(res){
            alert(res + 'Øvelse ble slettet!');
        },
        error:function(err){
            console.log(err);
        }
    });
}

/**
 * Funksjoner for relatert til tabell Athletes(Utøvere)
 * 
 */
function addAthletes(){
    const getUrl = ".\\Database\\adminDBAjaxURL\\insertAthDB.php";

    const name = $('#athFornavn').val();
    const etternavn = $('#athEtternavn').val();
    const idEx = $('#idEx').val();
    if(name == '' || etternavn == '' || idEx == ''){
        alert('Feil. Felt mangler!');
        return false;
    }
    
    $.ajax({
        url: getUrl,
        type: "POST",
        data:{ Navn: name, Etternavn : etternavn, idEx : idEx },
        success:function(res){
            alert(res + 'Utøver ble lagt til!');
        },
        error:function(err){
            console.log(err);
        }
    });
}

function deleteAthletes(){
    const getUrl = ".\\Database\\adminDBAjaxURL\\deleteAthDB.php";

    const name = $('#athFornavn').val();
    const etternavn = $('#athEtternavn').val();
    if(name == '' || etternavn == ''){
        alert('Skriv inn Fornavn og Etternavn!');
        return false;
    }
    
    $.ajax({
        url: getUrl,
        type: "POST",
        data:{ Navn: name, Etternavn : etternavn },
        success:function(res){
            alert(res + 'Utøver ble slettet');
        },
        error:function(err){
            console.log(err);
        }
    });
}

/**
 * Funksjoner for relatert til tabell User(Brukere)
 * 
 */
function deleteUser(){
    const getUrl = ".\\Database\\adminDBAjaxURL\\deleteUserDB.php";

    const name = $('#userFornavn').val();
    const etternavn = $('#userEtternavn').val();
    const epost = $('#userEpost').val();
    if(name == ''){
        alert('Skriv inn Fornavn!');
        return false;
    }else if(etternavn == ''){
        alert('Skriv inn Etternavn!');
        return false;
    }else if(epost == ''){
        alert('Skriv inn epost');
        return false;
    }
    
    $.ajax({
        url: getUrl,
        type: "POST",
        data:{ Navn: name, Etternavn : etternavn, Epost : epost },
        success:function(res){
            alert(res + 'Bruker slettet');
        },
        error:function(err){
            console.log(err);
        }
    });
}

function editPW(){
    const getUrl = ".\\Database\\adminDBAjaxURL\\editUserPW.php";

    const epost = $('#userEpost1').val();
    const passord = $('#userPassord').val();
    if(epost == '' || passord == ''){
        alert('Felt under endring av passord mangler!');
        return false;
    }
    
    $.ajax({
        url: getUrl,
        type: "POST",
        data:{ Epost: epost, Passord: passord },
        success:function(res){
            alert(res + 'Passord ble oppdatert!');
        },
        error:function(err){
            console.log(err);
        }
    });     
}

function editUserLevel(){
    const getUrl = ".\\Database\\adminDBAjaxURL\\editUserLevelDB.php";

    const epost = $('#userEpost2').val();
    const userLevel = $('#user-level').val();
    if(epost == ''){
        alert('Skriv inn bruker epost!');
        return false;
    }
    
    $.ajax({
        url: getUrl,
        type: "POST",
        data:{ Epost: epost, UserLevel: userLevel },
        success:function(res){
            alert(res + 'UserLevel ble oppdatert!');
        },
        error:function(err){
            console.log(err);
        }
    });    
}

/**
 * Funksjoner for relatert til tabell Event(Arrangementer)
 * 
 */
function addEvent(){
    const getUrl = ".\\Database\\adminDBAjaxURL\\insertEventDB.php";
    
    const gren = $('#gren').val();
    const dato = $('#datoEvent').val();
    const tid = $('#tidEvent').val();
    if(gren == ''){
        alert('Skriv inn grennavn!');
        return false;
    }else if(dato == ''){
        alert('Skriv inn dato!');
        return false;
    }else if(tid == ''){
        alert('Skriv inn tid!');
        return false;
    }
    
    $.ajax({
        url: getUrl,
        type: "POST",
        data:{ Gren: gren, Dato: dato, Tid: tid },
        success:function(res){
            alert(res + 'Event ble lagt til');
        },
        error:function(err){
            alert("Feil! Event ble ikke lagt til!");
            console.log(err);
        }
    });
}

function deleteEvent(){
    const getUrl = ".\\Database\\adminDBAjaxURL\\deleteEventDB.php";

    const grenID = $('#slettEvent').val();
    if(gren == ''){
        alert('Skriv inn eventID!');
        return false;
    }
    
    $.ajax({
        url: getUrl,
        type: "POST",
        data:{ EventID: grenID },
        success:function(res){
            alert(res + 'Event ble slettet');
        },
        error:function(err){
            alert("Feil! Event ble ikke slettet!");
            console.log(err);
        }
    });
}