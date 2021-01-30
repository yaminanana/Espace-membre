DROP DATABASE IF EXISTS poney1; 
CREATE DATABASE poney1; 
USE poney1;


CREATE USER IF NOT EXISTS mina@localhost IDENTIFIED BY 'password';--On crée un utilisateur qui aura tout les droits
GRANT ALL ON poney1.* TO mina@localhost;

CREATE TABLE IF NOT EXISTS `Adherents` (
  `adherentId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL ,
  `motDePasse` varchar(255) NOT NULL,
  `numADH` varchar(255),
  `email` varchar(50) NOT NULL ,
  `numero` varchar(50) NOT NULL ,
  `adresse1` varchar(255) NOT NULL,
  `codePostal` int(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `dateAdhesion` date DEFAULT NULL,
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `numero` (`numero`)
) ENGINE=InnoDB; 

CREATE TABLE IF NOT EXISTS `Profils` (
    `profilId` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `titre` varchar(255) NOT NULL,
    `photo` varchar(255),
    `description` TEXT,
    `adherentId` int(11) DEFAULT NULL,
      CONSTRAINT `contrainte_cle_etrangere_Adherent` FOREIGN KEY (`adherentId`) REFERENCES `Adherents` (`adherentId`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `interetAdherent`(
    `centreInteretId` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `adherentId` int(11) DEFAULT NULL
     
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `interets`(
    `interetId` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` varchar(255)
)ENGINE=InnoDB;


INSERT INTO interets (nom)
VALUES
('sport'),('musique'),('jeux vidéos'),('lecture'),('informatique'),
('sorties'),('cuisine'),('aviation'),('mécanique'),('licornes'),
('joaillerie'),('agriculture'),('cinéma'),('politique'),('couture'),
('animaux'),('science'),('histoire'),('svt'),('physique-chimie'),('taxidermie'),('philatélie');

