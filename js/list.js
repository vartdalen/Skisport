var listContainer = document.getElementById("listContainer");
var myNodelist = listContainer.children[0].getElementsByTagName("LI");
var close = document.getElementsByClassName("close");
var list = document.querySelector('ul');
var i;

// lager close knapp og appender til hver list submission
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// trykk på close knapp for å skjule valgt submission
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

//Opprett nytt submission til listen ved å trykke på "Legg til" knappen
function newElement() {
    var li = document.createElement("li");
    var inputGren = document.getElementById("velgGren").value;
    var inputDato = document.getElementById("velgDato").value;
    var inputTid = document.getElementById("velgTid").value;
    var output = inputGren + " den " + inputDato + " klokken " + inputTid;
    var t = document.createTextNode(output);

    li.appendChild(t);
    if (inputGren === 'Velg gren' || inputDato === 'Velg Dato' || inputTid === 'Velg tid') {
        alert("Vennligst velg gren, dato og tid.");
    } else {
        document.getElementById("eventListe").appendChild(li);
    }

    if (inputGren != 'Velg gren' && inputDato != 'Velg dato' && inputTid != 'Velg tid'){
        document.getElementById("velgGren").value = "Velg gren";
        document.getElementById("velgDato").value = "Velg dato";
        document.getElementById("velgTid").value = "Velg tid";
    } else if (inputGren != 'Velg gren' || inputDato != 'Velg dato' || inputTid != 'Velg tid') {
        document.getElementById("velgGren").value = inputGren;
        document.getElementById("velgDato").value = inputDato;
        document.getElementById("velgTid").value = inputTid;
    }

    var span = document.createElement("SPAN");
    var txt = document.createTextNode("\u00D7");
    span.className = "close";
    span.appendChild(txt);
    li.appendChild(span);

    //ved å trykke close så skjuler man submissionen(trenger muligens utbedring for funksjonalitet mot db)
    for (i = 0; i < close.length; i++) {
      close[i].onclick = function() {
        var div = this.parentElement;
        div.style.display = "none";
      }
    }
}


function valgtGren() {
    
document.getElementById("velgDato").disabled = false;

}

function valgtDato() {
    
document.getElementById("velgTid").disabled = false;
    
}