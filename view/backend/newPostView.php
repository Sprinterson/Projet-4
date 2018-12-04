<?php
session_start();

$title = 'Nouveau billet'; ?>

<?php ob_start(); ?>

<section id="new-post">
    <br>
	<h1>Rédiger un nouveau billet</h1>
    <form id="bta-newPost" class="backtoAdmin" method="post" action="index.php?action=adminView">
        <input type="submit" name="backtoAdmin" value="Retour à l'administration"/>
    </form>

	<form action="index.php?action=newPost&amp;>" method="post">
		<div>
            <label for="title">Titre</label><br />
            <input type="text" id="title" name="title" />
        </div>
        <div>
            <label for="content">Billet</label><br />
            <textarea id="content" name="content"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>