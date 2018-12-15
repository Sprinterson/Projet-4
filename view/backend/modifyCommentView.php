<?php 
session_start();
$title = 'Modifier un commentaire'; 
if (empty($_SESSION['pseudo']) && empty($_SESSION['password'])){
                echo 'Session connectée';
                header('Location:index.php?action=adminAccess');
}
ob_start(); ?>

<section class="new-post">
    <?php
        foreach ($comments as $data){
            $id = (int) $data->id();
    ?>

    <br>
    <h1>Modifier un commentaire</h1>

    <form action="index.php?action=modifyComment&amp;>" method="post">
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea class="comment" name="comment"><?= nl2br(htmlspecialchars($data->comment())) ?></textarea>
        </div>
        <div>
            <input type="hidden" name="modified_id" value="<?php print $id ?>"/>
            <input class="submit-button" type="submit" value="Modifier" />
        </div>
    </form>

    <?php
        }
    ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>