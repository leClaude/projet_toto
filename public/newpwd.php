<?php
session_start() ;
require_once __DIR__.'/../inc/config.php' ;

$error = '' ;

// traitement du formulaire
if(!empty($_POST)) {
    // récupération des données et affectation des varaibles
    if (isset($_POST['email'])) {
        $email = trim(strip_tags($_POST['email'])) ;
    } else {
        $email = '' ;
    } ;


    // validation des variables
    $formOk = true ;

    // validation email
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $formOk = false ;
        $error .= "Email non valide " ;
    } ;

    // si le formulaire n'est pas ok
    if ($formOk == false) {
        echo "<script>alert({$error})</script>" ;
    } else {
        // si l'email existe
        if (!emailExists($email)) {
            echo "<script>alert ('Cet email n'existe pas')</script>" ;
        } else {
            $token = md5(mt_rand()) ;
            // insertion dans la base de données du token
            $sql = "UPDATE user SET usr_token=:token WHERE usr_email=:email" ;
            $pdoStatement = $pdo->prepare($sql) ;
            $pdoStatement->bindValue(':token', $token) ;
            $pdoStatement->bindValue(':email', $email) ;
            $pdoStatement->execute() ;
            $subject = 'Projet Toto : activation de votre nouveau mot de passe' ;
            $url = "projet-toto.dev/resetpwd.php?token={$token}" ;
            $html = "Cliquez sur ce lien pour réinitialiser votre mot de passe : {$url}" ;
            sendEmail ($email, $subject, $html) ;
            echo "<script>alert ('Un email vient de vous être envoyé.')</script>" ;
        }

    }
} // fin de traitement du formulaire


require_once __DIR__.'/../view/header.php' ;
require_once __DIR__.'/../view/newpwd.php' ;
require_once __DIR__.'/../view/footer.php' ;
 ?>
