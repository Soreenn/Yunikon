# Projet "Yunikon"

Le principe de Yunikon est de réunir plusieurs conventions et dates sur un site web commun, pour le moment, Yunikon réunira des événements Français et Suisse tel que :

- Paris Games Week (FR)
- Polymanga (CH)
- Japan Impact (CH)
- Japan Expo (FR)
- Japan Tours Festival (FR)
- Paris Manga (FR)

Yunikon portera elle même aussi sa propore édition de convention du nom de Yunikon qui est un événement annuel, le thème de la Pop-culture englobe le domaine du jeu-vidéo et de la culture Japonaise touchant spécifiquement le domaine des mangas et animés.

Les achats de billets pour les éditions Yunikon seront disponible sur le site sous inscription, une version PDF du ticket sera donnée pour par la suite pouvoir l'amener au guichet le jour de la convention.

Yunikon aura pour but de vendre, organiser et regrouper des événements par le biais d'une seule et même plateforme.

------

## Liste des objectifs

## Register

##### Name

Users Register 

##### Description

As a User  
I want to Register  

##### Show register page

User is disconnected  
User click on “Register” button  
Show sign in page  

##### Form is incomplete

User make a register request  
Register form is incomplete  
Show error message  

##### Username is already takken

User make a register request  
Username is already taken  
Show error message  

##### Email address is not correct

User make a register request  
Email address is not correct  
Show error message  

##### Telephone number is not correct

User make a register request  
Telephone number is not correct  
Show error message  

##### Form is complete and correct

User make a register request  
Register form is complete and correct  
Request is granted, the informations are registered in the database and the user   
is connected and in the main page  

## Login

##### Name

Users Login  

##### Description

As a User  
I want to Login  

##### Show login page

User is disconnected  
User click on "Login" button  
Show log in page  

##### Form is incomplete  

User make a login request  
Form is incomplete  
Show error message  
  
##### Email don't match  
  
User make a login request  
The email does not match  
Show error message  
  
##### Password don't match  
  
User make a login request  
The password does not match  
Show error message    

##### Form is complete and correct  
  
User make a login request  
Form is complete and correct  
Request is granted, the user is connected and in the main page  

----

## Display events

### Name
Display events

### Description
As a user
I want to see the events
In order to plan my agenda

### Open event page
Not in event page
Click on "events" button
Display the page

### Filter the events by date
Load the event page
Display the events by date

---
## user buy ticket

### Name
user buy ticket

### Description
As a User
I want to buy a ticket
in order to participate to the event

### Display ticket options
User is anonymous
Click on "Buy ticket"
Show message "user must be logged in" then show register form

### Buy ticket
User bought a ticket
Decrement number of tickets in data base when user buy on (or mroe)
Write order in database then send email to user with his order details.

### Add in logs of the user
User bought a ticket
User get a new item in his "order" page of his account

---

## Display countdown on home page

### Name
Display countdown on home page

### Description
As a User
I want see when the next event take place
In order to prepare for it

### Display countdown
Not in home page
Load home page
Display countdown

### Get the right numbers
Load home page
Get the right numbers
Display countdown

### Stop countdown
countdown is over
Stop countdown

## Stratégie de tests

##### Déroulement des tests
Le site sera publié sur internet et tenu a jour. Les testeurs pourront tous y avoir accès
Depuis nimporte quel appareil du moments qu'il aie un navigateur ainsi qu'une connexion internet.

##### Les testeurs
Chaque membre du groupe doit avoir au moin trois testeurs. Ils n'ont pas besoin d'avoir des 
connaissances poussées en infrmatique mais doivent tout de même savoir utiliser un ordinateur
et / ou un smartphone.

##### Les tests 
Les tests effectués seronts :
- Guidage
- Controles Explicites
- Adaptabilité
- Gestion des erreurs
- Homogénéité et Cohérence (aspect graphiqe)
- Signification des codes
- Compatibilités
- Sécurité



## Analyse de risques

##### Risques liés à l'équipe :
- un membre absent
- une mauvaise communication

Seront paliés part : 
La gestion de projet sur IceScrum  et des échange via un groupe Discord.


##### Risques liés à la charge de travail:
- Le projet s'avère être trop compliqué
- Le projet s'avère insufisant
- Une mauvaise répartition des tâches

Seront paliés part :
L'attribution des taches sur IceScrum ainsi que la flexibilité du code que nous avons prévu
assez simple de manière a rajouter des features.


##### Risques liés aux fichiers :
- un fichier se corromp
- un dossier est perdu
- Github crash
- le repo est perdu

Seront paliés part :
L'utilisation de Github pour partager les fichier ainsi que leur copie en local chez
chacuns des membres Yunikon.

## Planification initial :

### Sprint 1 :

Du 26/04 au 09/05

Le repository contient le fichier 'documentation projet.md', dans lequel les section suivantes ont un contenu significatif:

- Description du projet   
- Dans quel contexte le projet est-il réalisé ?   
- Organisation   
- Objectifs   
- Planification initiale   
- Stratégie de test   
-  Analyse des risques   
- Journal de bord

### Sprint 2

Du 10/05 au 23/05

Idée globale : Création de la page de connexion et d'inscription fonctionnelle avec intégrations de données

### Sprint 3

Du 24/05 au 06/06

Idée globale : Achats et gestions de stands fonctionnels et activation de compte

### Sprint 4

Du 07/06 au 20/06

Idée globale : Countdown fonctionnel, changement de mot de passe SMS + Email et protection double authentification