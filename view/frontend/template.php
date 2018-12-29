<!DOCTYPE html>
<html lang="fr">
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
                <li><a href="?action=adminAccess" class="fade">Administration</a></li>
            </ul>
        </nav>
    </header>
        
    <body>
        <div id="container"><?= $content ?>
        <footer></footer>
        </div>
    </body>
</html>