<?php 
session_start();
$title = 'Gérer les commentaires';
if (empty($_SESSION['pseudo']) && empty($_SESSION['password'])){
                echo 'Session connectée';
                header('Location:index.php?action=adminAccess');
}
ob_start(); ?>

<section id="comments-view">
	<h1>Gérer les commentaires</h1>	

    <br/>

    <?php
        foreach ($comments as $data){
            $id = (int) $data->id();
            $author = substr($data->author(),0, 20);
            $comment = substr($data->comment(),0, 50);
            $signals = (int) $data->signals();
        ?>
            <div class="news">
                <div class="comment-author"><p><?= $author ?></p></div>
                <div class="comment-content"><p><?= $comment ?></p></div>
                <div class="comment-signals"><p><?= $signals ?></p></div>
                <div class="content-modify">
                    <form id="modify" method="post" action="index.php?action=modifyCommentView&amp;id=<?= $id ?>">
                        <input type="hidden" name="modify_id" value="<?php print $id ?>"/>
                        <input type="submit" name="modify" value="Modifier"/>
                    </form>
                </div>              
                <div class="content-delete">
                    <form id="delete" method="post" action="index.php?action=deleteComment">
                        <input type="hidden" name="delete_id" value="<?php print $id ?>"/>
                        <input type="submit" name="delete" value="Supprimer"/>
                    </form>
                </div>
            </div>
        <?php
        }
    ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>