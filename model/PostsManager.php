<?php

namespace Projet4\Model; // La classe sera dans ce namespace

use Projet4\Model\Database as Database;
use Projet4\Model\Post as Post;

class PostsManager
{
    public function getPosts(){
        // On se connecte à la base de données
        $db = Database::dbConnect(); 
        // On établit une requête dans la base de données pour récupérer les billets
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 100');
        // La requête retournée est transformée en tableau 
        $req->execute(array());
        while ($data = $req->fetch($db::FETCH_ASSOC)){
           $posts[]  = new Post($data); // On instancie le tableau en nouvel objet 
        };
        // l'objet est retourné en résultat
        return $posts;
    }


    public function lastPost(){
        $db = Database::dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 1');
        $req->execute(array());
        while ($data = $req->fetch($db::FETCH_ASSOC)){
           $posts[]  = new Post($data); 
        };
        return $posts;
    }


    public function getPost($postId){
        $posts=[];
        $db = Database::dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        while ($data = $req->fetch($db::FETCH_ASSOC)){
           $posts[]  = new Post($data);
        };
        return $posts;
    }


    public function addPost($title, $content){
        $newpost=[];
        $db = Database::dbConnect();
        $req = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES( ?, ?, NOW())');
        $req->execute(array($title, $content));
        while ($data = $req->fetch($db::FETCH_ASSOC)){
           $newpost[]  = new Post($data);
        };
        return $newpost;
    }

    public function modifyPost($title, $content){
        $id= (int) $_POST['modified_id'];
        $modifiedPost=[];
        $db = Database::dbConnect();
        $req = $db->prepare('UPDATE posts SET title=?, content=? WHERE id=?');
        $req->execute(array($title, $content, $id));
        while ($data = $req->fetch($db::FETCH_ASSOC)){
           $modifiedPost[]  = new Post($data);
        };
        return $modifiedPost;
    }

    public function deletePost(){
        $id= (int) $_POST['delete_id'];
        $req = "DELETE FROM posts WHERE id=?";
        $db = Database::dbConnect();
        $q = $db->prepare($req);
        $q->execute(array($id));
    }

}
