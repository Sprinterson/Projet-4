<?php 

$title = 'Accès à l\'administration';
session_start();

if (session_status() == PHP_SESSION_ACTIVE){
            echo 'Session is active';
            if (!empty($_SESSION['pseudo']) && !empty($_SESSION['password'])){
                header('Location:http://localhost/Projet-4/index.php?action=adminView');
            }
};    

 ob_start(); ?>

<section id="admin-access">

	<h1>Connexion à l'admnistration</h1>
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