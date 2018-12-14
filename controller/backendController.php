<?php

namespace OpenClassrooms\Projet4\Controller; // La classe sera dans ce namespace

// Chargement des classes
require_once('model/PostsManager.php');
require_once('model/CommentsManager.php');
require_once('model/UsersManager.php');

class BackEndController
{

    // ADMIN ACCESS ====================================================================================

    // Chargement de la page d'accès à l'administration
    function adminAccess(){
        require('view/backend/adminAccess.php');
    }

    // Chargement de la page vérifiant les identifiants de connexion
    function adminLogin(){
        $usersManager = new \OpenClassrooms\Projet4\Model\UsersManager();
        $login = $usersManager->getLogin();
        $pseudo = $login->pseudo();
        $password = $login->password();
        require('view/backend/adminLogin.php');
    }

    // ADMIN VIEW ======================================================================================

    // Chargement du tableau de bord d'administration
    function adminView(){
        $usersManager = new \OpenClassrooms\Projet4\Model\UsersManager();
        $login = $usersManager->getLogin();
        $email = $login->email();
        require('view/backend/adminView.php');
    }

    // Fonction de déconnection manuelle de l'administrateur
    function adminLogout(){
        require('view/backend/adminLogout.php');
    }

    // POSTS BOARD VIEW =================================================================================

    // Chargement de la page de gestion des articles
    function postsBoardView(){
        $postsManager = new \OpenClassrooms\Projet4\Model\PostsManager(); 
        $posts = $postsManager->getPosts();
        require('view/backend/postsBoardView.php');
    }

    // Chargement de la fonction d'ajout de l'article
    function addPost($title, $content){
        header('Location:index.php?action=postsBoardView');
        $postsManager = new \OpenClassrooms\Projet4\Model\PostsManager();
        $affectedLines = $postsManager->addPost($title, $content);
        

        if ($affectedLines === false){
            throw new Exception('Impossible d\'ajouter l\'article !');
        }
    }

      // Chargement de la page de modification de l'article
    function modifyPostView(){
        $postsManager = new \OpenClassrooms\Projet4\Model\PostsManager();
        $posts = $postsManager->getPost($_GET['id']);
        require('view/backend/modifyPostView.php');
    }

    // Chargement de la fonction de modification de l'article
    function modifyPost($title, $content){
        header('Location:index.php?action=postsBoardView');
        $postsManager = new \OpenClassrooms\Projet4\Model\PostsManager(); 
        $postsManager->modifyPost($title, $content);
    }

    // Chargement de la fonction de suppression de billet
    function deletePost(){
        $postsManager = new \OpenClassrooms\Projet4\Model\PostsManager(); 
        $postsManager->deletePost(); 
        header('Location:index.php?action=postsBoardView');
    }

    // COMMENTS BOARD VIEW ===================================================================================

    // Chargement de la page de gestion des commentaires
    function commentsBoardView(){
    	$commentsManager = new \OpenClassrooms\Projet4\Model\CommentsManager(); 
        $comments = $commentsManager->getAllComments(); 
        require('view/backend/commentsBoardView.php');
    }

    // Chargement de la page de modification du commentaire
    function modifyCommentView(){
        $commentsManager = new \OpenClassrooms\Projet4\Model\CommentsManager();
        $comments = $commentsManager->getComment($_GET['id']);
        require('view/backend/modifyCommentView.php');
    }

    // Chargement de la fonction de modification de commentaire
    function modifyComment($comment){
        header('Location:index.php?action=commentsBoardView');
        $commentsManager = new \OpenClassrooms\Projet4\Model\CommentsManager(); 
        $commentsManager->modifyComment($comment);
    }

    // Chargement de la fonction de suppression de commentaire
    function deleteComment(){
        $commentsManager = new \OpenClassrooms\Projet4\Model\CommentsManager(); 
        $commentsManager->deleteComment(); 
        header('Location:index.php?action=commentsBoardView');
    }

    // CHECK LOGIN =====================================================================================

    // Fonction de vérification des paramètres de connection sur les pages membres
    function checkLogin(){
        if (session_status() == PHP_SESSION_ACTIVE){
            echo 'Session is active';
            if (!empty($_SESSION['pseudo']) && !empty($_SESSION['password'])){
            }
            else{
                header('Location:http://localhost/Projet-4/index.php');
            };
        };    
    }
}





