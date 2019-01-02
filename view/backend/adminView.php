<?php
session_start();
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
$title = 'Administration';
if (!empty($_SESSION['pseudo']) && !empty($_SESSION['password'])){
    echo 'Session connectée';    
}
else{
    header('Location:index.php?action=adminAccess');
}

ob_start(); ?>

<section id="admin-view">

	<div>
		<h1>Panneau d'admnistration</h1>
		<h2><a href="?action=postsBoardView">Gestion des articles</a></h2>
		<h2><a href="?action=commentsBoardView">Gestion des commentaires</a></h2>
		<h2><a href="?action=adminLogout">Se déconnecter</a></h2>
		<h1>Informations</h1>
		<p>Utilisateur : <?php echo $_SESSION['pseudo']?></p>
		<p>Mot de passe : <?php echo $_SESSION['password']?></p>
		<p>Email : <?php echo $email?></p>
	</div>

	<div>
		<h1>Paramètres de profil</h1>

		<form method="post" action="index.php?action=oldPassword>
			<label for="old-password">Mot de passe actuel</label><br/>
	        <input type="password" name="old-password" /><br/>
	        <br/>
	    </form>

		<form id="pseudo" method="post" action="index.php?action=modifyName">
			<label for="pseudo">Pseudo</label><br/>
	        <input type="text" name="pseudo" required/><br/>
	        <input class="submit-button" type="submit" value="Modifier"/>
	    </form>

		<form id="modify-email" method="post" action="index.php?action=modifyEmail">
			<label for="modify-email">Changer d'adresse E-mail</label><br/>
	        <input type="email" name="modify-email" required/><br/>
	        <input class="submit-button" type="submit" value="Modifier"/>
	    </form>

		<form method="post" action="index.php?action=newPassword">
	        <label for="new-password">Nouveau mot de passe</label><br/>
	        <input type="password" name="new-password" required /><br/>
	        <input class="submit-button" type="submit" value="Modifier"/>
	    </form>
    </div>

</section>

<?php

$content = ob_get_clean(); 
 require('template.php'); ?>