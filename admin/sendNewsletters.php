<?php

require_once "../vendor/swiftmailer/swiftmailer/lib/swift_required.php";

// Create the Transport
$transport = Swift_SmtpTransport::newInstance('smtp.office365.com', 587, "tls")
    ->setUsername('raphael.augustin@supinternet.fr')
    //mettre les identifiant correct.
    ->setPassword('')
;


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
    ->setSubject('coucou la famille')

    // Set the From address with an associative array
    ->setFrom(array('raphael.augustin@supinternet.fr'))

    // Set the To addresses with an associative array
    ->setTo(array('taf.augustin@gmail.com', 'raphael.augustin@supinternet.fr'))

    // Give it a body
    ->setBody('Salut les gens comment allez vous')
;

// Send the message
$result = $mailer->send($message);
var_dump($result);



/*
 *
 *
 *
$bdd = new PDO('mysql:host=localhost;dbname=Rush', 'root', ' ');

$req = $bdd->prepare('SELECT etat as status FROM newsletters WHERE username = :username');
$req->execute([
    'username' => $username
]);


$row = $req->fetch();

if($row['etat'] === true){
    echo 'on vous désinscrit';
} else {
    echo 'on vous inscrit';
}
*/