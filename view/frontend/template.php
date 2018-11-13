<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>

    <header>
    	<h1><a href="index.php">Blog de Jean Forteroche</a></h1>
		<nav>
        	<ul>
                <li><a href="index.php" class="fade">Accueil</a></li>
                <li><a href="?action=listPosts" class="fade">Articles</a></li>
            </ul>
        </nav>
    </header>
        
    <body>
        <?= $content ?>
        <footer></footer>
    </body>
</html>