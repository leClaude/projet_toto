<?php
session_start() ;
require_once __DIR__.'/../inc/config.php' ;

$emailError = '';
$pwdError = '';
// traitement du formulaire
if(!empty($_POST)) {
    // récupération des données et affectation des varaibles
    if (isset($_POST['email'])) {
        $email = trim(strip_tags($_POST['email'])) ;
    } else {
        $email = '' ;
    } ;
    if (isset($_POST['password1'])) {
        $pwd1 = trim(strip_tags($_POST['password1'])) ;
    } else {
        $pwd1 = '' ;
    } ;
    if (isset($_POST['password1'])) {
        $pwd2 = trim(strip_tags($_POST['password2'])) ;
    } else {
        $pwd2 = '' ;
    } ;



    // validation des variables
    $formOk = true ;

    // validation email
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $formOk = false ;
        $emailError = "Email non valide" ;
    } ;
    // validation password
    $password = '' ;
    if ($pwd1==$pwd2) {
        if (pwdCheck($pwd1)===true) {
            $password = password_hash($pwd1, PASSWORD_BCRYPT) ;
        } else {
            $formOk = false ;
            $pwdError = "Mot de passe non valide" ;
        } ;
    } else {
        $formOk = false ;
        $pwdError = "Les deux mots de passe ne correspondent pas" ;
    }
    // si le formulaire n'est pas ok
    if ($formOk == false) {
        echo "<script>alert ('Formulaire incorrect')</script>" ;
    } else {
        // si l'email existe
        if (emailExists($email)) {
            echo "<script>alert ('Cet email existe déjà')</script>" ;
        } else {
        // insertion dans la base de données
        $sql = "INSERT INTO user (usr_email, usr_password) VALUES (:email, :password)" ;
        $pdoStatement = $pdo->prepare($sql) ;
        $pdoStatement->bindValue(':email', $email) ;
        $pdoStatement->bindValue(':password', $password) ;
        $pdoStatement->execute() ;
        echo "<script>alert ('Vous êtes correctement enregistré')</script>" ;
        }

    }
} // fin de traitement du formulaire


require_once __DIR__.'/../view/header.php' ;
require_once __DIR__.'/../view/signup.php' ;
require_once __DIR__.'/../view/footer.php' ;
 ?>
