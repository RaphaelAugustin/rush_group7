<?php

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