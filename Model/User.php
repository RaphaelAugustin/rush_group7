<?php
class Users {

    function create_user($login, $pass)
    {

        //requete pour recupéré les info des comptes.
        $response = $this->bdd->query('SELECT pseudo FROM users');


        //verify if username already exist.
        while ($data = $response->fetch()) {
            foreach ($data AS $user) {
                if ($user == $login) {
                    echo "Ce nom d'utilisateur existe déjà. Veuillez en choisir un autre.";
                    exit;
                }
            }
        }
        //cryptage password en SHA-1 (METTRE A JOUR EN SELL).

        $password_crypt = sha1($pass);


        //requete preparé et exécution pour add pseudo et password dans la BDD.
        $req = $this->bdd->prepare("INSERT INTO users (pseudo, password) VALUES (:pseudo, :password)");

        //bind des paramètre pour que SQL fasse les vérification de validité des chaine envoyées.

        $req->execute([
            'pseudo' => $login,
            'password' => $password_crypt,
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