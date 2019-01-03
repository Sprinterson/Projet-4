<?php
session_start();

$title = 'Erreur détectée';

ob_start(); ?>

<section id="error">
	<?=$errorContent?>
	<a href="index.php">Retour à l'accueil</a>
</section>

<?php 
$content = ob_get_clean();
require('template.php'); 
?>
