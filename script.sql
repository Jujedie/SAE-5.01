-- Script SQL pour la base de données du projet SAE-5.01
-- Date de création: 5 novembre 2025

-- Suppression des tables si elles existent (dans l'ordre inverse des dépendances)
DROP TABLE IF EXISTS EXTENSION;
DROP TABLE IF EXISTS VOYAGE_PREFAIT;
DROP TABLE IF EXISTS HEBERGER;
DROP TABLE IF EXISTS VOYAGE;
DROP TABLE IF EXISTS AVIS;
DROP TABLE IF EXISTS POSTEBLOG;
DROP TABLE IF EXISTS JOURNAUX;
DROP TABLE IF EXISTS UTILISATEUR;
DROP TABLE IF EXISTS DESTINATION;
DROP TABLE IF EXISTS PAYS;

-- Table PAYS
CREATE TABLE PAYS
(
	id        SERIAL       PRIMARY KEY,
	nom       VARCHAR(100) NOT NULL,
	continent VARCHAR(50)  NOT NULL,
	cout      INT          NOT NULL
);

-- Table DESTINATION
CREATE TABLE DESTINATION
(
	id      SERIAL PRIMARY KEY,
	nom     TEXT NOT NULL,
	cout    INT  NOT NULL CHECK (cout >= 0),
	id_pays INT  NOT NULL,
	FOREIGN KEY (id_pays) REFERENCES PAYS(id) ON DELETE CASCADE
);

-- Table UTILISATEUR
CREATE TABLE UTILISATEUR
(
	id                   SERIAL       PRIMARY KEY,
	nom                  TEXT         NOT NULL,
	prenom               TEXT         NOT NULL,
	telephone            VARCHAR(10)  NOT NULL,
	email                TEXT         NOT NULL,
	role                 TEXT         NOT NULL,
	mdp                  VARCHAR(32)  NOT NULL,
	estAbonne            BOOLEAN      NOT NULL DEFAULT FALSE,
	resetToken           VARCHAR(255),
	resetTokenExpiration TIMESTAMP,
);

-- Table JOURNAUX
CREATE TABLE JOURNAUX
(
	id             SERIAL       PRIMARY KEY,
	message        VARCHAR(255) NOT NULL,
	date           TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
	id_utilisateur INT          NOT NULL,
	FOREIGN KEY (id_utilisateur) REFERENCES UTILISATEUR(id) ON DELETE CASCADE
);

-- Table POSTEBLOG
CREATE TABLE POSTEBLOG
(
	id             SERIAL      PRIMARY KEY,
	titre          TEXT        NOT NULL,
	type           VARCHAR(50) NOT NULL,
	date           TIMESTAMP   DEFAULT CURRENT_TIMESTAMP,
	contenu        TEXT        NOT NULL,
	image          TEXT,
	id_utilisateur INT         NOT NULL,
	FOREIGN KEY (id_utilisateur) REFERENCES UTILISATEUR(id) ON DELETE CASCADE
);

-- Table AVIS
CREATE TABLE AVIS
(
	id             SERIAL    PRIMARY KEY,
	note           INT       NOT NULL CHECK (note >= 1 AND note <= 5),
	date           TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	contenu        TEXT      NOT NULL,
	id_utilisateur INT       NOT NULL,
	FOREIGN KEY (id_utilisateur) REFERENCES UTILISATEUR(id) ON DELETE CASCADE
);

-- Table VOYAGE
CREATE TABLE VOYAGE
(
	id             SERIAL    PRIMARY KEY,
	dateDeDépart   TIMESTAMP NOT NULL,
	type           TEXT      NOT NULL,
	id_utilisateur INT       NOT NULL,
	FOREIGN KEY (id_utilisateur) REFERENCES UTILISATEUR(id) ON DELETE CASCADE
);

-- Table VOYAGE_PREFAIT (hérite de VOYAGE)
CREATE TABLE VOYAGE_PREFAIT
(
	titre           TEXT NOT NULL,
	programmeDesc   TEXT,
	hebergementDesc TEXT,
	conditionDesc   TEXT,
	formalitésDesc  TEXT,
	thematique      TEXT,
	montant         INT  NOT NULL,
	pieceJointe     TEXT
) INHERITS (VOYAGE);

-- Table EXTENSION (hérite de VOYAGE)
CREATE TABLE EXTENSION
(
	titre       TEXT NOT NULL,
	montant     INT  NOT NULL,
	pieceJointe TEXT
) INHERITS (VOYAGE);

-- Table HEBERGER (relation N:N entre VOYAGE et DESTINATION)
CREATE TABLE HEBERGER
(
	id_voyage      INT NOT NULL,
	id_destination INT NOT NULL,
	nbJours        INT NOT NULL,
	nbNuits        INT NOT NULL,
	PRIMARY KEY (id_voyage, id_destination),
	FOREIGN KEY (id_voyage) REFERENCES VOYAGE(id) ON DELETE CASCADE,
	FOREIGN KEY (id_destination) REFERENCES DESTINATION(id) ON DELETE CASCADE
);

-- Table RESERVER (relation N:N entre UTILISATEUR et VOYAGE)
CREATE TABLE RESERVER
(
    id_utilisateur  INT NOT NULL,
    id_voyage       INT NOT NULL,
    PRIMARY KEY (id_utilisateur, id_voyage),
    FOREIGN KEY (id_utilisateur) REFERENCES UTILISATEUR(id) ON DELETE CASCADE,
    FOREIGN KEY (id_voyage) REFERENCES VOYAGE(id) ON DELETE CASCADE
);

-- Index pour améliorer les performances
CREATE INDEX idx_destination_pays      ON DESTINATION(id_pays);
CREATE INDEX idx_journaux_utilisateur  ON JOURNAUX   (id_utilisateur);
CREATE INDEX idx_posteblog_utilisateur ON POSTEBLOG  (id_utilisateur);
CREATE INDEX idx_avis_utilisateur      ON AVIS       (id_utilisateur);
CREATE INDEX idx_voyage_utilisateur    ON VOYAGE     (id_utilisateur);
CREATE INDEX idx_heberger_destination  ON HEBERGER   (id_destination);
CREATE INDEX idx_reserver_utilisateur  ON RESERVER   (id_utilisateur);
CREATE INDEX idx_reserver_voyage       ON RESERVER   (id_voyage);

-- Insertion de données de test
-- Pays
INSERT INTO PAYS (nom, continent, cout) VALUES 
('France'    , 'Europe'          , 100),
('Japon'     , 'Asie'            , 150),
('États-Unis', 'Amérique du Nord', 120);

-- Destinations
INSERT INTO DESTINATION (nom, cout, id_pays) VALUES 
('Paris'   , 50, 1),
('Tokyo'   , 80, 2),
('New York', 70, 3);

-- Utilisateurs
INSERT INTO UTILISATEUR (nom, prenom, telephone, email, role) VALUES 
('Dupont', 'Jean'  , '0612345678', 'jean.dupont@example.com'  , 'client'),
('Martin', 'Sophie', '0623456789', 'sophie.martin@example.com', 'admin');
