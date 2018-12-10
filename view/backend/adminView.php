<?php
session_start();
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)

$title = 'Administration'; ?>

<?php ob_start();?>

<section id="admin-view">

	<h1>Panneau d'admnistration</h1>
	<h2><a href="?action=postsBoardView">Gestion des articles</a></h2>
	<h2><a href="?action=commentsBoardView">Gestion des commentaires</a></h2>
	<h2><a href="?action=adminLogout">Se déconnecter</a></h2>

	<h1>Paramètres de profil</h1>
	<p>Pseudo</p>
	<form id="modify-name" method="post" action="index.php?action=modifyName">
        <input type="text" name="modify-name" value="<?php echo $_SESSION['pseudo']?>"/>
    </form>
    <p>E-mail</p>
	<form id="modify-mail" method="post" action="index.php?action=modifyMail">
        <input type="text" name="modify-mail" value="<?php echo $email?>"/>
    </form>

</section>

<?php

$content = ob_get_clean(); 
?>

<?php require('template.php'); ?>