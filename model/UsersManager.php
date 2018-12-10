<?php

namespace OpenClassrooms\Projet4\Model; // La classe sera dans ce namespace

require_once 'Database.php';
require_once 'User.php';

class UsersManager
{
    public function getLogin(){ // Fonction pour récupérer les identifiants
        // On se connecte à la base de données
        $db = \OpenClassrooms\Projet4\Model\Database::dbConnect(); 

        // On établit une requête dans la base de données pour récupérer les identifiants
        $req = $db->query('SELECT id, pseudo, password, email FROM users');

        // La requête retournée est transformée en tableau 
        $req->execute(array());

        $data = $req->fetch($db::FETCH_ASSOC);
        
        // On instancie le tableau en nouvel objet 
        $login = new \OpenClassrooms\Projet4\Model\User($data); 

        // l'objet est retourné en résultat
        return $login;
    }
}