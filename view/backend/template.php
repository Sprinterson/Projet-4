<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=nfzo0ihexk3hmrmfugd8e5hjsmzwam9bk096ju2kh54mkkov"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
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