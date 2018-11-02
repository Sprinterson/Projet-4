<?php
require('controller/frontendController.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts(); // renvoie sur la page de la liste d'articles si le paramètre d'action est listPosts
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post(); // renvoie sur la page d'ajout de commentaires si le paramètre d'action est listPosts
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }
    else {
        homeView(); // nom de la page d'accueil sur laquelle on est directement redirigé sur l'URL ne contient aucun paramètre.
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
