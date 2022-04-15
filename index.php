<?php

$logged = false ;

if( getenv('REQUEST_METHOD') === "POST" && isset($_POST['send'])) {

    $dsn = 'mysql:dbname=stimdata_test;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $dbh = new PDO($dsn, $user, $password);

    $sth = $dbh->prepare('SELECT id, pswd FROM utilisateurs WHERE login = :login ;');
    $sth->execute([ 'login' => $_POST['login'] ]);
    $red = $sth->fetch(PDO::FETCH_OBJ);

    if($red !== false ) {

        if( $red->pswd === md5($_POST['pswd']) ) {

            $logged = true ;
        }
    }
}
if(isset($_GET['p']) && $_GET['p'] === "identification") {

    if($logged) {

        echo "<h1>identification OK</h1>";

    } else {

        echo "<h1>identification échouée</h1>";
        echo "<a href='?p=login'>Revenir</a>";
    }

} else {

    echo "<h1>identification</h1>";
    echo '<form method="post" action="?p=identification">';
    echo '<input type="text" name="login" placeholder="login" />';
    echo '<input type="password" name="pswd" placeholder="password" />';
    echo '<input type="submit" name="send" value="Envoyer" />';
    echo '</form>';
}
?>