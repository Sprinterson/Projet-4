<?php

namespace OpenClassrooms\Projet4\Model; // La classe sera dans ce namespace

require_once 'Database.php';
require_once 'Post.php';

class PostsManager
{
    public function getPosts(){
        // On se connecte à la base de données
        $db = \OpenClassrooms\Projet4\Model\Database::dbConnect(); 

        // On établit une requête dans la base de données pour récupérer les billets
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 100');

        // La requête retournée est transformée en tableau 
        $req->execute(array());

        while ($data = $req->fetch($db::FETCH_ASSOC)){
           $posts[]  = new \OpenClassrooms\Projet4\Model\Post($data); // On instancie le tableau en nouvel objet 
        };

        // l'objet est retourné en résultat
        return $posts;
    }


    public function lastPost(){
        $db = \OpenClassrooms\Projet4\Model\Database::dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 1');
        $req->execute(array());

        while ($data = $req->fetch($db::FETCH_ASSOC)){
           $posts[]  = new \OpenClassrooms\Projet4\Model\Post($data); 
        };

        return $posts;
    }


    public function getPost($postId){
        $posts=[];

        $db = \OpenClassrooms\Projet4\Model\Database::dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));

        while ($data = $req->fetch($db::FETCH_ASSOC)){
           $posts[]  = new \OpenClassrooms\Projet4\Model\Post($data);
        };

        return $posts;
    }


    public function addPost($title, $content){
        $newpost=[];
        $db = \OpenClassrooms\Projet4\Model\Database::dbConnect();
        $req = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES( ?, ?, NOW())');
        $req->execute(array($title, $content));
        while ($data = $req->fetch($db::FETCH_ASSOC)){
           $newpost[]  = new \OpenClassrooms\Projet4\Model\Post($data);
        };

        return $newpost;
    }

    public function deletePost(\OpenClassrooms\Projet4\Model\Post $post){
        $id= (int) $_POST['delete_id'];
        $query = "DELETE FROM posts WHERE id= ?";
        $db = \OpenClassrooms\Projet4\Model\Database::dbConnect();
        $q = $db->prepare($query);
        $q->execute(array($id));
    }

}

