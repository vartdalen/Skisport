// Funksjonen henter ut tabellen "User" fra databasen
function loadUser(){
    var getUrl = "http://localhost/ProsjektSkiVM/Skisport/Database/Tabeller/loadUser.php";
    $.ajax({
        url: getUrl,
        success:function(){
            $("#utdataUser").load(getUrl);
        },
        error:function(xhr, status, error){
            $("#utdataUser").html("Feil. Mislykket med å hente tabell 'User'.");
        }
    });
    var getDiv = document.getElementById("utdataUser");
    if(getDiv.style.display == 'none'){
        //getDiv.style.display = 'block'
        $("#utdataUser").show("slow");
    }else {
        //getDiv.style.display  = 'none';
        $("#utdataUser").hide("slow");
    }
}

// Funksjonen henter ut tabellen "Athletes" fra databasen
function loadAthletes(){
    var getUrl = "http://localhost/ProsjektSkiVM/Skisport/Database/Tabeller/loadAthletes.php";
    $.ajax({
        url: getUrl,
        success:function(){
            $("#utdataAthletes").load(getUrl);
        },
        error:function(xhr, status, error){
            $("#utdataAthletes").html("Feil. Mislykket med å hente tabell 'Athletes'.");
        }
    });
    var getDiv = document.getElementById("utdataAthletes");
    if(getDiv.style.display == 'none'){
        //getDiv.style.display = 'block'
        $("#utdataAthletes").show("slow");
    }else {
        //getDiv.style.display  = 'none';
        $("#utdataAthletes").hide("slow");
    }
}

// Funksjonen henter ut tabellen "Exercises" fra databasen
function loadExercises(){
    var getUrl = "http://localhost/ProsjektSkiVM/Skisport/Database/Tabeller/loadExercises.php";
    $.ajax({
        url: getUrl,
        success:function(){
            $("#utdataExercises").load(getUrl);
        },
        error:function(xhr, status, error){
            $("#utdataExercises").html("Feil. Mislykket med å hente tabell 'Exercises'.");
        }
    });
    var getDiv = document.getElementById("utdataExercises");
    if(getDiv.style.display == 'none'){
        //getDiv.style.display = 'block'
        $("#utdataExercises").show("slow");
    }else {
        //getDiv.style.display  = 'none';
        $("#utdataExercises").hide("slow");
    }
}


