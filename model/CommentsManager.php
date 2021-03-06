<?php

namespace Projet4\Model; // La classe sera dans ce namespace

use Projet4\Model\Database as Database;
use Projet4\Model\Comment as Comment;

class CommentsManager
{
    public function getComments($postId){ // Fonction pour récupérer les commentaires
        // Une liste vide est créée, qui contiendra les données retournées par la requête
        $comments = [];
        // On se connecte à la base de données
        $db = Database::dbConnect(); 
        // On établit une requête dans la base de données pour récupérer les commentaires
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, signals FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        // La requête retournée est transformée en tableau 
        $req->execute(array($postId));
        while ($data = $req->fetch($db::FETCH_ASSOC)){
           $comments[]  = new Comment($data); // On instancie le tableau en nouvel objet 
        };
        // l'objet est retourné en résultat
        return $comments; 
    }

    public function getComment($commentId){
        $comment=[];
        $db = Database::dbConnect();
        $req = $db->prepare('SELECT comment FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        while ($data = $req->fetch($db::FETCH_ASSOC)){
           $comment[]  = new Comment($data);
        };
        return $comment;
    }

     public function getAllComments(){
        $comments = [];
        $db = Database::dbConnect(); 
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, signals FROM comments ORDER BY signals DESC');
        $req->execute(array());
        while ($data = $req->fetch($db::FETCH_ASSOC)){
           $comments[]  = new Comment($data); // On instancie le tableau en nouvel objet 
        };
        return $comments; 
    }   


    public function postComment($postId, $author, $comment){
        $newcomments = [];
        $db = Database::dbConnect();
        $req = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $req->execute(array($postId, $author, $comment));
        while ($data = $req->fetch($db::FETCH_ASSOC)){
            $newcomments[]  = new Comment($data);
        };
        return $newcomments;
    }

    public function signalComment(){
        $id= (int) $_POST['signal_id'];
        var_dump($id);
        $db = Database::dbConnect();
        $req = $db->prepare('UPDATE comments SET signals = signals + 1 WHERE id=?');
        $req->execute(array($id));
    }

    public function modifyComment($comment){
        $id= (int) $_POST['modified_id'];
        $modifiedComment=[];
        $db = Database::dbConnect();
        $req = $db->prepare('UPDATE comments SET comment=? WHERE id=?');
        $req->execute(array($comment, $id));
        $data = $req->fetch($db::FETCH_ASSOC);
        while ($data = $req->fetch($db::FETCH_ASSOC)){
           $modifiedComment[]  = new \OpenClassrooms\Projet4\Model\Post($data);
        };
        return $modifiedComment;
        var_dump($modifiedComment);
    }

    public function deleteComment(){
        $id= (int) $_POST['delete_id'];
        $query = "DELETE FROM comments WHERE id= ?";
        $db = Database::dbConnect();
        $q = $db->prepare($query);
        $q->execute(array($id));
    }
}

