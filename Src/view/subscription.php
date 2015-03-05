<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4 text-center login">
    <h2>Inscrivez-vous</h2>
    <form method="POST" class="form-message" name="subscribe-form">
        <div class="form-group">
            <input class="form-control login-field" placeholder="Nom de société" type="text" name="society" />
        </div>
        <div class="form-group">
            <input class="form-control login-field" placeholder="Password" type="password" name="pwd" />
        </div>
        <div class="form-group">
            <input class="form-control login-field" placeholder="Password (verification)" type="password" name="pwdCheck" />
        </div>
        <hr />
        <div class="form-group">
            <input class="form-control login-field" placeholder="Nom" type="text" name="lastname" />
        </div>
        <div class="form-group">
            <input class="form-control login-field" placeholder="Prénom" type="text" name="nickname" />
        </div>
        <div class="form-group">
            <input class="form-control login-field" placeholder="Adresse e-mail" type="email" name="userEmail" /><span id="bad-email"></span>
        </div>
        <div class="form-group">
            <label class="checkbox" for="checkbox1">
                <input class="custom-checkbox" value="true" id="checkbox1" data-toggle="checkbox" type="checkbox" checked />
                <span class="icons">
                    <span class="icon-unchecked"></span>
                    <span class="icon-checked"></span>
                </span>
                S'abonner à la newsletter
            </label>
        </div>
        <a class="btn btn-primary btn-block">Inscription</a>
        <a class="login-link" href="?action=login">Déjà un compte ? Connectez-vous</a>
    </form>
    <div id="errorBlock"></div>
    <div id="successBlock"></div>
<?php
    // verify if $_POST variable exist
    if (isset($_POST['pseudo'], $_POST['password']) && !empty($_POST['pseudo']) && !empty($_POST['password'])) {
        $user->connect_user($_POST['pseudo'], $_POST['password']);
    } else {
        echo 'Veuillez entrer un pseudo et un mot de passe.';
    }

?>
</div>