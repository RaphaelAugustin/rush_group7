
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