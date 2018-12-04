<?php

namespace OpenClassrooms\Projet4\Model; // La classe sera dans ce namespace

require_once 'Database.php';
require_once 'Comment.php';

class CommentsManager
{
    public function getComments($postId){ // Fonction pour récupérer les commentaires
        // Une liste vide est créée, qui contiendra les données retournées par la requête
        $comments = [];

        // On se connecte à la base de données
        $db = \OpenClassrooms\Projet4\Model\Database::dbConnect(); 

        // On établit une requête dans la base de données pour récupérer les commentaires
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');

        // La requête retournée est transformée en tableau 
        $req->execute(array($postId));

        while ($data = $req->fetch($db::FETCH_ASSOC)){
           $comments[]  = new \OpenClassrooms\Projet4\Model\Comment($data); // On instancie le tableau en nouvel objet 
        };

        // l'objet est retourné en résultat
        return $comments; 
    }

     public function getAllComments(){
        $comments = [];

        $db = \OpenClassrooms\Projet4\Model\Database::dbConnect(); 
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments ORDER BY comment_date DESC');
        $req->execute(array());

        while ($data = $req->fetch($db::FETCH_ASSOC)){
           $comments[]  = new \OpenClassrooms\Projet4\Model\Comment($data); // On instancie le tableau en nouvel objet 
        };

        return $comments; 
    }   


    public function postComment($postId, $author, $comment){

        $newcomments = [];

        $db = \OpenClassrooms\Projet4\Model\Database::dbConnect();
        $req = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $req->execute(array($postId, $author, $comment));

        while ($data = $req->fetch($db::FETCH_ASSOC)){
            $newcomments[]  = new \OpenClassrooms\Projet4\Model\Comment($data);
        };

        return $newcomments;
    }


    public function deleteComment($id){
        $db = \OpenClassrooms\Projet4\Model\Database::dbConnect();
        $db->exec('DELETE FROM comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, ?)');
    }
}


