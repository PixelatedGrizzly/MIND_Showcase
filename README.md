MIND Showcase
=============
IF11/LO10 : Place de marché pour projets étudiants MIND
-------------------------------------------------------

####Design pattern à mettre en place :

_Datasource adaptater_
Pour les informations stockées en BDD, et les médias

_Command invoker_
Pour les informations destinées à être présentes dans plusieurs contextes

_Asynchronous reponse handler_
Pour modification des contenus sur un projet (ajout média, etc.)

_Idempotent retry_
Connection aux services tiers (Canaux de discussions, …)

_Service connector + Service descriptor_
Pour permettre l’utilisation des informations du site sur des sites tiers (portfolios d’utilisateurs, etc.)

**Autres design patterns à condidérer :** Media type negotiation, Request Mapper, Request Acknowledge, Service interceptor

####API à déployer :

_Medias disponibles pour un projet_
Google (Youtube -> PRESENTATION DU PROJET)

_Intégration réseau sociaux_
Social Media (FB/TWITTER/INSTAGRAM-> SUIVI DU PROJET)

_Financement de projet_
Kickstarter, Ulule, Tipeee, Patreon (FINANCEMENT DU PROJET)

_Outils de travail collaboratifs_
TAWK, ou autre Chat API gratuite (CONTACT)
Dropbox (FICHIER DU PROJET)
