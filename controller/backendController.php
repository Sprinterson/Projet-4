<?php

namespace Projet4\Controller; // La classe sera dans ce namespace

use Projet4\Model\PostsManager as PostsManager;
use Projet4\Model\CommentsManager as CommentsManager;
use Projet4\Model\UsersManager as UsersManager;

class BackEndController
{

    // ADMIN ACCESS ====================================================================================

    // Chargement de la page d'accès à l'administration
    public function adminAccess(){
        require('view/backend/adminAccess.php');
    }

    // Chargement de la page vérifiant les identifiants de connexion
    public function adminLogin(){
        $usersManager = new UsersManager;
        $login = $usersManager->getLogin();
        $pseudo = $login->pseudo();
        $hash = $login->password();
        require('view/backend/adminLogin.php');
    }

    // Chargement des identifiants
    public function getLogin(){
        $usersManager = new UsersManager;
        $login = $usersManager->getLogin();
        $pseudo = $login->pseudo();
        $hash = $login->password();
        return $hash;
    }    

    // ADMIN VIEW ======================================================================================

    // Chargement du tableau de bord d'administration
    public function adminView(){
        $usersManager = new UsersManager;
        $login = $usersManager->getLogin();
        $pseudo = $login->pseudo();
        $email = $login->email();
        $password = $login->password();
        require('view/backend/adminView.php');
    }

    // Fonction de déconnection manuelle de l'administrateur
    public function adminLogout(){
        require('view/backend/adminLogout.php');
    }

    // Fonction de modification du pseudo de l'administrateur
    public function modifyUser($user){
        header('Location:index.php?action=adminView');
        $usersManager = new UsersManager;
        $usersManager->modifyUser($user);
    }

    // Fonction de modification de l'email de l'administrateur
    public function modifyEmail($email){
        header('Location:index.php?action=adminView');
        $usersManager = new UsersManager;
        $usersManager->modifyEmail($email);
    }

    // Fonction de modification du mot de passe de l'administrateur
    public function modifyPassword($newPassword){
        header('Location:index.php?action=adminView');
        $usersManager = new UsersManager;
        $usersManager->modifyPassword($newPassword);
    }

    // POSTS BOARD VIEW =================================================================================

    // Chargement de la page de gestion des articles
    public function postsBoardView(){
        $postsManager = new PostsManager; 
        $posts = $postsManager->getPosts();
        require('view/backend/postsBoardView.php');
    }

    // Chargement de la fonction d'ajout de l'article
    public function addPost($title, $content){
        header('Location:index.php?action=postsBoardView');
        $postsManager = new PostsManager;
        $affectedLines = $postsManager->addPost($title, $content);
        

        if ($affectedLines === false){
            throw new Exception('Impossible d\'ajouter l\'article !');
        }
    }

      // Chargement de la page de modification de l'article
    public function modifyPostView(){
        $postsManager = new PostsManager;
        $posts = $postsManager->getPost($_GET['id']);
        require('view/backend/modifyPostView.php');
    }

    // Chargement de la fonction de modification de l'article
    public function modifyPost($title, $content){
        header('Location:index.php?action=postsBoardView');
        $postsManager = new PostsManager; 
        $postsManager->modifyPost($title, $content);
    }

    // Chargement de la fonction de suppression de billet
    public function deletePost(){
        $postsManager = new PostsManager; 
        $postsManager->deletePost(); 
        header('Location:index.php?action=postsBoardView');
    }

    // COMMENTS BOARD VIEW ===================================================================================

    // Chargement de la page de gestion des commentaires
    public function commentsBoardView(){
    	$commentsManager = new CommentsManager; 
        $comments = $commentsManager->getAllComments(); 
        require('view/backend/commentsBoardView.php');
    }

    // Chargement de la page de modification du commentaire
    public function modifyCommentView(){
        $commentsManager = new CommentsManager;
        $comments = $commentsManager->getComment($_GET['id']);
        require('view/backend/modifyCommentView.php');
    }

    // Chargement de la fonction de modification de commentaire
    public function modifyComment($comment){
        header('Location:index.php?action=commentsBoardView');
        $commentsManager = new CommentsManager; 
        $commentsManager->modifyComment($comment);
    }

    // Chargement de la fonction de suppression de commentaire
    public function deleteComment(){
        $commentsManager = new CommentsManager; 
        $commentsManager->deleteComment(); 
        header('Location:index.php?action=commentsBoardView');
    }
}





