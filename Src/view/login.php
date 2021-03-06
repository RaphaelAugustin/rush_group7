<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4 text-center login">
    <h2>Connectez-vous</h2>
    <form method="POST" class="form-message">
        <div class="form-group">
            <input class="form-control login-field" placeholder="login" type="text" name="login">
        </div>
        <div class="form-group">
            <input class="form-control login-field" placeholder="password" type="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary btn-block" href="">Connexion</button>
        <a class="login-link" href="?action=subscription">Vous n'avez pas de compte ? Inscrivez-vous</a>
    </form>
<?php
    // verify if $_POST variable exist
    if (isset($_POST['login'], $_POST['password']) && !empty($_POST['login']) && !empty($_POST['password'])) {
        if ($user->connect_user($_POST['login'], $_POST['password'])) {

            $_SESSION['login'] = $_POST['login'];
            header('Location: ./index.php?page=home');
        } else {
            echo "erreur d'authentification";
        }
    } else {
        echo 'Veuillez entrer un pseudo et un mot de passe.';
    }

?>
</div>