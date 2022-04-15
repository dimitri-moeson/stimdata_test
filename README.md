# stimdata_test

Le cahier des charges est donc le suivant :

- Une base de données utilisateurs avec une seule table contenant au moins login et mot de passe (format des données à votre choix).
- Un formulaire de connexion pour saisir le login et mot de passe
- Une page pour dire si oui ou non la connexion est ok  (couple login / mot de passe valide).
- PDO/MYSQLI au choix comme abstraction SQL.
- Aucune exigence de mise en page.
- Pas de composants externes (symfony, doctrine)
- Le résultat ne devrait pas faire plus de 50 lignes de codes.

choix :

- table "utilisateurs"( id,login,pswd)
- abstraction SQL : PDO
- fichier SQL joint
- Mots de passe crypté en MD5

login / pswd existant :

- test / 1234
- demo / demo