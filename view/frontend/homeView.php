<?php $title = 'Le blog de Jean Forteroche'; ?>

<?php ob_start(); ?>
<section id="homepage">
        <h1>Bienvenue sur le blog de Jean Forteroche</h1>
</section>

<section id="last-article">
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>