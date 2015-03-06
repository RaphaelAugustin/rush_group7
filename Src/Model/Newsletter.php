<?php
/**
 * Created by PhpStorm.
 * User: TaF
 * Date: 06/03/2015
 * Time: 00:53
 */

namespace Src\Model;

use \PDO;
class Newsletter
{

    function add_new_mail($mail)
    {
        $PDO = new PDO('mysql:host=localhost;dbname=noxduck', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        $req = $PDO->query('SELECT mail, newsletter FROM users');

        while ($data = $req->fetch()) {
            if ($data['mail'] == $mail ) {
                return false;
            }
        }


        $req = $PDO->prepare("INSERT INTO users (login, password, mail, name, last_name, society_name, newsletter, account)
            VALUES (:pseudo, :password, :mail, :name, :last_name, :society_name, :newsletter, :account)");

        //bind des paramètre pour que SQL fasse les vérification de validité des chaine envoyées.

        $req->execute([
            'pseudo' => '',
            'password' => '',
            'mail' => $mail,
            'name' => '',
            'last_name' => '',
            'society_name' => '',
            'newsletter' => true,
            'account' => false
        ]);
        return true;
    }
}