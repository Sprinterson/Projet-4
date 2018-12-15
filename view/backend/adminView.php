<?php
session_start();
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
$title = 'Administration';
if (empty($_SESSION['pseudo']) && empty($_SESSION['password'])){
                echo 'Session connectée';
                header('Location:index.php?action=adminAccess');
}
$password = $_SESSION['password'];
var_dump($password);
ob_start(); ?>

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
		<form id="email" method="post">
			<label for="email">E-mail</label><br/>
	        <input type="email" name="email" value="<?php echo $email?>"/>
	    </form>
		<form id="modify-email" method="post" action="index.php?action=modifyEmail">
			<label for="modify-email">Changer d'adresse E-mail</label><br/>
	        <input type="email" name="modify-email" required/><br/>
	        <input class="submit-button" type="submit" value="Modifier"/>
	    </form>
		<form method="post" action="index.php?action=newPassword">
			<input type="hidden" name="actual-password" value="<?php print $_SESSION['password'] ?>"/>
			<label for="old-password">Mot de passe actuel</label><br/>
	        <input type="password" name="old-password" value="..."/><br/>
	        <br/>
	        <label for="new-password">Nouveau mot de passe</label><br/>
	        <input type="password" name="new-password" required /><br/>
	        <input class="submit-button" type="submit" value="Modifier"/>
	    </form>
    </div>

</section>

<?php

$content = ob_get_clean(); 
?>

<?php require('template.php'); ?>