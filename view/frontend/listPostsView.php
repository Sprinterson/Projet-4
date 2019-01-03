<?php $title = 'Derniers articles'; 
ob_start();?>


<section id="list-posts">
    <div id="list-posts-banner">
        <h1>Derniers billets du blog</h1>
    </div>
    <br/>

    <?php
    foreach ($posts as $posts){
        $post_content = $posts->content();
        $post_resume = substr($post_content, 0, 500);
    ?>
    <div class="news">
        <h2>
            <a href="index.php?action=post&amp;id=<?=$posts->id()?>"><?=$posts->title()?></a>
            <em>le <?=$posts->creation_date_fr()?></em>
        </h2>             
            <?=$post_resume?>...
            <br/>
            <a href="index.php?action=post&amp;id=<?=$posts->id()?>" class="comments-link">Lire la suite [...]</a>
    </div>
    <?php } ?>
</section>


<?php 
$content = ob_get_clean();
require('template.php'); 
?>