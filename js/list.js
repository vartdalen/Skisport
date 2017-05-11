var listContainer = document.getElementById("listContainer");
var myNodelist = listContainer.children[0].getElementsByTagName("LI");
var eventList = document.getElementById("eventListe");
var eventListDiv = document.getElementById("eventListeDiv");
var close = document.getElementsByClassName("close");
var error = document.getElementById("errorSkjema");
var knappBekreft = document.getElementById("knappBekreft");
var knappLeggTil = document.getElementById("leggTil");
var melding = document.createElement("span");

// lager close knapp og appender til hver list submission
for (var i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

window.onload = function () {
    
    melding.innerHTML = "Vennligst velg minst ett vent og trykk legg til.";
    eventListDiv.appendChild(melding);
    
}

//Opprett nytt submission til listen ved å trykke på "Legg til" knappen
function newElement() {
    var li = document.createElement("li");
    var inputAntall = document.getElementById("velgAntall").value;
    var inputGren = document.getElementById("velgGren").value;
    var inputDato = document.getElementById("velgDato").value;
    var inputTid = document.getElementById("velgTid").value;
    var output = inputAntall + " pers " + inputGren + " den " + inputDato + " klokken " + inputTid;
    var t = document.createTextNode(output);

    li.appendChild(t);
    
    //legger til element ved riktig utfylling
    if (inputGren === 'Velg gren' || inputDato === 'Velg Dato' || inputTid === 'Velg tid') {
        error.innerHTML = "Vennligst velg gren, dato og tid.";
    } else {
        document.getElementById("eventListe").appendChild(li);
        error.innerHTML = "";
    }
    
    //håndterer brukervennlighet for utfylling av form
    if (inputGren != 'Velg gren' && inputDato != 'Velg dato' && inputTid != 'Velg tid'){
        document.getElementById("knappBekreft").disabled = false;
        document.getElementById("velgGren").value = "Velg gren";
        document.getElementById("velgDato").value = "Velg dato";
        document.getElementById("velgTid").value = "Velg tid";
        document.getElementById("velgDato").disabled = true;
        document.getElementById("velgTid").disabled = true;
        document.getElementById("velgGrenGroup").setAttribute("class", "form-group");
        document.getElementById("velgDatoGroup").setAttribute("class", "form-group");
        document.getElementById("velgTidGroup").setAttribute("class", "form-group");
        
    } else if (inputGren != 'Velg gren' || inputDato != 'Velg dato' || inputTid != 'Velg tid') {
        document.getElementById("velgGren").value = inputGren;
        document.getElementById("velgDato").value = inputDato;
        document.getElementById("velgTid").value = inputTid;
    }

    //lager sletteknapp
    var span = document.createElement("SPAN");
    var txt = document.createTextNode("\u00D7");
    span.className = "close";
    span.appendChild(txt);
    span.setAttribute("id", "span");
    li.appendChild(span);

    //ved å trykke close så skjuler man submissionen(trenger muligens utbedring for funksjonalitet mot db)
    for (i = 0; i < close.length; i++) {
        close[i].onclick = function() {
        var div = this.parentElement;
        div.remove();
        
        if (eventList.children.length < 1) {
            knappBekreft.disabled = 'true';
            melding.innerHTML = "Vennligst velg minst ett vent og trykk legg til.";
            melding.style.display = 'initial'; 
        }
        
      }
    }
   
    if (eventListDiv.children.length > 1) {
        
        melding.style.display = 'none';
    }
    
    knappLeggTil.disabled = true; 
    return false;
}

function bekreft() {
        
    if (!sjekkTall() || !sjekkListe()) {

    window.alert("Skjemainnsending mislyktes.");
    return false;

    } else {

        //henter formen
        var form = document.getElementById("formRegistrering");
        var antallhtml = document.createElement("input");
        var grenerhtml = document.createElement("input");
        var datoerhtml = document.createElement("input");
        var tiderhtml = document.createElement("input");

        //lagrer størrelsen på listen i en variabel som kan brukes på neste side
        var listSize = document.createElement("input");
        listSize.setAttribute("type", "hidden");
        listSize.setAttribute("name", "ls");
        listSize.setAttribute("id", "ls");
        listSize.setAttribute("value", eventList.children.length);

        form.appendChild(listSize);

        var antall = [];
        var grener = [];
        var datoer = [];
        var tider = [];

        for(var i = 0; i <= eventList.children.length; i++ ) {

            //fjerner spanobjektet (x knappen)
            var span = document.getElementById("span");
            span.parentNode.removeChild(span);
            //setter inn verdier i formen som kan bli sendt som post variabler
            var fullSetning = document.createElement("input");

            fullSetning.setAttribute("type","hidden");
            fullSetning.setAttribute("name", i);
            fullSetning.setAttribute("class", "listeElement");
            fullSetning.setAttribute("value", eventList.children[i].textContent);

            form.appendChild(fullSetning);

            var setning = fullSetning.value.split(" ", 7);
                antall[i] = setning[0];
                grener[i] = setning[2];
                datoer[i] = setning[4];
                tider[i] = setning[6];

            antallhtml.setAttribute("type","hidden");
            antallhtml.setAttribute("name", "antall");
            antallhtml.setAttribute("value", antall);
            form.appendChild(antallhtml);

            grenerhtml.setAttribute("type","hidden");
            grenerhtml.setAttribute("name", "grener");
            grenerhtml.setAttribute("value", grener);
            form.appendChild(grenerhtml);

            datoerhtml.setAttribute("type","hidden");
            datoerhtml.setAttribute("name", "datoer");
            datoerhtml.setAttribute("value", datoer);
            form.appendChild(datoerhtml);

            tiderhtml.setAttribute("type","hidden");
            tiderhtml.setAttribute("name", "tider");
            tiderhtml.setAttribute("value", tider);
            form.appendChild(tiderhtml);
        }
        
        return true;
    }
}

function sjekkTall() {
    
    var inputGren = document.getElementById("velgGren").value;
    var inputDato = document.getElementById("velgDato").value;
    var inputTid = document.getElementById("velgTid").value;
    var antall = document.getElementById("velgAntall").value;
    
    if (antall < 1 || antall > 5 || isNaN(antall)) {
        document.getElementById("velgAntallGroup").setAttribute("class", "form-group has-error");
        document.getElementById("successIconAntall").style.display = 'none';
        document.getElementById("errorIconAntall").style.display = 'initial';
        
        knappLeggTil.disabled = true;
        error.innerHTML = "Vennligst velg et antall personer mellom 1 og 5.";
        return false;
    } else {
        document.getElementById("velgAntallGroup").setAttribute("class", "form-group has-success");
        document.getElementById("velgGren").disabled = false;
        document.getElementById("errorIconAntall").style.display = 'none';
        document.getElementById("successIconAntall").style.display = 'initial';
        
        error.innerHTML = "";
        if ((inputGren != 'Velg gren' && inputDato != 'Velg dato' && inputTid != 'Velg tid') && (antall > 0 && antall < 6 && !isNaN(antall))) {
        knappLeggTil.disabled = false;
        }
        return true;
    }
    
}

function sjekkListe() {
    
    var liste = document.getElementById("eventListe");
    if (liste.children.length < 1) {
        error.innerHTML = "Vennligst legg til minst ett event.";
        return false;
    } else {
        
        return true;
    }
    
}

function valgtGren() {
    var inputGren = document.getElementById("velgGren").value;
    var inputDato = document.getElementById("velgDato").value;
    var inputTid = document.getElementById("velgTid").value;
    var antall = document.getElementById("velgAntall").value;
    
    document.getElementById("velgDato").disabled = false;
    document.getElementById("velgGrenGroup").setAttribute("class", "form-group has-success");
    
    if (inputGren != 'Velg gren' || inputDato != 'Velg dato' || inputTid != 'Velg tid') {

        knappLeggTil.disabled = true;

    }
    
    if ((inputGren != 'Velg gren' && inputDato != 'Velg dato' && inputTid != 'Velg tid') && (antall > 0 && antall < 6 && !isNaN(antall))) {
        
        knappLeggTil.disabled = false;
        
    }
    
}

function valgtDato() {
    var inputGren = document.getElementById("velgGren").value;
    var inputDato = document.getElementById("velgDato").value;
    var inputTid = document.getElementById("velgTid").value;
    var antall = document.getElementById("velgAntall").value;
    
    document.getElementById("velgTid").disabled = false;
    document.getElementById("velgDatoGroup").setAttribute("class", "form-group has-success");

    if (inputGren != 'Velg gren' || inputDato != 'Velg dato' || inputTid != 'Velg tid') {

        knappLeggTil.disabled = true;

    }
    
    if ((inputGren != 'Velg gren' && inputDato != 'Velg dato' && inputTid != 'Velg tid') && (antall > 0 && antall < 6 && !isNaN(antall))) {
        
        knappLeggTil.disabled = false;
        
    }

}

function valgtTid() {
    var inputGren = document.getElementById("velgGren").value;
    var inputDato = document.getElementById("velgDato").value;
    var inputTid = document.getElementById("velgTid").value;
    var antall = document.getElementById("velgAntall").value;
    
    document.getElementById("velgTidGroup").setAttribute("class", "form-group has-success");
    
    if ((inputGren != 'Velg gren' && inputDato != 'Velg dato' && inputTid != 'Velg tid') && (antall > 0 && antall < 6 && !isNaN(antall))) {
        
        knappLeggTil.disabled = false;
        
    }
    
}

//if (eventList.children.length == 0) {
//    
//    knappBekreft.disabled = 'true';
//    
//}

//if (inputGren != 'Velg gren' || inputDato != 'Velg dato' || inputTid != 'Velg tid')
//if (inputGren != 'Velg gren' && inputDato != 'Velg dato' && inputTid != 'Velg tid')