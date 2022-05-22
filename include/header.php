<?php 

	if (empty($_SESSION))
	{
		session_start();
	}
?>


<!DOCTYPE html>
<html lang="fr">
	<head>
	
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/general.css" media="all"/>
		<link rel="icon" type="image/png" href="images/favicon.png"/>

		<meta charset="utf-8" />
		<title>FireBlog</title>		
	</head>
	<body>
        <div class="bandeau-top">
            <a class="accueil-link" href="index.php"><img src="images/favicon.png" alt=""/><span>FireBlog</span></a>
        </div>
            
            
	