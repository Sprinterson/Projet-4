<?php 
session_start();

$title = 'Administration'; ?>

<?php ob_start(); ?>

<section id="admin">

	<h1>Panneau d'admnistration</h1>
	<h2><a href="?action=newPostView">Publier un nouveau billet</a></h2>
	<h2><a href="?action=deletePostView">Supprimer un billet</a></h2>
	<h2><a href="?action=newPostView">Gérer les commentaires</a></h2>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>