<h1>Connectez-vous</h1>
<div class="form-group">
        <input class="form-control login-field" value="" placeholder="Prénom" type="text">
    </div>
    <div class="form-group">
        <input class="form-control login-field" value="" placeholder="Adresse e-mail" type="email">
    </div>
    <div class="form-group">
        <input class="form-control login-field" value="" placeholder="Password" type="password">
    </div>
    <div class="form-group">
        <input type="checkbox" id="newsletter" value="Oui" name="newsletter" checked/>
        <label for="newsletter">S'abonner à la newsletter</label>
    </div>
    <a class="btn btn-primary btn-block" href="#">Log in</a>
    <a class="login-link" href="#">Lost your password?</a>
</div>

<h1>Connectez-vous</h1>
<form class="form-message" method="POST" action="">
    <label for="pseudo">Entrer votre Pseudo</label>
    <input type="text" id="pseudo" name="pseudo"/><br>

    <label for="password">Entrer votre mot de passe</label>
    <input type="password" id="password" name="password"/><br>

    <input type="submit" value="Se connecter"/>

</form>

<?php
// verify if $_POST variable exist
if (isset($_POST['pseudo'], $_POST['password']) && !empty($_POST['pseudo']) && !empty($_POST['password'])) {
    $user->connect_user($_POST['pseudo'], $_POST['password']);
} else {
    echo 'Veuillez entrer un pseudo et un mot de passe.';
}

?>
>>>>>>> b837e124c6de3494d76801eedb33e6e6ecae0fc9:view/login.php
