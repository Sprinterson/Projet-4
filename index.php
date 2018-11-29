<?php

require('controller/frontendController.php');
require('controller/backendController.php');

try {
    // L'isset est le nom du paramètre de l'URL (comme 'action')
    if (isset($_GET['action'])){

        // Redirige sur la page de la liste d'articles si le paramètre d'action est listPosts
        if ($_GET['action'] == 'listPosts'){
            listPosts(); 
        }

        // Redirige sur la page d'accès à l'administration
        elseif ($_GET['action'] == 'adminAccess'){
            adminAccess();
        }

        // Redirige sur la page d'administration
        elseif ($_GET['action'] == 'admin'){
            adminView();
        }

        // Redirige sur la page de rédaction de billet
        elseif ($_GET['action'] == 'newPostView'){
            newPostView();
        }

        // Création d'un nouveau billet
        elseif ($_GET['action'] == 'newPost'){
            if (!empty($_POST['title']) && !empty($_POST['content'])){
                    addPost($_POST['title'], $_POST['content']);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
            
        // Redirige sur la page de suppression de billet
        elseif ($_GET['action'] == 'deletePostView'){
            deletePostView();
        }

        // Suppression d'un nouveau billet
        elseif ($_GET['action'] == 'deletePost'){
                deletePost($_POST['title'], $_POST['content']);
        }

        // Redirige sur la page d'article avec commentaires
        elseif ($_GET['action'] == 'post'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        // Fonction d'ajout de commentaire
        elseif ($_GET['action'] == 'addComment'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                    homeView();
                }
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
                homeView();
            }
        }

        // Fonction de suppression de commentaire
        elseif ($_GET['action'] == 'deleteComment'){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
    }
    // Nom de la page d'accueil sur laquelle on est directement redirigé sur l'URL ne contient aucun paramètre.
    else {
        homeView(); 
    }
}


catch(Exception $message) {

    echo 'Erreur : ' . $message->getMessage();

    function error()
    {
        require('view/frontend/errorView.php');
    };

    error();
}



