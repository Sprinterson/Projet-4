<?php $title = 'Le blog de Jean Forteroche'; ?>

<?php ob_start(); ?>
<h1>Bienvenue</h1>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>