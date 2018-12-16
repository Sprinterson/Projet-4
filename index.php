<?php

require_once('controller/frontendController.php');
require_once('controller/backendController.php');

try {
    // L'isset est le nom du paramètre de l'URL (comme 'action')
    if (isset($_GET['action'])){

        // ADMIN ACCESS ====================================================================================

        // Redirige sur la page d'accès à l'administration
        if ($_GET['action'] == 'adminAccess'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->adminAccess();
        }

        // ADMIN LOGIN =====================================================================================

        // Redirige sur la page vérifiant les identifiants de connexion
        elseif ($_GET['action'] == 'adminLogin'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->adminLogin();
        }

        // ADMIN VIEW ==================================================================================

        // Redirige sur la page d'administration
        elseif ($_GET['action'] == 'adminView'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->adminView();
        }

        // Modifie l'email de l'administrateur
        elseif ($_GET['action'] == 'modifyEmail'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->modifyEmail($_POST['modify-email']);
        }

        // Modifie le mot de passe de l'administrateur
        elseif ($_GET['action'] == 'newPassword'){ 

            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $password = $backendManager->getLogin();
            var_dump($password);

            $oldPassword = $_POST['old-password'];
            $newPassword = $_POST['new-password'];

            if ($password == $oldPassword){
                
                $backendManager->modifyPassword($newPassword);
            }
            else{
                throw new Exception("Mauvais mot de passe");
            }
        }

        // ADMIN LOGOUT ====================================================================================

        // Redirige sur la page de déconnection
        elseif ($_GET['action'] == 'adminLogout'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->adminLogout();
        }

        // POSTS BOARD VIEW ================================================================================

        // Redirige sur la page de gestion des articles
        elseif ($_GET['action'] == 'postsBoardView'){ 
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->postsBoardView();   
        }

        // Création d'un nouvel article
        elseif ($_GET['action'] == 'newPost'){
            if (!empty($_POST['title']) && !empty($_POST['content'])){
                $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
                $backendManager->addPost($_POST['title'], $_POST['content']);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }

        // Redirige sur la page de modification d'un article
        elseif ($_GET['action'] == 'modifyPostView'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
                $backendManager->modifyPostView();
            }
            else {
                throw new Exception('Aucun identifiant d\'article envoyé');
                $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
                $backendManager->errorView();
            }
        }

        // Modification d'un article existant
        elseif ($_GET['action'] == 'modifyPost'){
            if (!empty($_POST['title']) && !empty($_POST['content'])){
                $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
                $backendManager->modifyPost($_POST['title'], $_POST['content']);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }    
            
        // Suppression d'un article
        elseif ($_GET['action'] == 'deletePost'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->deletePost();
        }

        // COMMENTS VIEW ===================================================================================

        // Redirige sur la page de gestion des commentaires
        elseif ($_GET['action'] == 'commentsBoardView'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->commentsBoardView();
        }

        // Redirige sur la page de modification d'un commentaire
        elseif ($_GET['action'] == 'modifyCommentView'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
                $backendManager->modifyCommentView();
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
                $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
                $backendManager->errorView();
            }
        }

        // Modification d'un commentaire existant
        elseif ($_GET['action'] == 'modifyComment'){
            if (!empty($_POST['comment'])){
                $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
                $backendManager->modifyComment($_POST['comment']);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }

        // Suppression de commentaire
        elseif ($_GET['action'] == 'deleteComment'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->deleteComment();
        }

        // LIST POSTS VIEW =================================================================================

        // Redirige sur la page de la liste d'articles
        elseif ($_GET['action'] == 'listPosts'){
            $frontendManager = new \OpenClassrooms\Projet4\Controller\FrontEndController();
            $frontendManager->listPosts();
        }

        // POST VIEW =======================================================================================

        // Redirige sur la page de l'article avec ses commentaires
        elseif ($_GET['action'] == 'post'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $frontendManager = new \OpenClassrooms\Projet4\Controller\FrontEndController();
                $frontendManager->post();
            }
            else{
                throw new Exception('Aucun identifiant de billet envoyé');
                $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
                $backendManager->errorView();
            }
        }

        // Fonction d'ajout de commentaire
        elseif ($_GET['action'] == 'addComment'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $id = $_GET['id'];
                    $frontendManager = new \OpenClassrooms\Projet4\Controller\FrontEndController();
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
            $frontendManager = new \OpenClassrooms\Projet4\Controller\FrontEndController();
            $frontendManager->signalComment();
        }
    }

    // HOME VIEW ===========================================================================================

    // Nom de la page d'accueil sur laquelle on est directement redirigé sur l'URL ne contient aucun paramètre.
    else{
        $frontendManager = new \OpenClassrooms\Projet4\Controller\FrontEndController();
        $frontendManager->homeView();
    }
}


catch(Exception $message) {  
    $errorMessage = 'Erreur : ' . $message->getMessage();
    $frontendManager = new \OpenClassrooms\Projet4\Controller\FrontEndController();
    $frontendManager->errorView($errorMessage); 
}



