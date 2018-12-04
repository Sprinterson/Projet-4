<?php

require_once('controller/frontendController.php');
require_once('controller/backendController.php');

try {
    // L'isset est le nom du paramètre de l'URL (comme 'action')
    if (isset($_GET['action'])){

        // Redirige sur la page de la liste d'articles si le paramètre d'action est listPosts
        if ($_GET['action'] == 'listPosts'){
            $frontendManager = new \OpenClassrooms\Projet4\Controller\FrontEndController();
            $frontendManager->listPosts();
        }

        // Redirige sur la page d'accès à l'administration
        elseif ($_GET['action'] == 'adminAccess'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->adminAccess();
        }

        // Redirige sur la page vérifiant les identifiants de connexion
        elseif ($_GET['action'] == 'adminLogin'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->adminLogin();
        }

        // Redirige sur la page d'administration
        elseif ($_GET['action'] == 'adminView'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->adminView();
        }

        // Redirige sur la page de déconnection
        elseif ($_GET['action'] == 'adminLogout'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->adminLogout();
        }

        // Redirige sur la page de rédaction de billet
        elseif ($_GET['action'] == 'newPostView'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->newPostView();
        }

        // Création d'un nouveau billet
        elseif ($_GET['action'] == 'newPost'){
            if (!empty($_POST['title']) && !empty($_POST['content'])){
                $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
                $backendManager->addPost($_POST['title'], $_POST['content']);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
            
        // Redirige sur la page de suppression de billet
        elseif ($_GET['action'] == 'deletePostView'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->deletePostView();
        }

        // Suppression d'un billet
        elseif ($_GET['action'] == 'deletePost'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->deletePost();
        }

        // Redirige sur la page de suppression de billet
        elseif ($_GET['action'] == 'commentsView'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->commentsView();
        }

        // Redirige sur la page d'article avec commentaires
        elseif ($_GET['action'] == 'post'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $frontendManager = new \OpenClassrooms\Projet4\Controller\FrontEndController();
                $frontendManager->post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
                $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
                $backendManager->errorView();
            }
        }

        // Fonction d'ajout de commentaire
        elseif ($_GET['action'] == 'addComment'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $frontendManager = new \OpenClassrooms\Projet4\Controller\FrontEndController();
                    $frontendManager->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                    header('frontend/errorView.php');
                }
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }

        // Suppression de commentaire
        elseif ($_GET['action'] == 'deleteComment'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->deleteComment();
        }

        // Modification de commentaire
        elseif ($_GET['action'] == 'modifyComment'){
            $backendManager = new \OpenClassrooms\Projet4\Controller\BackEndController();
            $backendManager->modify();
        }
    }
    // Nom de la page d'accueil sur laquelle on est directement redirigé sur l'URL ne contient aucun paramètre.
    else {
        $frontendManager = new \OpenClassrooms\Projet4\Controller\FrontEndController();
        $frontendManager->homeView(); 
    }
}


catch(Exception $message) {

    header ('frontend/errorView.php');
    echo 'Erreur : ' . $message->getMessage();
}



