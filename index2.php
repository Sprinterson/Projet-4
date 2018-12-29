<?php

require_once('controller/frontendController.php');
require_once('controller/backendController.php');

use \OpenClassrooms\Projet4\Controller\FrontEndController as FrontEndController;
use \OpenClassrooms\Projet4\Controller\BackEndController as BackEndController;

try {
    // L'isset est le nom du paramètre de l'URL (comme 'action')
    switch (isset($_GET['action'])){

        // ADMIN ACCESS ====================================================================================

        // Redirige sur la page d'accès à l'administration
        case 'adminAccess' :
            $backendManager = new BackEndController;
            $backendManager->adminAccess();
            break;

        // ADMIN LOGIN =====================================================================================

        // Redirige sur la page vérifiant les identifiants de connexion
        case 'adminLogin' :
            $backendManager = new BackEndController;
            $backendManager->adminLogin();
            break;

        // ADMIN VIEW ==================================================================================

        // Redirige sur la page d'administration
        case 'adminView' :
            $backendManager = new BackEndController;
            $backendManager->adminView();
            break;

        // Modifie l'email de l'administrateur
        case 'modifyEmail' :
            $backendManager = new BackEndController;
            $backendManager->modifyEmail($_POST['modify-email']);
            break;

        // Modifie le mot de passe de l'administrateur
        case 'newPassword' :

            $backendManager = new BackEndController;
            $password = $backendManager->getLogin();

            $oldPassword = $_POST['old-password'];
            $newPassword = $_POST['new-password'];

            if ($password == $oldPassword){
                
                $backendManager->modifyPassword($newPassword);
            }
            else{
                throw new Exception("Mauvais mot de passe");
            }
            break;

        // ADMIN LOGOUT ====================================================================================

        // Redirige sur la page de déconnection
        case 'adminLogout' :
            $backendManager = new BackEndController;
            $backendManager->adminLogout();
            break;

        // POSTS BOARD VIEW ================================================================================

        // Redirige sur la page de gestion des articles
        case 'postsBoardView' :
            $backendManager = new BackEndController;
            $backendManager->postsBoardView();   
            break;

        // Création d'un nouvel article
        case 'newPost' :
            if (!empty($_POST['title']) && !empty($_POST['content'])){
                $backendManager = new BackEndController;
                $backendManager->addPost($_POST['title'], $_POST['content']);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
            break;

        // Redirige sur la page de modification d'un article
        case 'modifyPostView' :
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $backendManager = new BackEndController;
                $backendManager->modifyPostView();
            }
            else {
                throw new Exception('Aucun identifiant d\'article envoyé');
                $backendManager = new BackEndController;
                $backendManager->errorView();
            }
            break;

        // Modification d'un article existant
        case 'modifyPost' :
            if (!empty($_POST['title']) && !empty($_POST['content'])){
                $backendManager = new BackEndController;
                $backendManager->modifyPost($_POST['title'], $_POST['content']);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
            break;    
            
        // Suppression d'un article
        case 'deletePost' :
            $backendManager = new BackEndController;
            $backendManager->deletePost();
            break;

        // COMMENTS VIEW ===================================================================================

        // Redirige sur la page de gestion des commentaires
        case 'commentsBoardView' :
            $backendManager = new BackEndController;
            $backendManager->commentsBoardView();
            break;

        // Redirige sur la page de modification d'un commentaire
        case 'modifyCommentView' :
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $backendManager = new BackEndController;
                $backendManager->modifyCommentView();
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
                $backendManager = new BackEndController;
                $backendManager->errorView();
            }
            break;

        // Modification d'un commentaire existant
        case 'modifyComment' :
            if (!empty($_POST['comment'])){
                $comment = $_POST['comment'];
                $backendManager = new BackEndController;
                $backendManager->modifyComment($comment);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
            break;

        // Suppression de commentaire
        case 'deleteComment' :
            $backendManager = new BackEndController;
            $backendManager->deleteComment();
            break;

        // LIST POSTS VIEW =================================================================================

        // Redirige sur la page de la liste d'articles
        case 'listPosts' :
            $frontendManager = new FrontEndController;
            $frontendManager->listPosts();
            break;

        // POST VIEW =======================================================================================

        // Redirige sur la page de l'article avec ses commentaires
        case 'post' :
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $frontendManager = new FrontEndController;
                $frontendManager->post();
            }
            else{
                throw new Exception('Aucun identifiant de billet envoyé');
                $backendManager = new FrontEndController;
                $backendManager->errorView();
            }
            break;

        // Fonction d'ajout de commentaire
        case 'addComment' :
            if (isset($_GET['id']) && $_GET['id'] > 0){
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $id = $_GET['id'];
                    $frontendManager = new FrontEndController;
                    $frontendManager->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else{
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else{
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
            break;

        case 'signalComment' :
            $frontendManager = new FrontEndController;
            $frontendManager->signalComment();
            break;
    

        // HOME VIEW ===========================================================================================

        // Nom de la page d'accueil sur laquelle on est directement redirigé sur l'URL ne contient aucun paramètre.
        default :
            $frontendManager = new FrontEndController;
            $frontendManager->homeView();
            break;
    
    }
}


catch(Exception $message) {  
    $errorMessage = 'Erreur : ' . $message->getMessage();
    $frontendManager = new FrontEndController;
    $frontendManager->errorView($errorMessage); 
}



