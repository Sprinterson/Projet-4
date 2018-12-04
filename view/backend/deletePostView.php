<?php 
session_start();

$title = 'Supprimer un billet'; ?>

<?php ob_start(); ?>

<section id="delete-post">
    <form class="backtoAdmin" method="post" action="index.php?action=adminView">
        <input type="submit" name="backtoAdmin" value="Retour à l'administration"/>
    </form>
	<h1>Supprimer un billet</h1>
    
    <br/>

    <?php
        foreach ($posts as $data){
            $id = (int) $data->id();
    ?>
            <div class="news">
                <h2>
                    <a href="index.php?action=post&amp;id=<?= $id ?>"><?= htmlspecialchars($data->title()) ?></a>
                    <em>le <?= $data->creation_date_fr() ?></em>
                </h2>

                <form id="delete" method="post" action="index.php?action=deletePost">
                    <input type="hidden" name="delete_id" value="<?php print $id ?>"/>
                    <input type="submit" name="delete" value="Supprimer le billet"/>
                </form>
            </div>
    <?php
        }
    ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

 