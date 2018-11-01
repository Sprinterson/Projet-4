<?php $title = 'Le blog de Jean Forteroche'; ?>

<?php ob_start(); ?>

<section id="list-posts">

    <div id="list-posts-banner">
        <h1>Derniers billets du blog</h1>
    </div>

    <?php
        while ($data = $posts->fetch())
        {
        ?>
            <div class="news">
                <h3>
                    <?= htmlspecialchars($data['title']) ?>
                    <em>le <?= $data['creation_date_fr'] ?></em>
                </h3>
                
                <p>
                    <?= nl2br(htmlspecialchars($data['content'])) ?>
                    <br />
                    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
                </p>
            </div>
        <?php
        }

    $posts->closeCursor();
    ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>