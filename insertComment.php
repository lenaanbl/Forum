<?php
	date_default_timezone_set('Europe/Paris');
	
    include_once("DAO/CommentaireDAO.php");

    if (!empty($_POST["pseudo"]) && !empty($_POST["content"]) && !empty($_POST["idArticle"]))
    {
        $comment = new CommentaireDTO();
        $comment->setContent($_POST["content"]);
        $comment->setPseudo($_POST["pseudo"]);
        $comment->setIdArticle($_POST["idArticle"]);
        $comment->setDateParution(date("Y-m-d H:i:s"));
        CommentaireDAO::insertCommentaire($comment);
    }

    header('Location: index.php');
    exit;

?>