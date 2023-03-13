###

Devops project

### Ansible roles repo : 

- https://github.com/SimonBredeche/devops_project_roles

## Description du projet

Dans le cadre de notre cours de devops, nous devions mettre en place une architecture automatisé de bout en bout. Notre architecture doit être capable de ce reconstruire si jamais ont la « casse ». 
Nous avons décidé de partir sur un site de type e-commerce  de vente de meuble et de produit électro ménagé.

## Présentation de l’infrastructure technique 

Pour ce projet, nous avons décidé d’utiliser les technologies suivantes : 
  Ansible : pour l’installation des dépendances et l’exécution de commande automatique sur une VM
  Docker : Afin de conteneuriser et gérer les dépendances de l’application
  PHP : Pour l’api du site 
  HTML / Javascript : Pour le front du site
  MYSQL : Pour la base de donnée
  
// SCHEMA VMs

  La première machine, est celle qui contient ansible ainsi que le code de l’application. Le déploiement ce divise en 2 rôles : 
Le rôle « Docker » : il va servir à installer les dépendances relative à docker (docker, docker-compose ect …) ainsi que de construire les images et les lancers. 
Le rôle « back-end » : il va servir à installer le serveur MySQL ainsi que de créer une base de données et un utilisateur par défaut. 
Ansible va déployer sur la première VM l’api , le front ainsi qu’un cronjob de backup mysql.
Sur la deuxième VM c’est le serveur MySQL qui est déployé. 

Le serveur MySQL va contenir toutes les données persistantes du site, un utilisateur ainsi qu’une base de donnée est créé par défaut. Le fichier de configuration est automatiquement ajouté sur le serveur

Dans la deuxième VM, ansible va déployer l’api en PHP. L’api peut communiquer avec tous les autres conteneur de la « VM1 »

La première VM peut recevoir ainsi qu’envoyer de la donnée vers la deuxième VM.

Dans la « VM1 » on va aussi déployer le conteneur possédant le front du site.

Tous les jours, un cronjob sur le deuxième serveur fait une backup du serveur MySQL


## Pipeline CI / CD

Le projet ne possède pas de système de déploiement automatique mais des tests unitaires sont exécuté à chaque pull request sur la branche master. 
Il est aussi impossible de commit directement sur le master, les modifications sont seulement accepté si la pull request est validée. 

## Documentation technique 

Repository github pour le code de l’application : 
https://github.com/SimonBredeche/devops_project

Repository github pour les rôles ansible :
https://github.com/SimonBredeche/devops_project_roles

## Description des rôles :

**Backend :**
Le rôle backend sert à déployer la base de donnée, il crée un utilisateur par défaut et initialise la base de donnée . Ce rôle copie aussi le fichier de configuration MySQL

**Docker :**
Le rôle docker sert à déployer l’api ainsi que le front, il copie le code de l’application dans la VM souhaitée et il construit et exécute les conteneurs.

**Installation du projet**
Prérequis pour lancer le projet en local : 
- docker  
- docker-compose 

Pour lancer le projet en local lancer les commandes suivantes : 
`docker-compose build`
`docker-compose up`


Prérequis pour lancer le projet en production : 
-Avoir ansible et python sur sa machine 
-Avoir deux VM avec openssh 

**Etape 1 :**
Faire l’échange des clés SSH entre votre machine ansible et vos deux autres VM. 

**Etape 2 :**
Cloner ces 2 repository : 
https://github.com/SimonBredeche/devops_project
https://github.com/SimonBredeche/devops_project_roles

**Etape 3 :**
Aller dans le dossier playbooks et modifié les IP dans inventaire.yml par vos IP de machines. 
Il ne reste plus qu’à lancer le projet  : sh.start  
