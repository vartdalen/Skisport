function validerFornavn() {
    
    var fornavnGroup = document.getElementById('fornavnGroup');
    var fornavn = document.getElementById('fornavn');
    var successIconFornavn = document.getElementById('successIconFornavn');
    var errorIconFornavn = document.getElementById('errorIconFornavn');
    var hjelpedivFornavn = document.getElementById('hjelpedivFornavn');
    
    var regex = /^[a-zA-Z ]{2,40}$/;
    
    if (regex.test(fornavn.value)) {
        
        fornavnGroup.setAttribute("class", "form-group has-feedback has-success");
        successIconFornavn.style.display = 'initial';
        errorIconFornavn.style.display = 'none';
        hjelpedivFornavn.style.display = 'none';
        
    } else {
        
        fornavnGroup.setAttribute("class", "form-group has-feedback has-error");
        successIconFornavn.style.display = 'none';
        errorIconFornavn.style.display = 'initial';
        hjelpedivFornavn.style.display = 'initial';
        
    }
    
}

function validerEtternavn() {
    
    var etternavnGroup = document.getElementById('etternavnGroup');
    var etternavn = document.getElementById('etternavn');
    var successIconEtternavn = document.getElementById('successIconEtternavn');
    var errorIconEtternavn = document.getElementById('errorIconEtternavn');
    var hjelpedivEtternavn = document.getElementById('hjelpedivEtternavn');
    
    var regex = /^[a-zA-Z ]{2,40}$/;

    if (regex.test(etternavn.value)) {

        etternavnGroup.setAttribute("class", "form-group has-feedback has-success");
        successIconEtternavn.style.display = 'initial';
        errorIconEtternavn.style.display = 'none';
        hjelpedivEtternavn.style.display = 'none';

    } else {

        etternavnGroup.setAttribute("class", "form-group has-feedback has-error");
        successIconEtternavn.style.display = 'none';
        errorIconEtternavn.style.display = 'initial';
        hjelpedivEtternavn.style.display = 'initial';
        
    }
    
}

function validerEpost() {
    
    var epost = document.getElementById('epost');
    var epostGroup = document.getElementById('epostGroup');
    var successIconEpost = document.getElementById("successIconEpost");
    var errorIconEpost = document.getElementById("errorIconEpost");
    var hjelpedivEpost = document.getElementById('hjelpedivEpost');
    
    var epostBekreft = document.getElementById('epostBekreft');
    var epostBekreftGroup = document.getElementById('epostBekreftGroup');
    var successIconEpostBekreft = document.getElementById("successIconEpostBekreft");
    var errorIconEpostBekreft = document.getElementById("errorIconEpostBekreft");
    var hjelpedivEpostBekreft = document.getElementById('hjelpedivEpostBekreft');
    
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    
    if (regex.test(epost.value)) {
        
        epostGroup.setAttribute("class", "form-group has-feedback has-success");
        successIconEpost.style.display = 'initial';
        errorIconEpost.style.display = 'none';
        hjelpedivEpost.style.display = 'none';
        
        if ((regex.test(epostBekreft.value))&&(epostBekreft.value === epost.value)) {
        
            epostBekreftGroup.setAttribute("class", "form-group has-feedback has-success");
            successIconEpostBekreft.style.display = 'initial';
            errorIconEpostBekreft.style.display = 'none';
            hjelpedivEpostBekreft.style.display = 'none';
        
        }
        
    } else {
    
        epostGroup.setAttribute("class", "form-group has-feedback has-error");
        successIconEpost.style.display = 'none';
        errorIconEpost.style.display = 'initial';
        hjelpedivEpost.style.display = 'initial';
        
    }
    
    if (!((regex.test(epostBekreft.value))&&(epostBekreft.value === epost.value))&&(epostBekreft.value !== "")) {
            
            epostBekreftGroup.setAttribute("class", "form-group has-feedback has-error");
            successIconEpostBekreft.style.display = 'none';
            errorIconEpostBekreft.style.display = 'initial';
            hjelpedivEpostBekreft.style.display = 'initial';
            
    }
}

