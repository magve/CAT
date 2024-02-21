# Chasse Au Trésor

---
#Second commit
Ajout d'un module pour gérer les sessions, ça permet de sauvegarder ce dont on a besoin pour répondre à un utilisateur.
---
#Premier commit
php, manque la base de données, la map, etc.


## Serveur avec Docker
Pré-requis installer Docker et Docker Compose:
- **[Docker](https://docs.docker.com/get-docker/)**
- **[Docker-compose](https://docs.docker.com/compose/install/)**
- Pour utiliser Docker sans sudo (optionnel pas securisé) : https://docs.docker.com/engine/install/linux-postinstall/

## Environnement de dev
Disposer d'un projet dans GitHub (ou GitLab) et créer un clé ssh pour votre compte.
Installer l'environnement de dev :
```
git clone git@github.com:magve/CAT.git
```
```
cd CAT
```

→ Construire les images et démarrer les containers en arrière plan (utiliser --build pour re builder les images) Par defaut utiliser sudo sous linux:
```
docker-compose up -d
```

→ Lister vos containers actifs :
```
docker ps 
```

Le nom du container qui contient php et apache a pour nom : "cat-php-apache" comme défini dans le docker-compose.yml  :

→ Lancer le bash de notre conteneur php afin d'intéragir avec la machine Debian :
```
docker exec -ti cat-php-apache bash
```
