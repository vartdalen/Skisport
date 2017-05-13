// Funksjonen henter ut tabellen "User" fra databasen
function loadUser(){
    var getUrl = ".\\Database\\Tabeller\\loadUser.php";
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
    var getUrl = ".\\Database\\Tabeller\\loadAthletes.php";
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
    var getUrl = ".\\Database\\Tabeller\\loadExercises.php";
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

// Funksjonen henter ut tabellen "Event" fra databasen
function loadEvent(){
    var getUrl = ".\\Database\\Tabeller\\loadEvent.php";
    $.ajax({
        url: getUrl,
        success:function(){
            $("#utdataEvent").load(getUrl);
        },
        error:function(xhr, status, error){
            $("#utdataEvent").html("Feil. Mislykket med å hente tabell 'Event'.");
        }
    });
    var getDiv = document.getElementById("utdataEvent");
    if(getDiv.style.display == 'none'){
        //getDiv.style.display = 'block'
        $("#utdataEvent").show("slow");
    }else {
        //getDiv.style.display  = 'none';
        $("#utdataEvent").hide("slow");
    }
}


