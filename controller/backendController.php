<?php

// Chargement des classes
require_once('model/PostsManager.php');
require_once('model/CommentsManager.php');
require_once('model/UsersManager.php');

function deleteComment($postId, $author, $comment)
{
    $deleteManager = new \OpenClassrooms\Projet4\Model\CommentsManager();

    $deleteComment = $deleteManager->deleteComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

// Chargement de la page d'accès à l'administration
function adminAccess()
{
    require('view/backend/adminAccess.php');
}

// Chargement de la page d'administration
function adminView()
{
    require('view/backend/adminView.php');
}

// Chargement de la page d'ajout de billet
function newPostView()
{
    require('view/backend/newPostView.php');
}

// Chargement de la fonction d'ajout de billet
function addPost($title, $content)
{
    $postsManager = new \OpenClassrooms\Projet4\Model\PostsManager();

    $affectedLines = $postsManager->addPost($title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le billet !');
    }
    else {
        header('Location: index.php?action=post&id=' . $id);
    }
}

// Chargement de la page de suppression de billet
function deletePostView()
{
	$postsManager = new \OpenClassrooms\Projet4\Model\PostsManager(); 
    $posts = $postsManager->getPosts(); 

    require('view/backend/deletePostView.php');
}

// Chargement de la fonction de suppression de billet
function deletePost($title, $content)
{
    $postsManager = new \OpenClassrooms\Projet4\Model\PostsManager();

    $affectedLines = $postsManager->deletePost($title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer le billet !');
    }
    else {
        header('Location: index.php?action=post&id=' . $id);
    }
}

// Chargement de la page de gestion des commentaires
function commentsView()
{
	$commentsManager = new \OpenClassrooms\Projet4\Model\PostsManager(); 
    $comments = $commentsManager->getPosts(); 

    require('view/backend/deletePostView.php');
}






