<?php
namespace Src\Model;
class User {

    function create_user($login, $pass, $pass_check, $first_name, $last_name, $society_name, $mail, $newsletter)
    {

        //requete pour recupéré les info des comptes.
        $response = $this->bdd->query('SELECT * FROM users');


        //verify if mails already exist.
        while ($data = $response->fetch()) {
            foreach ($data AS $user) {
                if ($user['mail'] == $mail && $user['account'] == true) {
                    echo "Un compte existe déja avec cette adresse mail.";
                    exit;
                }
            }
        }


       if ($pass == $pass_check || strlen($login) <= 4 || strlen($pass) <= 6 || !(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $mail))) {
           echo "information incorrecte, veuillez recommmencez";
           exit;
       }
        //cryptage password en SHA-1 (METTRE A JOUR EN SALT).

        $password_crypt = sha1($pass);


        //requete preparé et exécution pour add pseudo et password dans la BDD.
        $req = $this->bdd->prepare("INSERT INTO users (pseudo, password, mail, name, last_name, society_name, newsletter, account) VALUES (:pseudo, :password, :mail, :name, :last_name, :society_name, :newsletter, :account)");

        //bind des paramètre pour que SQL fasse les vérification de validité des chaine envoyées.

        $req->execute([
            'pseudo' => $login,
            'password' => $password_crypt,
            'mail' => $mail,
            'name' => $first_name,
            'last_name' => $last_name,
            'society_name' => $society_name,
            'newsletter' => $newsletter,
            'account' => true
        ]);

        echo "Votre compte à été crée";

    }

    //funcion for users connection.
    function connect_user($login, $password)
    {
        //use SHA-1 on password to crypt it.
        $password_crypt = sha1($password);


        //requete pour recupéré les info des comptes.
        $response = $this->bdd->query('SELECT id, pseudo, password FROM users');
        return $response;


    }


}