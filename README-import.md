# Script d'import

> Permet de "copier" une branche d'un repo depuis Github.

Mise en place

- Copier le fichier `import-external-repo.sh` à la racine de votre projet.
- Vous donnez les droits d'exécution (Linux) sur ce fichier
  - `chmod +x import-external-repo.sh`

Utilisation

:warning: Idéalement on s'assure qu'on a commité tous nos changements dans une branche à nous, puis on se place sur la branche `master` (qui ne contient aucun merge). On vérifie avec `git status` que notre copie locale est OK (pas de modifs non commitées).

Par ex. pour copier ma branche `e02-correction-challenge`, on exécute :

- `sh import-external-repo.sh git@github.com:O-clock-Boson/S05-projet-oshop-jc-oclock.git e02-correction-challenge e02-correction-challenge`

Où la première branche est la vôtre (sera créée en local) et la seconde celle à copier).