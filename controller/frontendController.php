<?php

namespace OpenClassrooms\Projet4\Controller; // La classe sera dans ce namespace

// Chargement des classes
require_once('model/PostsManager.php');
require_once('model/CommentsManager.php');

class FrontEndController
{
    // Chargement de la page d'accueil
    function homeView()
    {
        $postsManager = new \OpenClassrooms\Projet4\Model\PostsManager(); // Création d'un objet
        $posts = $postsManager->lastPost(); // Appel d'une fonction de cet objet
        require('view/frontend/homeView.php'); // Chargement de la page concernée
    } 

    // Chargement de la page listant les articles
    function listPosts()
    {
        $postsManager = new \OpenClassrooms\Projet4\Model\PostsManager(); 
        $posts = $postsManager->getPosts();
        require('view/frontend/listPostsView.php');
    }

    // Chargement de la page du billet sélectionné, et de ses commentaires
    function post()
    {
        $postsManager = new \OpenClassrooms\Projet4\Model\PostsManager();
        $commentsManager = new \OpenClassrooms\Projet4\Model\CommentsManager();

        $posts = $postsManager->getPost($_GET['id']);
        $comments = $commentsManager->getComments($_GET['id']);

        require('view/frontend/postView.php');
    }

    // Fonctionnalité d'ajout de commentaires
    function addComment($postId, $author, $comment)
    {
        $commentsManager = new \OpenClassrooms\Projet4\Model\CommentsManager();
        $affectedLines = $commentsManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
            header('Location: index.php?action=errorView');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    // Redirection sur la page d'erreur
    function errorView()
    {
        require('view/frontend/homeView.php'); // Chargement de la page concernée
    }
}