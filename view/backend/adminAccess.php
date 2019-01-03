<?php 

$title = 'Accès à l\'administration';
session_start();

if (session_status() == PHP_SESSION_ACTIVE){
    if (!empty($_SESSION['pseudo']) && !empty($_SESSION['password'])){
        $pseudo = $_SESSION['pseudo'];
        header('Location:index.php?action=adminView');
    }
    else{
        echo "Pas d'identifiants stockés";
    }
};

 ob_start(); ?>

<section id="admin-access">

	<h1>Connexion à l'admnistration</h1>
	<form action="index.php?action=adminLogin" method="post">
        <div>
            <label for="pseudo">Pseudo</label><br />
            <input type="text" id="pseudo" name="pseudo" required />
        </div>
        <div>
            <label for="password">Mot de Passe</label><br />
            <input type="password" id="password" name="password" required />
        </div>
        <div>
            <input class="submit-button" type="submit" value="S'identifier" />
        </div>
    </form>

</section>

<?php $content = ob_get_clean();
      require('template.php'); ?>