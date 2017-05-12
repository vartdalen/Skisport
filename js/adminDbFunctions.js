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
