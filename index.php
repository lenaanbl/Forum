<?php 
	header('Content-Type: text/html;Charset=UTF8');
	session_start();
	// Inclusion des "model" -> fichiers backend
	include_once('model/operations.php');
	include_once('model/sessionUser.php');
	include_once('model/optimization.php');
	include_once('model/requestUser.php');
	

	/**
	 * On prend le parametre dans l'url qui va déterminer quelle page on regarde
	 * J'ai créer un nouveau fichier le request Manager
	 */
	$page = getPageName();

	switch( $page ) {
		case 'login':
			sessionControlOffline();
			$error = getErrorsForm();
			include_once('view/login.php');
			break;
		case 'signup':
			sessionControlOffline();
			$error = getErrorsForm();
			$success = getSuccessFromGETRequest();
			include_once('view/signup.php');
			break;
		case 'acceuil':
			sessionControlOnline();
			$success = getSuccessForm();//en provenance du service serviceNewPost
            $categories = getCategories();
            $categorySelected = getCategorySelected();
            if(!empty($categorySelected)){
                $posts = getPostByCateg($categorySelected);
            }else{
			    $posts = getAllPosts();
            }
			include_once('view/accueil.php');
			break;
		case 'newPost':
			sessionControlOnline();
			$error = getErrorsForm();
			$myid = getMyId();
			$categories = getCategories();
			include_once('view/newPost.php');
			break;
		case 'viewPost':
			sessionControlOnline();
			$error = getErrorsForm();
			$success = getSuccessForm();
			$myid = getMyId();
			$postid = getPostIdFromGETRequest();
			$post = getPostById($postid);

			$comments = getAllCommentsByPostId($postid);
			include_once('view/viewPost.php');
			break;
		case 'ban':
			include_once('view/listban.php');
			break;
		case 'deconnexion':
			sessionDestroy();
			break;
		case 'profile':
			sessionControlOnline();
			$error = getErrorsForm();
			$myid = getMyId();
			$categories = getCategories();
			include_once('view/profile.php');
			break;
		case 'change_pass':
			sessionControlOnline();
			$error = getErrorsForm();
			$myid = getMyId();
			include_once('view/change_pass.php');
}