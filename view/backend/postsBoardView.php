<?php 
session_start();
$title = 'Gestion des articles';
if (empty($_SESSION['pseudo']) && empty($_SESSION['password'])){
                echo 'Session connectée';
                header('Location:index.php?action=adminAccess');
}
ob_start(); ?>

<section class="new-post">
    <br>
    <h1>Rédiger un nouvel article</h1>

    <form action="index.php?action=newPost&amp;" method="post">
        <div>
            <label for="title">Titre</label><br />
            <input type="text" class="title" name="title" required />
        </div>
        <div>
            <label for="content">Article</label><br />
            <textarea id="content" name="content" required ></textarea>
        </div>
        <div>
            <input class="submit-button" type="submit" value="Soumettre" />
        </div>
    </form>
</section>

<section id="manage-post">
	<h1>Gérer les articles</h1>
    
    <br/>

    <?php
        foreach ($posts as $data){
        $id = (int) $data->id();
    ?>
            <div class="news">
                <div class="content-post">
                    <h2>
                        <a href="index.php?action=post&amp;id=<?= $id ?>"><?= htmlspecialchars($data->title()) ?></a>
                        <em>le <?= $data->creation_date_fr() ?></em>
                    </h2>
                    <div class="content-modify">
                        <form id="modify" method="post" action="index.php?action=modifyPostView&amp;id=<?= $id ?>">
                            <input type="hidden" name="modify_id" value="<?php print $id ?>"/>
                            <input type="submit" name="modify" value="Modifier"/>
                        </form>
                    </div>
                    <div class="content-delete">
                        <form id="delete" method="post" action="index.php?action=deletePost">
                            <input type="hidden" name="delete_id" value="<?php print $id ?>"/>
                            <input type="submit" name="delete" value="Supprimer"/>
                        </form>
                    </div>
                </div>        
            </div>
    <?php
        }
    ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

 