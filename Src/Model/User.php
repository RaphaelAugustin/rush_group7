<?php
namespace Src\Model;

use \PDO;
class User
{


    function create_user($login, $pass, $pass_check, $first_name, $last_name, $society_name, $mail, $newsletter)
    {
        $PDO = new PDO('mysql:host=localhost;dbname=noxduck', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        //requete pour recupéré les info des comptes.
        $response = $PDO->query('SELECT * FROM users');


        //verify if mails already exist.
        while ($data = $response->fetch()) {

            if ($data['mail'] == $mail && $data['account'] == 1) {
                echo "Un compte existe déja avec cette adresse mail.";
                break;
            //supression dans la base de donnée si l'email était connu du a l'inscription sans compte à la newsletter.
            } else if ($data['mail'] == $mail && $data['account'] == 0) {
                $req = $PDO->prepare('DELETE FROM users WHERE mail = ?');
                $req->execute([
                  '0' => $mail,
                ]);


            }
        }

        if ($newsletter == 'true') {
            $newsletter = true;
        }

        if ($pass != $pass_check || !(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $mail))) {
            echo "information incorrecte, veuillez recommmencez";
        } else {
            //cryptage password en SHA-1 (METTRE A JOUR EN SALT).

            $password_crypt = sha1($pass);


            //requete preparé et exécution pour add pseudo et password dans la BDD.
            $req = $PDO->prepare("INSERT INTO users (login, password, mail, name, last_name, society_name, newsletter, account)
            VALUES (:pseudo, :password, :mail, :name, :last_name, :society_name, :newsletter, :account)");

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

    }

//funcion for users connection.
    function connect_user($login, $password)
    {
        $PDO = new PDO('mysql:host=localhost;dbname=noxduck', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        //use SHA-1 on password to crypt it.
        $password_crypt = sha1($password);


        //requete pour recupéré les info des comptes.
        $response = $PDO->query('SELECT id, login, password FROM users');

        //verify if mails already exist.
        while ($data = $response->fetch()) {
            if ($data['login'] == $login && $password_crypt == $data['password']) {

                return true;
                break;
            }

        }
        return false;

    }

    function clean_db() {
        $PDO = new PDO('mysql:host=localhost;dbname=noxduck', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

                $PDO->query('DELETE users
                            FROM users
                            LEFT OUTER JOIN (
                                    SELECT account as account, field1, field2
                                    FROM users
                                    GROUP BY field1, field2
                                ) AS table_1
                                ON users.mail = table_1.mail
                            WHERE table_1.account IS NULL');


        }
}