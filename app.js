
const form = document.getElementById('form');
const displayError = document.getElementById('error');

form.addEventListener('submit', (e)=>{
    
    const username = document.getElementById('username');
    const pwd = document.getElementById('password');
    const rgpd = document.getElementById('rgpd');
    console.log(rgpd.check);
    console.log(username.value);
    let messages =[];
    let error = false;

    if(username.value.length > 42 || username.value ==''){
        messages.push('Pseudo trop long');
        error = true;
    }

    if(pwd.value.length < 8 || password.value ==''){
        messages.push('Mot de passe trop court');
        error = true;
    }

    if(!validateName(username.value)){
        messages.push('seul les lettres sont acceptées');
        error = true;

    }

    if(!validateName(pwd.value)){
        messages.push('Le mot de passe doit contenir au moins une lettre minuscule, une lettre majuscule, un chiffre et un caractère spécial !');
        error = true;

    }

    if(rgpd.checked == false){
        messages.push('Vous devez accepter les RGPD !');
        error = true;
    }

    
    if(error === true){
        e.preventDefault();
        displayError.innerText = messages.join(', ' ) + '.';
    }
});

function validateName(param){
    //Mdp entre 8 et 15 carac contenant une minuscule, une majuscule, un chiffre et un caractère spéciaux
    const format = /^[a-zA-Z]+$/;
    if(format.test(param)){
        return true;
    }
    return false;
}


function checkRgpd() {
    document.getElementById("rgpd").checked = true;
}

function uncheckRgpd() {
    document.getElementById("rgpd").checked = false;
}

