<?php
// On récupère les identifiants valides sur la base de données

// on teste si nos variables sont définies
if (isset($_POST['pseudo']) && isset($_POST['password'])) {

	// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
	if ($pseudo == $_POST['pseudo'] && $password == $_POST['password']) {

		// On démarre la session
		session_start ();
		// on enregistre les paramètres de notre visiteur comme variables de session ($pseudo et $password)
		$_SESSION['pseudo'] = $_POST['pseudo'];
		$_SESSION['password'] = $_POST['password'];
		$_SESSION['email'] = $email;

		// on redirige notre visiteur vers une page de notre section membre
		header('Location: index.php?action=adminView');
	}
	else {
		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'Membre non reconnu...\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=https://projet-4.gordia.fr/index.php?action=adminAccess	">';
	}
}
else {
	echo 'Les variables du formulaire ne sont pas déclarées.';
}
?>



