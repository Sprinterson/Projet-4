<?php $title = 'Le blog de Jean Forteroche'; ?>

<?php ob_start(); ?>
<section id="homepage">

         <h1>Bienvenue sur le blog de Jean Forteroche</h1>

</section>

<section id="last-article">

    <br/>
    <h2 id="last-article-title">Dernier article publié</h2>
    <br/>
    <?php
        foreach ($posts as $posts)
        {
        ?>
            <div class="news">
                <h2>
                    <a href="index.php?action=post&amp;id=<?= $posts->id() ?>"><?= $posts->title() ?></a>
                    <br/>
                    <em>le <?= $posts->creation_date_fr() ?></em>
                </h2>
                <br/>
                <p>
                    <?= $posts->content()?>
                    <br/>
                    <br/>
                    <a href="index.php?action=post&amp;id=<?= $posts->id() ?>" class="comments-link">Commentaires</a>
                    <br/>
                </p>
            </div>
        <?php
        }

    //$posts->closeCursor();
    ?>
    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>