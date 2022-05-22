<?php

    class CommentaireDTO
    {
        private $idCommentaire;
        private $pseudo;
        private $content;
        private $dateParution;
        private $idArticle;

        public function getIdCommentaire()
        {
            return $this->idCommentaire;
        }
        
        public function setIdCommentaire($idCommentaire)
        {
           $this->idCommentaire = $idCommentaire;
        }
        
        public function getPseudo()
        {
            return $this->pseudo;
        }
        
        public function setPseudo($pseudo)
        {
           $this->pseudo = $pseudo;
        }
        
        public function getDateParution()
        {
            return $this->dateParution;
        }
        
        public function setDateParution($dateParution)
        {
           $this->dateParution = $dateParution;
        }
        
        public function getContent()
        {
            return $this->content;
        }
        
        public function setContent($content)
        {
           $this->content = $content;
        }

        public function getIdArticle()
        {
            return $this->idArticle;
        }
        
        public function setIdArticle($idArticle)
        {
            return $this->idArticle = $idArticle;
        }
    }

?>