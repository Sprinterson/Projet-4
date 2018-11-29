<?php 
session_start();

$title = 'Gérer les commentaires'; ?>

<?php ob_start(); ?>

<section id="comments-view">
	<h1>Supprimer un billet</h1>	

    <br/>

    <?php
        foreach ($posts as $data)
        {
        ?>
            <div class="news">
                <h2>
                    <a href="index.php?action=post&amp;id=<?= $data->id() ?>"><?= htmlspecialchars($data->title()) ?></a>
                    <em>le <?= $data->creation_date_fr() ?></em>
                </h2>
                <a href="index.php?action=deletePost&amp;>id=<?= $data->id() ?>" class="delete-comment-link">Supprimer le commentaire</a> 
            </div>
        <?php
        }

    //$posts->closeCursor();
    ?>



</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>