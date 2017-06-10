CREATE TABLE Utilisateur (
  id_Util INT NOT NULL AUTO_INCREMENT,
  nom_Util VARCHAR(20),
  prenom_Util VARCHAR(20),
  email VARCHAR(40),
  login_Util VARCHAR(8) NOT NULL UNIQUE,
  mdp_Util VARCHAR(10) NOT NULL,
  droit_Admin INT NOT NULL,
  PRIMARY KEY (id_Util)
);

CREATE TABLE Projet (
  id_Proj INT NOT NULL AUTO_INCREMENT,
  titre_Proj VARCHAR(30) NOT NULL,
  desc_Proj text,
  nb_part INT NOT NULL,
  id_Util_Proj INT NOT NULL,
  PRIMARY KEY (id_Proj),
  FOREIGN KEY (id_Util_Proj) REFERENCES Utilisateur(id_Util)
);

CREATE TABLE Media (
  id_Media INT NOT NULL AUTO_INCREMENT,
  cheminFichier_Media VARCHAR(200) NOT NULL,
  type_Media VARCHAR(30) NOT NULL,
  id_Proj_Media INT NOT NULL,
  PRIMARY KEY (id_Media),
  FOREIGN KEY (id_Proj_Media) REFERENCES Projet(id_Proj)
);

CREATE TABLE Actualites (
  id_Act INT NOT NULL AUTO_INCREMENT,
  contenu text,
  id_Proj_Act INT NOT NULL,
   PRIMARY KEY (id_Act),
  FOREIGN KEY (id_Proj_Act) REFERENCES Utilisateur(id_Projet)
);