<?php $title = 'Derniers articles'; ?>

<?php ob_start(); ?>

<section id="list-posts">

    <div id="list-posts-banner">
        <h1>Derniers billets du blog</h1>
    </div>

    <br/>

    <?php
        foreach ($posts as $data)
        {
        $post_content = $data->content();
        $post_resume = substr($post_content, 0, 500);
        ?>
            <div class="news">

                <h2>
                    <a href="index.php?action=post&amp;id=<?= $data->id() ?>"><?= htmlspecialchars($data->title()) ?></a>
                    <em>le <?= $data->creation_date_fr() ?></em>
                </h2>
                
                <p>
                    <?= nl2br(htmlspecialchars($post_resume))?>
                    <br/>
                    <a href="index.php?action=post&amp;id=<?= $data->id() ?>" class="comments-link">Lire la suite [...]</a>
                </p>
            </div>
        <?php
        }

    //$posts->closeCursor();
    ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>