# ENI - SORTIR
PROJET EN GROUPE (3) - Site de création d'évenements
<p><a href="https://github.com/romainhelard" target="_blank"><img alt="Github" src="https://img.shields.io/badge/GitHub-%2312100E.svg?&style=for-the-badge&logo=Github&logoColor=white" /></a>
 <a href="https://github.com/DadaBzh" target="_blank"><img alt="Github" src="https://img.shields.io/badge/GitHub-%2312100E.svg?&style=for-the-badge&logo=Github&logoColor=white" /></a>
 <a href="https://github.com/CocoA1SportbackSline" target="_blank"><img alt="Github" src="https://img.shields.io/badge/GitHub-%2312100E.svg?&style=for-the-badge&logo=Github&logoColor=white" /></a></p>

______________
# LOGICIEL/FRAMEWORK/BDD 
- VS Code / PHP Storm
- Symfony 6.1.4 / MySQL 5.7.34

______________
AIDE A L'INSTALLATION

```terminal
composer install
```
```terminal
npm install
```
```terminal
Symfony console doctrine:schema:update --force
```
```terminal
npm run watch
```
______________
SCHEMA BDD

```sql
CREATE TABLE `campus` (
 `id` int(11) NOT NULL AUTO_INCREMENT,`nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 PRIMARY KEY (`id`)
 ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci

CREATE TABLE `city` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `nom` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
 `code_postal` int(11) NOT NULL,
 PRIMARY KEY (`id`)
 ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
 
 CREATE TABLE `go_out` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `date_heure_debut` datetime NOT NULL,
 `duree` datetime NOT NULL,
 `date_limite_inscription` datetime NOT NULL,
 `nb_inscriptions_max` int(11) NOT NULL,
 `infos_sortie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `campus_id` int(11) DEFAULT NULL,
 `state_id` int(11) NOT NULL,
 `place_id` int(11) NOT NULL,
 `affiche` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 PRIMARY KEY (`id`),
 KEY `IDX_6A94D5A2AF5D55E1` (`campus_id`),
 KEY `IDX_6A94D5A25D83CC1` (`state_id`),
 KEY `IDX_6A94D5A2DA6A219` (`place_id`),
 CONSTRAINT `FK_6A94D5A25D83CC1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`),
 CONSTRAINT `FK_6A94D5A2AF5D55E1` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`id`),
 CONSTRAINT `FK_6A94D5A2DA6A219` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci

CREATE TABLE `place` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `city_id` int(11) DEFAULT NULL,
 `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
 `rue` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
 `latitude` double NOT NULL,
 `longitude` double NOT NULL,
 PRIMARY KEY (`id`),
 KEY `IDX_741D53CD8BAC62AF` (`city_id`),
 CONSTRAINT `FK_741D53CD8BAC62AF` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci

CREATE TABLE `state` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci

CREATE TABLE `user` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `administrateur` tinyint(1) NOT NULL,
 `actif` tinyint(1) NOT NULL,
 `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
 `roles` json NOT NULL,
 `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `photo_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci

```
