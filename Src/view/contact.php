<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4 text-center wrap">
    <h2>Contactez-nous</h2>
    <form method="POST" class="form-message">
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <input class="form-control login-field" placeholder="Nom" type="text" name="lastname" required />
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <input class="form-control login-field" placeholder="Prénom" type="text" name="nickname" required />
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <input class="form-control login-field" placeholder="Objet du contact" type="text" name="object" required />
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <input class="form-control login-field" placeholder="Adresse e-mail" type="email" name="userEmail" required />
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <textarea class="form-control textarea" rows="6" placeholder="Contenu" name="emailContent" required></textarea>
        </div>
        <button type="submit" class="btn-reset btn-primary">Envoyer</button>
    </form>
    <?php
    @$lastname = htmlentities($_POST['lastname']);
    @$nickname = htmlentities($_POST['nickname']);
    @$object = htmlentities($_POST['object']);
    @$userEmail = htmlentities($_POST['userEmail']);
    @$emailContent = htmlentities($_POST['emailContent']);


    $destinataire = 'localhost@awh.fr'; // Déclaration de l'adresse de destination.

    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $userEmail))
    {
        $passage_ligne = "\r\n";
    }
    else
    {
        $passage_ligne = "\n";
    }

    //=====Création du header de l'e-mail.
    $header = "From: ".$userEmail.$passage_ligne;
    $header.= "Reply-to: ".$userEmail.$passage_ligne;
    $header.= "MIME-Version: 1.0";
    $header.= "Content-Type: multipart/alternative;".$passage_ligne;
    //==========

    //=====Ajout du message au format texte.
    $message = $passage_ligne.$emailContent.$passage_ligne;
    //==========

    //=====Envoi de l'e-mail.
    if(strlen($emailContent) > 0){
        mail($destinataire,$object,$message,$header);
        if(mail($destinataire,$object,$message,$header) === true){
            echo 'Message envoyé';
        }else {
            echo 'Une erreur est survenue lors de l\'envoi du mail';
        }
    }
    ?>
</div>
