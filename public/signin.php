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
    if (isset($_POST['password'])) {
        $pwd = trim(strip_tags($_POST['password'])) ;
    } else {
        $pwd = '' ;
    }

    $formOk = true ;
    // validation de l'email
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $formOk = false ;
        $emailError = "Email non valide" ;
    } ;
    // validation du password
    if (pwdCheck($pwd)==false) {
        $formOk = false ;
        $pwdError = "Mot de passe non valide" ;
    } ;

    if($formOk) {
        $sql = "SELECT * FROM user WHERE usr_email=:email" ;
        $pdoStatement = $pdo->prepare($sql) ;
        $pdoStatement->bindValue(':email',$email,PDO::PARAM_STR) ;
        $pdoStatement->execute() ;
        $user = $pdoStatement->fetchAll(PDO::FETCH_ASSOC) ;
        if(empty($user[0])) {
            $emailError = 'Email inconnu';
        } else if (password_verify($pwd , $user[0]['usr_password'])) {
            $ip = $_SERVER['REMOTE_ADDR'] ;
            $id = $user[0]['usr_id'] ;
            $role = $user[0]['usr_role'] ;
            $_SESSION['id'] = $id ;
            $_SESSION['ip'] = $ip ;
            $_SESSION['role'] = $role ;
            header('Location: index.php') ;
        } else {
            $pwdError = 'Mot de passe erroné';
        }
    }
} ; // fin du traitement du formulaire

require_once __DIR__.'/../view/header.php' ;
require_once __DIR__.'/../view/signin.php' ;
require_once __DIR__.'/../view/footer.php' ;

 ?>
