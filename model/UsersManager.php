<?php

namespace Projet4\Model; // La classe sera dans ce namespace

use Projet4\Model\Database as Database;
use Projet4\Model\User as User;

class UsersManager
{
    public function getLogin(){ // Fonction pour récupérer les identifiants
        // On se connecte à la base de données
        $db = \Projet4\Model\Database::dbConnect(); 
        // On établit une requête dans la base de données pour récupérer les identifiants
        $req = $db->query('SELECT id, pseudo, password, email FROM users');
        // La requête retournée est transformée en tableau 
        $req->execute(array());
        $data = $req->fetch($db::FETCH_ASSOC);
        // On instancie le tableau en nouvel objet 
        $login = new User($data); 
        // l'objet est retourné en résultat
        return $login;
    }

    public function modifyEmail($email){
        $eMail= $_POST['modify-email'];
        $db = Database::dbConnect();
        $req = $db->prepare('UPDATE users SET email=?');
        $req->execute(array($eMail));
    }

    public function modifyPassword($newPassword){
        $password= $_POST['new-password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $db = Database::dbConnect();
        $req = $db->prepare('UPDATE users SET password=?');
        $req->execute(array($hash));
    }
}