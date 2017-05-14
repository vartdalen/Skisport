/**
 * Denne JS-klassen er relatert til siden "Profil"
 * Inneholder funksjoner som bruker kan endre navn, epost og passord
 * 
 */

function editNavn(){
    const getUrl = ".\\Database\\adminDBAjaxURL\\editName.php";
    const BKname = $('#fornavn').val();
    const BKsurName = $('#etternavn').val();
    
        if(BKname == '' || BKsurName == ''){
        alert('Ops. Begge felter må fylles ut!');
        return false;
    }
        
    $.ajax({
        url: getUrl,
        type: "POST",
        data:{ Fornavn: BKname, Etternavn: BKsurName },
        success:function(res){
            alert(res + 'Navn ble oppdatert!');
        },
        error:function(err){
            alert(err);
        }
    }); 
}

function editEpost(){
    const getUrl = ".\\Database\\adminDBAjaxURL\\editUserEpost.php";
    const BKepost = $('#epostBekreft').val();
    
    $.ajax({
        url: getUrl,
        type: "POST",
        data:{ Epost: BKepost },
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
        data:{ Passord: BKpassord },
        success:function(res){
            alert(res + 'Ditt passord ble oppdatert!');
        },
        error:function(err){
            alert(err);
        }
    });
}
