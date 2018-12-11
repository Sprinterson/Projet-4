<?php
session_start();
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)

$title = 'Administration'; ?>

<?php ob_start();?>

<section id="admin-view">

	<div>
		<h1>Panneau d'admnistration</h1>
		<h2><a href="?action=postsBoardView">Gestion des articles</a></h2>
		<h2><a href="?action=commentsBoardView">Gestion des commentaires</a></h2>
		<h2><a href="?action=adminLogout">Se déconnecter</a></h2>
	</div>

	<div>
		<h1>Paramètres de profil</h1>

		<form id="pseudo" method="post" action="index.php?action=modifyName">
			<label for="pseudo">Pseudo</label><br/>
	        <input type="text" name="pseudo" value="<?php echo $_SESSION['pseudo']?>"/>
	    </form>
	    <br/>
		<form id="email" method="post">
			<label for="email">E-mail</label><br/>
	        <input type="email" name="email" value="<?php echo $email?>"/>
	    </form>
	    <br/>
		<form id="modify-email" method="post" action="index.php?action=modifyEmail">
			<label for="modify-email">Changer d'adresse E-mail</label><br/>
	        <input type="email" name="modify-email"/><br/>
	        <input class="submit-button" type="submit" value="Modifier"/>
	    </form>
	    <br/>
		<form id="modify-password" method="post" action="index.php?action=modifyPassword">
			<label for="modify-password">Mot de passe actuel</label><br/>
	        <input type="password" name="modify-password"/><br/>
	        <br/>
	    </form>
	    <form id="new-password" method="post" action="index.php?action=modifyPassword">
	        <label for="new-password">Nouveau mot de passe</label><br/>
	        <input type="password" name="new-password"/><br/>
	        <input class="submit-button" type="submit" value="Modifier"/>
	    </form>
    </div>

</section>

<?php

$content = ob_get_clean(); 
?>

<?php require('template.php'); ?>