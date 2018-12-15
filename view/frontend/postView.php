<?php $title = 'Le blog de Jean Forteroche'; 

?>

<?php ob_start(); ?>

<section id="posts">
    <?php
        foreach ($posts as $data)
        {
    ?>
    <h1><a href="?action=listPosts">Retour à la liste des billets</a></h1>

    <div class="news">
        <h2>
            <?= htmlspecialchars($data->title()) ?>
            <br/>
            <em>le <?= $data->creation_date_fr() ?></em>
        </h2>
        <br/>
        <p>
            <?= nl2br(htmlspecialchars($data->content())) ?>
        </p>
        <br/>
    </div>
    <?php
    }
    ?>

    <h2 class="comments">Commentaires</h2>

    <?php
        foreach ($comments as $comments)
        {
            
    ?>
            <div class="comments-list">
                <p><strong><?= htmlspecialchars($comments->author()) ?></strong> le <?= $comments->comment_date_fr() ?></p>
                <p><?= nl2br(htmlspecialchars($comments->comment())) ?></p>
                <br/>
                <form action="index.php?action=signalComment&amp;id=<?= $data->id() ?>" method="post" >
                    <input type="hidden" name="signal_id" value="<?= $comments->id() ?>"/>
                    <input class="signal-button" type="submit" value="Signaler le commentaire" />
                </form>
            </div>
    <?php
        }
        foreach ($posts as $data)
        {
    ?>

    <h2 class="comments">Ajouter un commentaire</h2>

    <form action="index.php?action=addComment&amp;id=<?= $data->id() ?>" method="post">
        <div>
            <label for="author">Auteur</label><br/>
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br/>
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input class="submit-button" type="submit" value="Soumettre" />
        </div>
    </form>

    <?php
        }
    ?>
    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
