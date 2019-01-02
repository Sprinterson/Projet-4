<?php
session_start();

$title = 'Erreur détectée';
$error = "username/password incorrect";

$url = substr($_SERVER['REQUEST_URI'], 1);

if(empty($_POST["comment"])){
	$_SESSION["error"] = $error;
    header('Location:index.php?action=adminAccess');
};
ob_start(); ?>

<section id="error">
	<?= $errorContent ?>
	<a href="index.php">Retour à l'accueil</a>
</section>

<?php $content = ob_get_clean();
	  require('template.php'); 
?>
                    $id = $_GET['id'];
                    $error = "username/password incorrect";
                    $_SESSION["error"] = $error;
                    header('Location:index.php?action=post&id='.$id);