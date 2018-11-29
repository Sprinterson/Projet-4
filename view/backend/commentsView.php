<?php 
session_start();

$title = 'Gérer les commentaires'; ?>

<?php ob_start(); ?>

<section id="comments-view">
	<h1>Gérer les commentaires</h1>	

    <br/>

    <?php
        foreach ($comments as $data)
        {
        ?>
            <div class="news">
                <div class="comment-author"><p><?= nl2br(htmlspecialchars($data->author()))?></p></div>
                <div class="comment-content"><p><?= nl2br(htmlspecialchars($data->comment()))?></p></div>
                <div class="comment-modify"><a href=""><p>Modifier</p></a></div>
                <div class="comment-delete"><a href=""><p>Supprimer</p></a></div>
            </div>
        <?php
        }
    ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>