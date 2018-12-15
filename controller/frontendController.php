<?php

namespace OpenClassrooms\Projet4\Controller; // La classe sera dans ce namespace

// Chargement des classes
require_once('model/PostsManager.php');
require_once('model/CommentsManager.php');

class FrontEndController
{

    // HOME VIEW =======================================================================================

    // Chargement de la page d'accueil
    function homeView()
    {
        $postsManager = new \OpenClassrooms\Projet4\Model\PostsManager(); // Création d'un objet
        $posts = $postsManager->lastPost(); // Appel d'une fonction de cet objet
        require('view/frontend/homeView.php'); // Chargement de la page concernée
    }

    // LIST POSTS ======================================================================================

    // Chargement de la page listant les articles
    function listPosts()
    {
        $postsManager = new \OpenClassrooms\Projet4\Model\PostsManager(); 
        $posts = $postsManager->getPosts();
        require('view/frontend/listPostsView.php');
    }

    // POST VIEW =======================================================================================

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
        $postId = $_GET['id'];
        header('Location:index.php?action=post&id='.$postId);
        $commentsManager = new \OpenClassrooms\Projet4\Model\CommentsManager();
        $affectedLines = $commentsManager->postComment($postId, $author, $comment);


        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
            header('Location: index.php?action=errorView');
        }
        else {
            header('Location:index.php?action=post&id=<?= $postId ?>');
        }
    }

    // Fonctionnalité pour signaler un commentaire
    function signalComment()
    {
        $postId = $_GET['id'];
        header('Location:index.php?action=post&id='.$postId);
        $commentsManager = new \OpenClassrooms\Projet4\Model\CommentsManager();
        $commentsManager->signalComment();
    }

    // ERROR VIEW ======================================================================================

    // Redirection sur la page d'erreur
    function errorView($errorMessage)
    {
    ob_start(); ?>
    <h1><?php print $errorMessage; ?></h1>
    <?php $errorContent = ob_get_clean(); ?>

    <?php require('view/frontend/errorView.php');// Chargement de la page concernée
    }
}