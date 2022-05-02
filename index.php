<?php

/**
 * Class stimdata
 */
class stimdata {

    /**
     * @return bool
     */
    public function login(){

        /** @var boolean $logged utilisateur identifié ou non */
        $logged = false;

        // Si le formulaire est soumis

        if (getenv('REQUEST_METHOD') === "POST" && isset($_POST['send'])) {

            /** traitement de l'identification */

            $dsn = 'mysql:dbname=stimdata_test;host=127.0.0.1';
            $user = 'dbuser';
            $password = 'dbpass';

            // connexion à la base

            $dbh = new PDO($dsn, $user, $password);

            // requete SQL pour retrouver l'utilisateur

            $sth = $dbh->prepare('SELECT id, pswd FROM utilisateurs WHERE login = :login ;');
            $sth->execute(['login' => $_POST['login']]);
            $red = $sth->fetch(PDO::FETCH_OBJ);

            // verification de l'enregistrement en base et du mot de passe

            if ($red !== false) {

                if ($red->pswd === md5($_POST['pswd'])) {

                    $logged = true;
                }
            }
        }

        return $logged;
    }

    /**
     * @param boolean $logged
     * @return string
     */
    public function screen($logged = false ) {

        $html = "" ;

        if (isset($_GET['p']) && $_GET['p'] === "identification") {

            /** page de resultat */

            if ($logged) {

                // couple login / mot de passe valide
                $html =  "<h1>identification OK</h1>";

            } else {

                // couple login / mot de passe invalide
                $html = "<h1>identification échouée</h1>";
                $html .= "<a href='?p=login'>Revenir</a>";
            }

        } else {

            /** formulaire de connexion */

            $html = "<h1>identification</h1>";
            $html .= '<form method="post" action="?p=identification">';
            $html .= '<input type="text" name="login" placeholder="login" />';
            $html .= '<input type="password" name="pswd" placeholder="password" />';
            $html .= '<input type="submit" name="send" value="Envoyer" />';
            $html .= '</form>';
        }

        return $html ;
    }
}

$controller = new stimdata();

$log = $controller->login();

echo $controller->screen($log);
?>