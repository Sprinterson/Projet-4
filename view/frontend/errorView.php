<?php $title = 'Le blog de Jean Forteroche'; ?>

<?php ob_start(); ?>

<section id="error">

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>