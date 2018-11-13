<?php

namespace OpenClassrooms\Projet4\Model; // La classe sera dans ce namespace

require_once 'Database.php';

class PostsManager
{
    public function getPosts()
    {
        $db = \OpenClassrooms\Projet4\Model\Database::dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function lastPost()
    {
        $db = \OpenClassrooms\Projet4\Model\Database::dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 1');

        return $req;
    }

    public function getPost($postId)
    {
        $db = \OpenClassrooms\Projet4\Model\Database::dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
}

