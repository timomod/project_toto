<?php

/* -- Part 1 = Organisation --
------------------------------
- cr�er l'arborescence suivante :
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
		** Toutes les �tudiants => list.php
		** Ajout d'un �tudiant => add.php
		
- view/footer.php :
	* mettre un footer avec un copyright et l'ann�e courante => � 2017 | Tous droits r�serv�s
	
- index.php
	* en fin de script, inclure les vues "header", "home" & "footer"
*/

/* -- Part 2 = Page liste --
----------------------------

- list.php :
	* en fin de script, inclure les vues "header" & "footer"
	* r�cup�rer toutes les informations sur tous les �tudiants en DB
	* inclure la vue correspondant � la page "list"
	* afficher les informations (id, nom, pr�nom, email et date de naissance) sous forme de tableau (<table>). Attention, l'affichage se fait dans la vue (view)

*/

/* -- Part 3 = Page student --
----------------------------

- list.php :
	* pour chaque ligne du tableau (<table>), ajouer un bouton (lien) qui envoie sur la page student
	
- student.php :
	* r�cup�rer toutes les informations pour l'�tudiant sp�cifi�
	* inclure la vue correspondant � la page "student"
	* afficher les informations (id, nom, pr�nom, email, date de naissance, age, ville, sympathie, num�ro et nom de session). Attention, l'affichage se fait dans la vue (view) et je ne veux pas de tableau (<table>)

*/

/* -- Part 4 = Home --
----------------------
	
- index.php :
	* r�cup�rer toutes donn�es sur les sessions en DB (nom de la session, num�ro, dates et lieu)
	* inclure la vue correspondant � la page "home"
	* afficher toutes les sessions par lieu

*/

/* -- Part 5 = Page add/ajout --
--------------------------------
	
- add.php :
	* r�cup�rer toutes les villes de la DB
	* r�cup�rer toutes les sessions de la DB
	* inclure la vue correspondant � la page "add"
	* dans la vue, �crire le formulaire HTML permettant de saisir toutes les donn�es sur un student :
		nom, pr�nom, date de naissance, email, sympathie, session (menu d�roulant <select>) et ville (menu d�roulant <select>)
	* apr�s soumissions du formulaire :
		** r�cup�rer les donn�es envoy�es en POST par le formulaire
		** traiter et valider les donn�es
		** si toutes les donn�es sont valides, ajouter en DB puis rediriger sur la page "student" de l'�tudiant ajout�
	
*/

/* -- Part 6 = Liste pour 1 session --
--------------------------------------
	
- index.php :
	* mettre un lien sur les noms, dates et lieux dans sessions. Ce lien renvoit sur list.php pour afficher les �tudiants de cette session uniquement (filtre)
	
- list.php :
	* r�cup�rer le param�tre GET contenant l'ID de la session demand�e
	* si l'ID est fourni :
		** modifier la requ�te pour filtrer sur l'ID de session
		** afficher "Etudiants pour la session n�X � XXX" avant le tableau (<table>) des �tudiants

*/

/* -- Part 7 = recherche --
-----------------------------
	
- view/header.php :
	* dans la barre de menu, ajouter un formulaire permettant d'effectuer une recherche
		Ce formulaire renvoie sur list.php avec le mot recherch�e en GET
	
- list.php :
	* r�cup�rer le param�tre GET contenant le mot recherch�
	* si l'ID est fourni :
		** modifier la requ�te pour filtrer sur le mot recherch� dans les champs textuels suivants :
			nom/pr�nom/email/ville de l'�tudiant
		** afficher "x r�sultat(s) pour le mot XX" avant le tableau (<table>) des �tudiants

*/

/* -- Option 1 = home --
------------------------
	
- index.php :
	* r�cup�rer la statistique suivante (agr�gation) :
		le nombre d'�tudiants par ville
	* dans la vue, afficher les villes et leur nombres d'�tudiants, sous forme de tableau (<table>)
	
*/

/* -- Option 2 = Suppression �tudiant --
----------------------------------------
	
- list.php :
	* dans la vue, ajouter un bouton "Supprimer" (lien) pour chaque �tudiant
	* supprimer l'�tudiant dont l'ID est pass� en GET, dans la DB
	
*/

/* -- Option 3 = Modification --
--------------------------------
	
- student.php :
	* dans la vue, ajouter un bouton "Modifier" (lien) qui renvoi sur edit.php
	* si besoin, cr�er une vue pour "edit"
	* pr�-remplir le formulaire de modification avec les donn�es de l'�tudiant
	* g�rer la soumission du formulaire comme pour add.php (r�cup�ration, traitement, validation, update)
	
*/

/* -- Option 4 = Organiser son code --
--------------------------------------
	
- inc/functions.php :
	* �crire une fonction pour chaque requ�te SQL. Ces fonctions retourneront le tableau de r�sultats (fetchAll)
	
- ./*.php :
	* il ne doit plus y avoir de requ�tes. Il faut toutes les d�placer dans une fonction dans inc/functions.php
	* ne pas oublier d'appeler la fonction cr��e, puis de r�cup�rer son r�sultat
	
*/

/* -- Extra 1 = Add/Edit --
-------------------------
	
- add.php & edit.php :
	* comme les 2 fichiers sont similaires, faire en sorte d'ajouter et modifier dans un seul et unique fichier
	
*/

/* -- Extra 2 = Export --
-------------------------
	
- list.php :
	* dans la vue, ajouter un formulaire en POST avec un bouton "Exporter en CSV" (sur la m�me page)
	* si formulaire export sousmis :
		** ex�cuter la m�me requ�te (filtres) et r�cup�rer les donn�es
		** cr�er un fichier export.csv (regarder le format CSV) dans le r�pertoire tmp (� cr�er), avec les donn�es nom, pr�nom, email, date de naissance et ville
		** renvoyer au navigateur le contenu du fichier csv, avec le bon header HTTP, pour l'internaute t�l�charge le fichier
		** supprimer le fichier csv
	
*/
