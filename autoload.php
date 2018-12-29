<?php

class AutoLoad
{
	public function autoLoad(){

		require_once('controller/frontendController.php');
		require_once('controller/backendController.php');
		require_once('model/PostsManager.php');
		require_once('model/CommentsManager.php');
		require_once('model/UsersManager.php');
		require_once('model/User.php');
		require_once('model/Database.php');
		require_once('model/Post.php');
		require_once('model/Comment.php');
	}
}


