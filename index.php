<?php

use Projet4\Controller\FrontEndController as FrontEndController;
use Projet4\Controller\BackEndController as BackEndController;

require_once('autoload.php');
$autoload = new AutoLoad;
$autoload->autoLoad();

try {
    // L'isset est le nom du paramètre de l'URL (comme 'action')
    if (isset($_GET['action'])){

        // ADMIN ACCESS ====================================================================================

        // Redirige sur la page d'accès à l'administration
        if ($_GET['action'] == 'adminAccess'){
            $backendManager = new BackEndController;
            $backendManager->adminAccess();
        }

        // ADMIN LOGIN =====================================================================================

        // Redirige sur la page vérifiant les identifiants de connexion
        elseif ($_GET['action'] == 'adminLogin'){
            $backendManager = new BackEndController;
            $backendManager->adminLogin();
        }

        // ADMIN VIEW ==================================================================================

        // Redirige sur la page d'administration
        elseif ($_GET['action'] == 'adminView'){
            $backendManager = new BackEndController;
            $backendManager->adminView();
        }

        // Modifie l'email de l'administrateur
        elseif ($_GET['action'] == 'modifyEmail'){
            $backendManager = new BackEndController;
            $backendManager->modifyEmail($_POST['modify-email']);
        }

        // Modifie le mot de passe de l'administrateur
        elseif ($_GET['action'] == 'newPassword'){ 

            $backendManager = new BackEndController;
            $hash = $backendManager->getLogin();

            $oldPassword = password_verify($_POST['old-password'], $hash);
            var_dump($oldPassword);
            $newPassword = $_POST['new-password'];

            if ($oldPassword === true){
                
                $backendManager->modifyPassword($newPassword);
            }
            else{
                throw new Exception("Mauvais mot de passe");
            }
        }

        // ADMIN LOGOUT ====================================================================================

        // Redirige sur la page de déconnection
        elseif ($_GET['action'] == 'adminLogout'){
            $backendManager = new BackEndController;
            $backendManager->adminLogout();
        }

        // POSTS BOARD VIEW ================================================================================

        // Redirige sur la page de gestion des articles
        elseif ($_GET['action'] == 'postsBoardView'){ 
            $backendManager = new BackEndController;
            $backendManager->postsBoardView();   
        }

        // Création d'un nouvel article
        elseif ($_GET['action'] == 'newPost'){
            if (!empty($_POST['title']) && !empty($_POST['content'])){
                $backendManager = new BackEndController;
                $backendManager->addPost($_POST['title'], $_POST['content']);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }

        // Redirige sur la page de modification d'un article
        elseif ($_GET['action'] == 'modifyPostView'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $backendManager = new BackEndController;
                $backendManager->modifyPostView();
            }
            else {
                throw new Exception('Aucun identifiant d\'article envoyé');
                $backendManager = new BackEndController;
                $backendManager->errorView();
            }
        }

        // Modification d'un article existant
        elseif ($_GET['action'] == 'modifyPost'){
            if (!empty($_POST['title']) && !empty($_POST['content'])){
                $backendManager = new BackEndController;
                $backendManager->modifyPost($_POST['title'], $_POST['content']);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }    
            
        // Suppression d'un article
        elseif ($_GET['action'] == 'deletePost'){
            $backendManager = new BackEndController;
            $backendManager->deletePost();
        }

        // COMMENTS VIEW ===================================================================================

        // Redirige sur la page de gestion des commentaires
        elseif ($_GET['action'] == 'commentsBoardView'){
            $backendManager = new BackEndController;
            $backendManager->commentsBoardView();
        }

        // Redirige sur la page de modification d'un commentaire
        elseif ($_GET['action'] == 'modifyCommentView'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $backendManager = new BackEndController;
                $backendManager->modifyCommentView();
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
                $backendManager = new BackEndController;
                $backendManager->errorView();
            }
        }

        // Modification d'un commentaire existant
        elseif ($_GET['action'] == 'modifyComment'){
            if (!empty($_POST['comment'])){
                $comment = $_POST['comment'];
                $backendManager = new BackEndController;
                $backendManager->modifyComment($comment);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }

        // Suppression de commentaire
        elseif ($_GET['action'] == 'deleteComment'){
            $backendManager = new BackEndController;
            $backendManager->deleteComment();
        }

        // LIST POSTS VIEW =================================================================================

        // Redirige sur la page de la liste d'articles
        elseif ($_GET['action'] == 'listPosts'){
            $frontendManager = new FrontEndController;
            $frontendManager->listPosts();
        }

        // POST VIEW =======================================================================================

        // Redirige sur la page de l'article avec ses commentaires
        elseif ($_GET['action'] == 'post'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $frontendManager = new FrontEndController;
                $frontendManager->post();
            }
            else{
                throw new Exception('Aucun identifiant de billet envoyé');
                $backendManager = new FrontEndController;
                $backendManager->errorView();
            }
        }

        // Fonction d'ajout de commentaire
        elseif ($_GET['action'] == 'addComment'){
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
        }

        elseif ($_GET['action'] == 'signalComment'){
            $frontendManager = new FrontEndController;
            $frontendManager->signalComment();
        }
    }

    // HOME VIEW ===========================================================================================

    // Nom de la page d'accueil sur laquelle on est directement redirigé sur l'URL ne contient aucun paramètre.
    else{
        $frontendManager = new FrontEndController;
        $frontendManager->homeView();
    }
}


catch(Exception $message) {  
    $errorMessage = 'Erreur : ' . $message->getMessage();
    $frontendManager = new FrontEndController;
    $frontendManager->errorView($errorMessage); 
}



