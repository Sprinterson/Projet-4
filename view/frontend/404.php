<?php $title = 'Erreur détectée'; ?>

<?php ob_start(); ?>

<section id="error">
	<p> La page demandée n'existe pas, désolé </p><br>
	<a href="index.php">Retour à l'accueil</a>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>