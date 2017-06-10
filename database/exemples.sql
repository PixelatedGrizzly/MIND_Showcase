INSERT INTO Utilisateur (nom_Util, prenom_Util, login_Util, mdp_Util, droit_Admin) VALUES ('Admin', 'Admin', 'admin', 'admin', 1);
INSERT INTO Utilisateur (nom_Util, prenom_Util, login_Util, mdp_Util, droit_Admin) VALUES ('Dyson', 'Mike', 'dysonmke', 'test1234', 0);
INSERT INTO Utilisateur (nom_Util, prenom_Util, login_Util, mdp_Util, droit_Admin) VALUES ('Armstrong', 'Neil', 'armstone', 'test1234', 0);
INSERT INTO Utilisateur (nom_Util, prenom_Util, login_Util, mdp_Util, droit_Admin) VALUES ('McQueen', 'steve', 'mcqueest', 'test1234', 0);

INSERT INTO Projet (titre_Proj, desc_Proj, id_Util_Proj) VALUES ('Robot de combat AD-6', 'Un robot conçu pour aider les forces de l\'ordre dans des missions à hauts risques.', 2);
INSERT INTO Projet (titre_Proj, desc_Proj, id_Util_Proj) VALUES ('Satellite UTT', 'Un satellite pour permettre des délais plus court pour se connecter plus rapidement au site de l\'ENT', 3);
INSERT INTO Projet (titre_Proj, desc_Proj, id_Util_Proj) VALUES ('Moto électrique', 'Un engin motorisé à deux roues fonctionnant uniquement avec de l\'éléctricité !', 4);

INSERT INTO Media (cheminFichier_Media, type_Media, id_Proj_Media) VALUES ('1.jpg', 'image', 1);
INSERT INTO Media (cheminFichier_Media, type_Media, id_Proj_Media) VALUES ('2.jpg', 'image', 2);
INSERT INTO Media (cheminFichier_Media, type_Media, id_Proj_Media) VALUES ('3.jpg', 'image', 3);

INSERT INTO Actualites (contenu,id_Proj_Act) VALUES ("Contenu 1",1);
INSERT INTO Actualites (contenu,id_Proj_Act) VALUES ("Contenu 2",2);
INSERT INTO Actualites (contenu,id_Proj_Act) VALUES ("Contenu 3",3);
