// Funksjoner relatert til tabell Exercises(Øvelser)
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
            const el = document.getElementById('dbSuccess');
            el.textContent = `Øvelse ble lagt til! ${res}`
            el.style.margin = '30px';
        },
        error:function(err){
            alert("Feil! Øvelse ble ikke lagt til!");
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
            const el = document.getElementById('dbSuccess');
            el.textContent = `Øvelse ble slettet! ${res}`
            el.style.margin = '30px';
        },
        error:function(err){
            alert("Feil! Øvelse ble ikke slettet!");
            console.log(err);
        }
    });
}

function editExercise(){
    const getUrl = ".\\Database\\adminDBAjaxURL\\editExDB.php";

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
            const el = document.getElementById('dbSuccess');
            el.textContent = `Øvelse ble endret! ${res}`
            el.style.margin = '30px';
        },
        error:function(err){
            alert("Feil! Øvelse ble ikke endret!");
            console.log(err);
        }
    });
}

// Funksjoner relatert til tabell Athletes(Utøvere)
function addAthletes(){
    const getUrl = ".\\Database\\adminDBAjaxURL\\deleteAthDB.php";

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
            const el = document.getElementById('dbSuccess');
            el.textContent = `Øvelse ble slettet! ${res}`
            el.style.margin = '30px';
        },
        error:function(err){
            alert("Feil! Øvelse ble ikke slettet!");
            console.log(err);
        }
    });
}

function deleteAthletes(){
    const getUrl = ".\\Database\\adminDBAjaxURL\\insertAthDB.php";

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
            const el = document.getElementById('dbSuccess');
            el.textContent = `Øvelse ble slettet! ${res}`
            el.style.margin = '30px';
        },
        error:function(err){
            alert("Feil! Øvelse ble ikke slettet!");
            console.log(err);
        }
    });
}
