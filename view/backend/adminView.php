<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

$title = 'Administration'; ?>

<?php ob_start();?>

<section id="admin-view">

	<h1>Panneau d'admnistration</h1>
	<h2><a href="?action=newPostView">Publier un nouveau billet</a></h2>
	<h2><a href="?action=deletePostView">Supprimer un billet</a></h2>
	<h2><a href="?action=commentsView">Gérer les commentaires</a></h2>

	<a href="?action=adminLogout">Se déconnecter</a>

</section>

<?php

$content = ob_get_clean(); 
?>

<?php require('template.php'); ?>