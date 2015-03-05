<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4 text-center login">
    <h2>Connectez-vous</h2>
    <form method="POST" class="form-message">
        <div class="form-group">
            <input class="form-control login-field" placeholder="Adresse e-mail" type="email">
        </div>
        <div class="form-group">
            <input class="form-control login-field" placeholder="Password" type="password">
        </div>
        <a class="btn btn-primary btn-block" href="#">Connexion</a>
        <a class="login-link" href="?action=subscription">Vous n'avez pas de compte ? Inscrivez-vous</a>
    </form>
<?php
    // verify if $_POST variable exist
    if (isset($_POST['pseudo'], $_POST['password']) && !empty($_POST['pseudo']) && !empty($_POST['password'])) {
        $user->connect_user($_POST['pseudo'], $_POST['password']);
    } else {
        echo 'Veuillez entrer un pseudo et un mot de passe.';
    }

?>
</div>