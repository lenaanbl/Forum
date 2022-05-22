DROP DATABASE IF EXISTS fireblog;

CREATE DATABASE IF NOT EXISTS fireblog
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE fireblog;

CREATE TABLE IF NOT EXISTS Article (
    idArticle INT(11) NOT NULL AUTO_INCREMENT,
    titre VARCHAR(64),
    dateParution DATETIME,
    content TEXT,
    PRIMARY KEY (idArticle)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS Commentaire (
    idCommentaire INT(11) NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(64),
    dateParution DATETIME,
    content TEXT,
    idArticle INT(11),
    PRIMARY KEY (idCommentaire)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE Commentaire
ADD CONSTRAINT Commentaire_idArticle
FOREIGN KEY(idArticle)
REFERENCES Article(idArticle);

INSERT INTO Article (idArticle, titre, dateParution, content) VALUES
(1, "Théorie du salaire d’efficience", "2019-09-22", "Lors d’une situation ou un principal (par exemple un patron) délègue une tâche à un agent (un employé). Se pose dans ce cas un problème d’asymétrie d’information car le principal ne peut pas parfaitement mesurer les efforts de l’agent. C’est le problème principal-agent.

Face à cette situation, Stiglitz a notamment développé la théorie du salaire d’efficience qui postule que les employeurs, ne pouvant pas contrôler parfaitement l’effort des employés, ont intérêt à les payer un salaire supérieur à leur productivité pour les inciter à l’effort maximal.
"),
(2, "Concurrence et monopole", "2019-09-13", "Les entreprises se font concurrence en réduisant leurs coûts de production et leurs prix de vente. Cette situation conduit à la concentration des moyens de production et à la création de monopoles qui renforcent la domination de la bourgeoisie.");

INSERT INTO Commentaire (pseudo, content, dateParution, idArticle) VALUES
("Kev1", "Ri1 compri lol <br> Envoyé de mon iphone 15", "2019-10-21", 1),
("Jean-Eudes", "Un manque de style indéniable dans cet article, c'était mieux avant.", "2020-01-10", 2),
("Pascal Duchene", "La jeunesse ne sait vraiment plus écrire <br> Pascal", "2020-01-20", 1),
("Pierrot", "OK Boomer", "2020-01-21", 1),
("Pierrot", "Tsss...", "2020-01-24", 2);