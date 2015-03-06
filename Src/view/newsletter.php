<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4 text-center wrap">
    <h2>Newsletter</h2>
    <form method="POST" class="form-message">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <input class="form-control login-field" placeholder="Adresse e-mail" type="email" name="userEmail" required />
        </div>
        <button type="submit" class="btn-reset btn-primary">Envoyer</button>
    </form>
</div>


<?php

if (isset($_POST['userEmail']) && preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['userEmail'])) {
    if ($newsletter->add_new_mail($_POST['userEmail'])) {
        echo '<br>votre Email à bien été ajouté à la newsletter.';
    } else {
        echo '<br>Vous êtes déja inscrit à notre newsletter.';
    }

}

?>