function validerEpostBekreft() {
    
    var epostBekreft = document.getElementById('epostBekreft');
    var epostBekreftGroup = document.getElementById('epostBekreftGroup');
    var successIconEpostBekreft = document.getElementById("successIconEpostBekreft");
    var errorIconEpostBekreft = document.getElementById("errorIconEpostBekreft");
    var hjelpedivEpostBekreft = document.getElementById('hjelpedivEpostBekreft');
    
    var epost = document.getElementById('epost');
    
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    
    if ((regex.test(epostBekreft.value))&&(epostBekreft.value === epost.value)) {
        
        epostBekreftGroup.setAttribute("class", "form-group has-feedback has-success");
        successIconEpostBekreft.style.display = 'initial';
        errorIconEpostBekreft.style.display = 'none';
        hjelpedivEpostBekreft.style.display = 'none';
        
    } else {
        
        epostBekreftGroup.setAttribute("class", "form-group has-feedback has-error");
        successIconEpostBekreft.style.display = 'none';
        errorIconEpostBekreft.style.display = 'initial';
        hjelpedivEpostBekreft.style.display = 'initial';
        
    }
}

function validerPassord() {
    
    var passord = document.getElementById('passord');
    var passordGroup = document.getElementById('passordGroup');
    var successIconPassord = document.getElementById("successIconPassord");
    var errorIconPassord = document.getElementById("errorIconPassord");
    var hjelpedivPassord = document.getElementById('hjelpedivPassord');
    
    var passordBekreft = document.getElementById('passordBekreft');
    var passordBekreftGroup = document.getElementById('passordBekreftGroup');
    var successIconPassordBekreft = document.getElementById("successIconPassordBekreft");
    var errorIconPassordBekreft = document.getElementById("errorIconPassordBekreft");
    var hjelpedivPassordBekreft = document.getElementById('hjelpedivPassordBekreft');
    
    var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/;
    
    if (regex.test(passord.value)) {

        passordGroup.setAttribute("class", "form-group has-feedback has-success");
        successIconPassord.style.display = 'initial';
        errorIconPassord.style.display = 'none';
        hjelpedivPassord.style.display = 'none';
        
        if ((regex.test(passordBekreft.value))&&(passordBekreft.value === passord.value)) {
            
            passordBekreftGroup.setAttribute("class", "form-group has-feedback has-success");
            successIconPassordBekreft.style.display = 'initial';
            errorIconPassordBekreft.style.display = 'none';
            hjelpedivPassordBekreft.style.display = 'none';
            
        } 
        
        

    } else {

        passordGroup.setAttribute("class", "form-group has-feedback has-error");
        successIconPassord.style.display = 'none';
        errorIconPassord.style.display = 'initial';
        hjelpedivPassord.style.display = 'initial';

    }
    
    if (!((regex.test(passordBekreft.value))&&(passordBekreft.value === passord.value))&&(passordBekreft.value !== "")) {
            
            passordBekreftGroup.setAttribute("class", "form-group has-feedback has-error");
            successIconPassordBekreft.style.display = 'none';
            errorIconPassordBekreft.style.display = 'initial';
            hjelpedivPassordBekreft.style.display = 'initial';
            
    }
}

function validerPassordBekreft() {
    
    var passordBekreft = document.getElementById('passordBekreft');
    var passordBekreftGroup = document.getElementById('passordBekreftGroup');
    var successIconPassordBekreft = document.getElementById("successIconPassordBekreft");
    var errorIconPassordBekreft = document.getElementById("errorIconPassordBekreft");
    var hjelpedivPassordBekreft = document.getElementById('hjelpedivPassordBekreft');
    
    var passord = document.getElementById('passord');
    
    var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,20}$/;
    
    if (regex.test((passordBekreft.value))&&(passordBekreft.value === passord.value)) {

        passordBekreftGroup.setAttribute("class", "form-group has-feedback has-success");
        successIconPassordBekreft.style.display = 'initial';
        errorIconPassordBekreft.style.display = 'none';
        hjelpedivPassordBekreft.style.display = 'none';

    } else {

        passordBekreftGroup.setAttribute("class", "form-group has-feedback has-error");
        successIconPassordBekreft.style.display = 'none';
        errorIconPassordBekreft.style.display = 'initial';
        hjelpedivPassordBekreft.style.display = 'initial';

    }
}