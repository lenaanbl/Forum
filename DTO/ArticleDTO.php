<?php

    class ArticleDTO
    {
        private $idArticle;
        private $titre;
        private $dateParution;
        private $content;

        public function getIdArticle()
        {
            return $this->idArticle;
        }
        
        public function setIdArticle($idArticle)
        {
            $this->idArticle = $idArticle;
        }   
        
        public function getTitre()
        {
            return $this->titre;
        }
        
        public function setTitre($titre)
        {
            $this->titre = $titre;
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
    }

?>