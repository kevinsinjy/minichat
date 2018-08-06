<?php
    include ('../vendor/autoload.php');
    use \Colors\RandomColor;
    // Connexion à la base de données
    include 'connection.php';
    // On écrit un cookie
    setcookie("nickname", $_POST["nickname"], time() + 365*24*3600, null, null, false, true); 

    //Récupérer l'IP
    function get_ip() {
        // IP si internet partagé
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        // IP derrière un proxy
        elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        // Sinon : IP normale
        else {
            return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
        }
    }

    // Insertion du message à l'aide d'une requête préparée

    $req = $bdd->prepare('INSERT INTO mini_chat (pseudo, message, date,IP, user) VALUES(?, ?, NOW(), ?, ?)');

    $req->execute(array($_POST['nickname'], $_POST['message'], get_ip(), $_SERVER['HTTP_USER_AGENT']));

    //Pour trouver ou non le pseudo en BDD
    $nickname_exists = $bdd->prepare('SELECT COUNT(*) FROM user WHERE pseudo = ?');
    $nickname_exists->execute([$_POST["nickname"]]);

    //Variable pour nickname avec color déjà attribué
    if(!$nickname_exists){
        print_r($bdd->errorInfo());
    
    }
    //Variable du fetch $nickname_exists réutilisé dans if 
    $nicknameColor = $nickname_exists->fetchColumn();

    //Si pas de couleur attribué au pseudo
    if( $nicknameColor==="0"){
        $req1 = $bdd->prepare('INSERT INTO user (pseudo, color) VALUES (?,?)');
        $req1->execute(array($_POST["nickname"], RandomColor::one() ));
    }

    //Message d'erreur si problème de fetch
    if(!$nicknameColor){
    print_r($bdd->errorInfo());
}

    // Redirection du visiteur vers la page du minichat
    //header('Location: index.php');

?>