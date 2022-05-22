<?php

    include_once("tools/DatabaseLinker.php");
    include_once("DTO/CommentaireDTO.php");

    class CommentaireDAO
    {
        public static function getCommentaireById($idCommentaire)
        {
            $commentaire = null;
            
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("SELECT * FROM Commentaire WHERE idCommentaire=?");

            $state->bindParam(1, $idCommentaire);
            $state->execute();
            
            $resultats = $state->fetchAll();

            
            if (sizeof($resultats) > 0)
            {
                $result = $resultats[0];
                
                $commentaire = new CommentaireDTO();
                $commentaire->setIdCommentaire($result["idCommentaire"]);
                $commentaire->setDateParution($result["dateParution"]);
                $commentaire->setContent($result["content"]);
                $commentaire->setPseudo($result["pseudo"]);
                $commentaire->setIdArticle($result["idArticle"]);
            }
            
            return $commentaire;
        } 
        
        public static function insertCommentaire($commentaire)
        {        
            $connex = DatabaseLinker::getConnexion();
            
            $state = $connex->prepare("INSERT INTO Commentaire (pseudo, dateParution, content, idArticle) VALUES (?, ?, ?, ?)");

            $pseudo = $commentaire->getPseudo();
            $content = $commentaire->getContent();
            $dateParution = $commentaire->getDateParution();
            $idArticle = $commentaire->getIdArticle();
            
            $state->bindParam(1, $pseudo);
            $state->bindParam(2, $dateParution);
            $state->bindParam(3, $content);
            $state->bindParam(4, $idArticle);
            $state->execute();
        } 
    }

?>