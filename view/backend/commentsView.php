<?php 
session_start();

$title = 'Gérer les commentaires'; ?>

<?php ob_start(); ?>

<section id="comments-view">
    <form class="backtoAdmin" method="post" action="index.php?action=adminView">
        <input type="submit" name="backtoAdmin" value="Retour à l'administration"/>
    </form>
	<h1>Gérer les commentaires</h1>	

    <br/>

    <?php
        foreach ($comments as $data){
            $id = (int) $data->id();
        ?>
            <div class="news">
                <div class="comment-author"><p><?= nl2br(htmlspecialchars($data->author()))?></p></div>
                <div class="comment-content"><p><?= nl2br(htmlspecialchars($data->comment()))?></p></div>
                <div class="comment-modify">
                    <form id="modify" method="post" action="index.php?action=modifyComment">
                        <input type="hidden" name="modify_id" value="<?php print $id ?>"/>
                        <input type="submit" name="modify" value="Modifier"/>
                    </form>
                </div>              
                <div class="comment-delete">
                    <form id="delete" method="post" action="index.php?action=deleteComment">
                        <input type="hidden" name="delete_id" value="<?php print $id ?>"/>
                        <input type="submit" name="delete" value="Supprimer" <?php header('http://localhost/Projet-4/index.php?action=commentsView'); ?>/>

                    </form>
                </div>
            </div>
        <?php
        }
    ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>