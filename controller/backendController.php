<?php

// Chargement des classes
require_once('model/PostsManager.php');
require_once('model/CommentsManager.php');
require_once('model/UsersManager.php');

// Chargement de la page d'accès à l'administration
function adminAccess()
{
    require('view/backend/adminAccess.php');
}

// Chargement de la page vérifiant les identifiants de connexion
function adminLogin()
{
    $usersManager = new \OpenClassrooms\Projet4\Model\UsersManager();
    $login = $usersManager->getLogin();
    require('view/backend/adminLogin.php');
}

function adminView()
{
    require('view/backend/adminView.php');
}

function adminLogout()
{
    require('view/backend/adminLogout.php');
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

    if ($affectedLines === false){
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
function deletePost()
{
    $id= (int) $_POST['delete_id'];
    $query = "DELETE FROM posts WHERE id= ?";
    $db = \OpenClassrooms\Projet4\Model\Database::dbConnect();
    $q = $db->prepare($query);
    $q->execute(array($id));
}

// Chargement de la page de gestion des commentaires
function commentsView()
{
	$commentsManager = new \OpenClassrooms\Projet4\Model\CommentsManager(); 
    $comments = $commentsManager->getAllComments(); 

    require('view/backend/commentsView.php');
}

// Chargement de la fonction de suppression de billet
function deleteComment()
{
    $id= (int) $_POST['delete_id'];
    $query = "DELETE FROM comments WHERE id= ?";
    $db = \OpenClassrooms\Projet4\Model\Database::dbConnect();
    $q = $db->prepare($query);
    $q->execute(array($id));
}

// Chargement de la fonction de suppression de billet
function modifyComment()
{
    $id= (int) $_POST['modify_id'];
    $query = "DELETE FROM comments WHERE id= ?";
    $db = \OpenClassrooms\Projet4\Model\Database::dbConnect();
    $q = $db->prepare($query);
    $q->execute(array($id));
}








