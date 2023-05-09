START TRANSACTION;
DROP DATABASE IF EXISTS `ToDoList_Vacances`;
CREATE DATABASE IF NOT EXISTS `ToDoList_Vacances`;
USe `ToDoList_Vacances`;


CREATE TABLE IF NOT EXISTS `task`
    (
    id integer (10) NOT NULL AUTO_INCREMENT,
    title varchar (50) NOT NULL,
    description varchar (150) NOT NULL,
    important boolean NOT NULL default false,
    PRIMARY KEY (id)
    );

    INSERT INTO `task` (`title`, `description`, important) VALUES
    ("Ranger la terrasse", "Karcheriser le sol et passer à la decheterie", false),
    ("Préparer la liste des bagages", "Vêtements, cosmétiques, médicaments, jouets, ordi pour travailler", false),
    ("Vérifier la voiture", "Gonfler les pneus et remettre de l'essence", true),
    ("Vérifier l'initnéraire", "Préparer les haltes, le péages, l'optimisation du trajet", true),
    ("Prendre du bon temps", "Piscine, balade, vélo, pique-nique, apéro, visite", false),
    ("Relancer les stages", "Rappeler les entreprises pour un stage dev web dès le retour", false);

COMMIT;