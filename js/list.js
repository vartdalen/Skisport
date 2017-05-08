var listContainer = document.getElementById("listContainer");
var myNodelist = listContainer.children[0].getElementsByTagName("LI");
var eventList = document.getElementById("eventListe");
var close = document.getElementsByClassName("close");

// lager close knapp og appender til hver list submission
for (var i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// trykk på close knapp for å skjule valgt submission
for (var i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

//Opprett nytt submission til listen ved å trykke på "Legg til" knappen
function newElement() {
    var li = document.createElement("li");
    var inputAntall = document.getElementById("velgAntall").value;
    var inputGren = document.getElementById("velgGren").value;
    var inputDato = document.getElementById("velgDato").value;
    var inputTid = document.getElementById("velgTid").value;
    var output = inputAntall + " til " + inputGren + " den " + inputDato + " klokken " + inputTid;
    var t = document.createTextNode(output);

    li.appendChild(t);
    
    if (inputGren === 'Velg gren' || inputDato === 'Velg Dato' || inputTid === 'Velg tid') {
        alert("Vennligst velg gren, dato og tid.");
    } else {
        document.getElementById("eventListe").appendChild(li);
    }
    
    //håndterer brukervennlighet for utfylling av form
    if (inputGren != 'Velg gren' && inputDato != 'Velg dato' && inputTid != 'Velg tid'){
        document.getElementById("velgGren").value = "Velg gren";
        document.getElementById("velgDato").value = "Velg dato";
        document.getElementById("velgTid").value = "Velg tid";
        document.getElementById("velgDato").disabled = true;
        document.getElementById("velgTid").disabled = true;
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
      }
    }
}

function bekreft() {
         
        //henter formen
        var form = document.getElementById("formRegistrering");
        
        //lagrer størrelsen på listen i en variabel som kan brukes på neste side
        var listSize = document.createElement("input");
        listSize.setAttribute("type", "hidden");
        listSize.setAttribute("name", "ls");
        listSize.setAttribute("id", "ls");
        listSize.setAttribute("value", eventList.children.length);
        
        form.appendChild(listSize);
       
    for(var i = 0; i <= eventList.children.length; i++ ) {
                
                //fjerner spanobjektet (x knappen)
                var span = document.getElementById("span");
                span.parentNode.removeChild(span);
                //setter inn verdier i formen som kan bli sendt som post variabler
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type","hidden");
                hiddenField.setAttribute("name", i);
                hiddenField.setAttribute("value", eventList.children[i].textContent);
                
                form.appendChild(hiddenField);
                
        }
        
}

function valgtGren() {
    
document.getElementById("velgDato").disabled = false;

}

function valgtDato() {
    
document.getElementById("velgTid").disabled = false;
    
}