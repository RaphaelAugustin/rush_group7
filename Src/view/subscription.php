<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4 text-center login">
    <h2>Inscrivez-vous</h2>
    <form  class="form-message" name="subscribe-form" method='POST' action=''>
        <div class="form-group">
            <input class="form-control login-field" placeholder="login" type="text" name="login" />
        </div>
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
                <input class="custom-checkbox" value="true" name="newsletter" id="checkbox1" data-toggle="checkbox" type="checkbox" checked />
                <span class="icons">
                    <span class="icon-unchecked"></span>
                    <span class="icon-checked"></span>
                </span>
                S'abonner à la newsletter
            </label>
        </div>
        <button type="submit" class="btn-reset btn-primary">Inscription</button>
        <a class="login-link" href="#">Déjà un compte ? Connectez-vous</a>
    </form>
    <div id="errorBlock"></div>
    <div id="successBlock"></div>
<?php
    // verify if $_POST variable exist
    if (isset($_POST['login'], $_POST['pwd'], $_POST['pwdCheck'], $_POST['nickname'], $_POST['lastname'], $_POST['society'], $_POST['userEmail'])
        && !empty($_POST['login']) && !empty($_POST['pwdCheck']) && !empty($_POST['nickname']) && !empty($_POST['lastname']) && !empty($_POST['society']) && !empty($_POST['userEmail'])) {
        $user->create_user($_POST['login'], $_POST['pwd'], $_POST['pwdCheck'], $_POST['nickname'], $_POST['lastname'], $_POST['society'],$_POST['userEmail'], $_POST['newsletter']);
    } else {
        echo 'Veuillez entrer un pseudo et un mot de passe.';
    }

?>

</div>