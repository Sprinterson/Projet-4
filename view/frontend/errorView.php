<?php $title = 'Erreur détectée'; ?>

<?php ob_start(); ?>

<section id="error">

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>