<?php 
session_start();

$title = 'Accès à l\'administration'; ?>

<?php ob_start(); ?>

<section id="admin-access">

	<h1>Panneau d'admnistration</h1>
	<form action="index.php?action=adminLogin" method="post">
        <div>
            <label for="pseudo">Pseudo</label><br />
            <input type="text" id="pseudo" name="pseudo" />
        </div>
        <div>
            <label for="password">Mot de Passe</label><br />
            <input type="password" id="password" name="password" />
        </div>
        <div>
            <input type="submit" value="login" />
        </div>
    </form>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>