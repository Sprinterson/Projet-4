<?php

// Chargement des classes
require_once('model/PostsManager.php');
require_once('model/CommentsManager.php');

function homeView()
{
    $postsManager = new \OpenClassrooms\Projet4\Model\PostsManager(); // Création d'un objet
    $posts = $postsManager->lastPost(); // Appel d'une fonction de cet objet
    //var_dump($posts);

    require('view/frontend/homeView.php');
}

function listPosts()
{
    $postsManager = new \OpenClassrooms\Projet4\Model\PostsManager(); 
    $posts = $postsManager->getPosts(); 
    //var_dump($posts);

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postsManager = new \OpenClassrooms\Projet4\Model\PostsManager();
    $commentsManager = new \OpenClassrooms\Projet4\Model\CommentsManager();

    $posts = $postsManager->getPost($_GET['id']);
    $comments = $commentsManager->getComments($_GET['id']);
    //var_dump($posts);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentsManager = new \OpenClassrooms\Projet4\Model\CommentsManager();

    $affectedLines = $commentsManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
