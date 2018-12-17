<?php 
session_start();
$title = 'Modifier un commentaire'; 
if (empty($_SESSION['pseudo']) && empty($_SESSION['password'])){
                echo 'Session connectée';
                header('Location:index.php?action=adminAccess');
};
if(isset($_GET['id'])) {
    $id = $_GET['id'];
};
ob_start(); ?>

<section class="new-post">


    <br>
    <h1>Modifier un commentaire</h1>

    <form action="index.php?action=modifyComment" method="post">
        <?php
            foreach ($comments as $comments){
        ?>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea class="comment" name="comment" required><?= nl2br(htmlspecialchars($comments->comment())) ?></textarea>
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