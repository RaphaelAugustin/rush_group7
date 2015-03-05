window.onload = function (){
    document.getElementById('inscription').addEventListener('click', function(){
        document.location.href="?action=subscription";
    });

    document.getElementById('connexion').addEventListener('click', function(){
        document.location.href="?action=login";
    });

    document.getElementsByClassName('btn-reset btn-primary buy').addEventListener('click', function(){
        document.location.href="?action=buy";
    });


    /*
    *   Verification of the form for the subscription
    */

    function testEmail(userEmail){
        var userEmail = document.forms['subscribe-form'].elements['userEmail'].value;
        var mailRegEx = new RegExp('^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}.[a-z]{2,4}$');

        return mailRegEx.test(userEmail);

    }


    document.forms['subscribe-form'].elements['userEmail'].addEventListener('change', function(){
        var userEmail = this.value;

        if(userEmail == '' || testEmail(userEmail)){
            document.getElementById('bad-email').innerHTML = '';
        } else {
            document.getElementById('bad-email').innerHTML = 'Mauvais email';
        }
    });

    document.forms['subscribe-form'].onsubmit = function() {

        var errorBlock = document.getElementById('error-message');
        var successBlock = document.getElementById('success-message');
        errorBlock.innerHTML = '';
        successBlock.innerHTML = '';

        var formOK = true;

        var userNickname = this.elements['nickname'].value;
        var userLastname = this.elements['lastname'].value;
        var userPassword = this.elements['pwd'].value;
        var userPasswordCheck = this.elements['pwdCheck'].value;
        var userEmail = this.elements['userEmail'].value;

        var mailRegEx = new RegExp('^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}.[a-z]{2,4}$');

        if(userNickname.length < 2 && userLastname.length < 2){
            errorBlock.innerHTML += '<br>Pseudo trop court';
            formOK = false;
        }

        if(userPassword.length < 6){
            errorBlock.innerHTML += '<br>Mot de passe trop court';
            formOK = false;
        }

        if(userPasswordCheck !== userPassword){
            errorBlock.innerHTML += '<br>Veuillez saisir une vérification identique à votre mot de passe';
            formOK = false;
        }

        if(mailRegEx.test(userEmail) === true){
            successBlock.write += 'Mon email est valide';
            formOK = true;
        } else {
            errorBlock.innerHTML += '<br>Votre adresse mail n\'est pas valide';
            formOK = false;
        }

        if(formOK === true){
            successBlock.innerHTML = 'Hey. Bienvenue '+ userNickname+' ! <br />Ton adresse e-mail est valide<br />Je vois qu\'on est fan de '+favoriteHumanBeing+'.<br>Tes plats favoris sont : <br>';
            return true; // on soumet le formulaire éventuellement

            this.reset();
        }
        return false;
    }
};