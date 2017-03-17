<?php

/* -- Part 1 = Organisation --
------------------------------
- créer l'arborescence suivante :
	css/
	img/
	inc/
		config.php
		db.php
		functions.php
	js/
	view/
		header.php
		footer.php
		home.php
		list.php
		student.php
		add.php
	index.php
	list.php
	student.php
	add.php
	edit.php

- inclure le fichier de config dans chaque fichier "public" (racine)

- view/header.php :
	* mettre en place un menu en haut de page (bootstrap est pas mal ^^) avec les liens suivants :
		** Home => index.php
		** Toutes les sessions => index.php
		** Toutes les étudiants => list.php
		** Ajout d'un étudiant => add.php
		
- view/footer.php :
	* mettre un footer avec un copyright et l'année courante => © 2017 | Tous droits réservés
	
- index.php
	* en fin de script, inclure les vues "header", "home" & "footer"
*/

/* -- Part 2 = Page liste --
----------------------------

- list.php :
	* en fin de script, inclure les vues "header" & "footer"
	* récupérer toutes les informations sur tous les étudiants en DB
	* inclure la vue correspondant à la page "list"
	* afficher les informations (id, nom, prénom, email et date de naissance) sous forme de tableau (<table>). Attention, l'affichage se fait dans la vue (view)

*/

/* -- Part 3 = Page student --
----------------------------

- list.php :
	* pour chaque ligne du tableau (<table>), ajouer un bouton (lien) qui envoie sur la page student
	
- student.php :
	* récupérer toutes les informations pour l'étudiant spécifié
	* inclure la vue correspondant à la page "student"
	* afficher les informations (id, nom, prénom, email, date de naissance, age, ville, sympathie, numéro et nom de session). Attention, l'affichage se fait dans la vue (view) et je ne veux pas de tableau (<table>)

*/

/* -- Part 4 = Home --
----------------------
	
- index.php :
	* récupérer toutes données sur les sessions en DB (nom de la session, numéro, dates et lieu)
	* inclure la vue correspondant à la page "home"
	* afficher toutes les sessions par lieu

*/

/* -- Part 5 = Page add/ajout --
--------------------------------
	
- add.php :
	* récupérer toutes les villes de la DB
	* récupérer toutes les sessions de la DB
	* inclure la vue correspondant à la page "add"
	* dans la vue, écrire le formulaire HTML permettant de saisir toutes les données sur un student :
		nom, prénom, date de naissance, email, sympathie, session (menu déroulant <select>) et ville (menu déroulant <select>)
	* après soumissions du formulaire :
		** récupérer les données envoyées en POST par le formulaire
		** traiter et valider les données
		** si toutes les données sont valides, ajouter en DB puis rediriger sur la page "student" de l'étudiant ajouté
	
*/

/* -- Part 6 = Liste pour 1 session --
--------------------------------------
	
- index.php :
	* mettre un lien sur les noms, dates et lieux dans sessions. Ce lien renvoit sur list.php pour afficher les étudiants de cette session uniquement (filtre)
	
- list.php :
	* récupérer le paramètre GET contenant l'ID de la session demandée
	* si l'ID est fourni :
		** modifier la requête pour filtrer sur l'ID de session
		** afficher "Etudiants pour la session n°X à XXX" avant le tableau (<table>) des étudiants

*/

/* -- Part 7 = recherche --
-----------------------------
	
- view/header.php :
	* dans la barre de menu, ajouter un formulaire permettant d'effectuer une recherche
		Ce formulaire renvoie sur list.php avec le mot recherchée en GET
	
- list.php :
	* récupérer le paramètre GET contenant le mot recherché
	* si l'ID est fourni :
		** modifier la requête pour filtrer sur le mot recherché dans les champs textuels suivants :
			nom/prénom/email/ville de l'étudiant
		** afficher "x résultat(s) pour le mot XX" avant le tableau (<table>) des étudiants

*/

/* -- Option 1 = home --
------------------------
	
- index.php :
	* récupérer la statistique suivante (agrégation) :
		le nombre d'étudiants par ville
	* dans la vue, afficher les villes et leur nombres d'étudiants, sous forme de tableau (<table>)
	
*/

/* -- Option 2 = Suppression étudiant --
----------------------------------------
	
- list.php :
	* dans la vue, ajouter un bouton "Supprimer" (lien) pour chaque étudiant
	* supprimer l'étudiant dont l'ID est passé en GET, dans la DB
	
*/

/* -- Option 3 = Modification --
--------------------------------
	
- student.php :
	* dans la vue, ajouter un bouton "Modifier" (lien) qui renvoi sur edit.php
	* si besoin, créer une vue pour "edit"
	* pré-remplir le formulaire de modification avec les données de l'étudiant
	* gérer la soumission du formulaire comme pour add.php (récupération, traitement, validation, update)
	
*/

/* -- Option 4 = Organiser son code --
--------------------------------------
	
- inc/functions.php :
	* écrire une fonction pour chaque requête SQL. Ces fonctions retourneront le tableau de résultats (fetchAll)
	
- ./*.php :
	* il ne doit plus y avoir de requêtes. Il faut toutes les déplacer dans une fonction dans inc/functions.php
	* ne pas oublier d'appeler la fonction créée, puis de récupérer son résultat
	
*/

/* -- Extra 1 = Add/Edit --
-------------------------
	
- add.php & edit.php :
	* comme les 2 fichiers sont similaires, faire en sorte d'ajouter et modifier dans un seul et unique fichier
	
*/

/* -- Extra 2 = Export --
-------------------------
	
- list.php :
	* dans la vue, ajouter un formulaire en POST avec un bouton "Exporter en CSV" (sur la même page)
	* si formulaire export sousmis :
		** exécuter la même requête (filtres) et récupérer les données
		** créer un fichier export.csv (regarder le format CSV) dans le répertoire tmp (à créer), avec les données nom, prénom, email, date de naissance et ville
		** renvoyer au navigateur le contenu du fichier csv, avec le bon header HTTP, pour l'internaute télécharge le fichier
		** supprimer le fichier csv
	
*/
