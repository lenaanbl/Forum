<?php

    include_once("tools/DatabaseLinker.php");
    include_once("DTO/ArticleDTO.php");
    include_once("DAO/CommentaireDAO.php");

    class ArticleDAO
    {
        public static function getArticleById($idArticle)
        {
            $article = null;
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT * FROM Article WHERE idArticle=?");

            $state->bindParam(1, $idArticle);
            $state->execute();
            
            $resultats = $state->fetchAll();

            
            if (sizeof($resultats) > 0)
            {
                $result = $resultats[0];
                
                $article = new ArticleDTO();
                $article->setIdArticle($idArticle);
                $article->setTitre($result["titre"]);
                $article->setDateParution($result["dateParution"]);
                $article->setContent($result["content"]);
            }
            
            return $article;
        } 
        
        public static function getArticles()
        {
            $articlesArray = array();
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT idArticle FROM Article ORDER BY dateParution DESC");
            $state->execute();
            
            $resultats = $state->fetchAll();

            
            foreach ($resultats as $result)
            {
                $article = ArticleDAO::getArticleById($result["idArticle"]);
                $articlesArray[] = $article;
            }
            
            return $articlesArray;
        } 
        
        public static function getCommentairesByIdArticle($idArticle)
        {
            $commentsArray = array();
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT idCommentaire FROM Commentaire WHERE idArticle=? ORDER BY dateParution");

            $state->bindParam(1, $idArticle);
            $state->execute();
            
            $resultats = $state->fetchAll();

            
            foreach ($resultats as $result)
            {
                $comment = CommentaireDAO::getCommentaireById($result["idCommentaire"]);
                $commentsArray[] = $comment;
            }
            
            return $commentsArray;
        } 
    }

?>