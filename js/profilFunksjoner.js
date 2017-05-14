/**
 * Denne JS-klassen er relatert til siden "Profil"
 * Inneholder funksjoner som bruker kan endre navn, epost og passord
 * 
 */

function editNavn(){
    
}

function editEpost(){
    const getUrl = ".\\Database\\adminDBAjaxURL\\editUserEpost.php";

    //const epost = $('#epostBekreft').val();
    const epost = $('#epost').val();
    
    $.ajax({
        url: getUrl,
        type: "POST",
        data:{ Epost: epost },
        success:function(res){
            alert(res + 'Din epost ble oppdatert!');
        },
        error:function(err){
            alert(err);
        }
    }); 
}

function editPW(){
    const getUrl = ".\\Database\\adminDBAjaxURL\\editUserPW.php";
    const BKpassord = $('#passordBekreft').val();
    
    $.ajax({
        url: getUrl,
        type: "POST",
        data:{ Passord: passord },
        success:function(res){
            alert(res + 'Ditt passord ble oppdatert!');
        },
        error:function(err){
            alert(err);
        }
    });
}
