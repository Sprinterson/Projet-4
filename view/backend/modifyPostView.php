<?php 
session_start();
$title = 'Modifie un article';
if (empty($_SESSION['pseudo']) && empty($_SESSION['password'])){
                echo 'Session connectée';
                header('Location:index.php?action=adminAccess');
}
ob_start(); ?>

<section class="new-post">
    <?php
        foreach ($posts as $data){
            $id = (int) $data->id();
    ?>

    <br>
    <h1>Modifier un article</h1>

    <form action="index.php?action=modifyPost" method="post">
        <div>
            <label for="title">Titre</label><br />
            <input type="text" class="title" name="title" value="<?= htmlspecialchars($data->title()) ?>" />
        </div>
        
        <div>
            <label for="content">Article</label><br />
            <textarea class="content" name="content"><?= nl2br(htmlspecialchars($data->content())) ?></textarea>
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