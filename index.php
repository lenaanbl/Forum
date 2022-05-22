<?php

	include_once("include/header.php");
?>

	<link rel="stylesheet" type="text/css" href="css/index.css" media="all"/>


    <div class="page-container">
        
        <div class="page-content">

<?php

    include_once("DAO/CommentaireDAO.php");
    include_once("DAO/ArticleDAO.php");
        

    $tabArticles = ArticleDAO::getArticles();

    foreach($tabArticles as $article)
    {
        $dateArticle = new DateTime($article->getDateParution());
        
        $tabComments = ArticleDAO::getCommentairesByIdArticle($article->getIdArticle());
        
?>        
            <div class='article-container'>
            
                <div class='article-title'><?php echo $article->getTitre(); ?></div>
                <div class='article-date'>Publié le <?php echo $dateArticle->format('d/m/Y'); ?></div>
                <div class='article-content'><?php echo $article->getContent(); ?> </div>

                <div class='commentaires-block'>    
                    <h2>Réagissez</h2>

                    <form class="commentaire-form" method="POST" action="insertComment.php">
                        <input type="hidden" name="idArticle" value="<?php echo $article->getIdArticle(); ?>">
                        <input class="commentaire-name" type="text" name="pseudo" placeholder="Votre pseudonyme">
                        <textarea class="commentaire-textarea" name="content" placeholder="Votre commentaire"></textarea>
                        <input class="blog-button commentaire-submit" type="submit" value="Publier"/>
                    </form>
                    <h2>Commentaires (<?php echo sizeof($tabComments); ?>)</h2>
                    
<?php     
        foreach($tabComments as $comment)
        {
            $dateComment = new DateTime($comment->getDateParution());
?>         
                    
                    <div class='commentaire-container'>
                        <div class='commentaire-pseudo'>Par <?php echo $comment->getPseudo(); ?> le <?php echo $dateComment->format('d/m/Y'); ?> à <?php echo $dateComment->format('H:i:s'); ?></div>
                        <div class='commentaire-content'><?php echo $comment->getContent(); ?></div>
                    </div>
<?php
            
        }
        
?>
                </div>
             </div>
<?php
        
    }

?>
        </div>
    </div>

<?php	
        
	include_once("include/footer.php");
?>