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

    if(isset($_POST['lastname'], $_POST['nickname'], $_POST['object'], $_POST['userEmail'], $_POST['emailContent'])) {

        $lastname = htmlentities($_POST['lastname']);
        $nickname = htmlentities($_POST['nickname']);
        $object = htmlentities($_POST['object']);
        $userEmail = htmlentities($_POST['userEmail']);
        $emailContent = htmlentities($_POST['emailContent']);

        // Create the Transport
        $transport = Swift_SmtpTransport::newInstance('smtp.office365.com', 587, "tls")
            ->setUsername('raphael.augustin@supinternet.fr')
            //mettre les identifiant correct.
            ->setPassword('');


        /*
        You could alternatively use a different transport such as Sendmail or Mail:

        // Sendmail
        $transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');


        // Mail
        $transport = Swift_MailTransport::newInstance();
        */

        // Create the Mailer using your created Transport
        $mailer = Swift_Mailer::newInstance($transport);

        // Create the message
        $message = Swift_Message::newInstance()
            // Give the message a subject
            ->setSubject($object)
            // Set the From address with an associative array
            ->setFrom(array($userEmail))
            // Set the To addresses with an associative array
            ->setTo(array('raphael.augustin@supinternet.fr'))
            // Give it a body
            ->setBody($emailContent);

        // Send the message
        $result = $mailer->send($message);
    }
    ?>
</div>
