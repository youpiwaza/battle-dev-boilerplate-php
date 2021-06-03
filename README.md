# Le boilerplate pour faire la battle dev en PHP

Afin de pas me retaper une 10eme fois la re-création de ce bousin, pour participer a la [battle dev](https://battledev.blogdumoderateur.com/).

Comment ksa marche ?

- **Soit simplement** Serveur PHP local: Cloner le repo dans le dossier du serveur local PHP, et accéder à `src/`
- **Soit Docker flemme** : `docker-compose up` & go [localhost:8080](http://localhost:8080/) *// latest nginx & php-fpm*

Y'a un boilerplate & des exemples & des archives dans src/, *GLHF*.

## Une archive de battle dev

- [Lien vers tous les exos](https://www.isograd.com/FR/solutionconcours.php?cts_id=70&que_str_id=&reg_typ_id=2)
- [Lien vers le 1er exo](https://demo.isograd.com/runtest/QuestionDisplayer)

## Comment ksa marche

cf. [l'exemple alakon](index-exemple-archive-alakon.php).

On récupère des jeux de tests pour bosser en local, et en fonction de l'énoncé : on prend ce qui arrive en entrée, et on doit renvoyer la sortie correcondante (calcul, moyenne, etc.).

Afin de gagner du temps et d'éviter de perdre tout le code en codant en ligne, on passe en local.

Exemple avec PHP : on récupère l'un des fichier du jeu de test, genre `src/fichiers-a-recuperer/exemple-archive-battle-dev-sample/input1.txt` via [ça](https://www.php.net/manual/fr/function.file-get-contents.php).

Puis on extrait son contenu dans un tableau et on est comme si on était en ligne wesh.

Le but est de manipuler/calculer les entrées afin de pouvoir afficher le résultat correspondant, ici `src/fichiers-a-recuperer/exemple-archive-battle-dev-sample/output1.txt`.

Note: ce setup permet également de changer facilement de jeu de donnée, afin de pouvoir tester différents trucs.

## Mes notes docker

Monter un compose Nginx & PHP, avec sources bindées

```bash
# Repo avec les détails > server-related-tutorials/01-docker/04-my-tests/02-compose-nginx-php
cd /mnt/c/Users/Patolash/Documents/_dev/battle-dev/conteneur-php

docker-compose up
```

Go sur [localhost:8080](http://localhost:8080/)
