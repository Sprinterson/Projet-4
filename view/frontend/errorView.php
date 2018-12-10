<?php $title = 'Erreur détectée'; ?>

<?php ob_start(); ?>

<section id="error">
	<?= $errorContent ?>
	<a href="index.php">Retour à l'accueil</a>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>