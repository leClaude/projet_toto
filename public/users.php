<?php
session_start() ;
if ($_SERVER['REMOTE_ADDR']!=$_SESSION['ip']) {
    header("Location: disconnect.php");
    exit ;
} ;
if ($_SESSION['role']!='admin') {
    header("Location: 403.php");
    exit ;
} ;
require_once __DIR__.'/../inc/config.php' ;

// récupérer les informations sur tous les utilisateurs
$sql = "SELECT * FROM user ORDER BY usr_id ASC" ;
$pdoStatement = $pdo->prepare($sql) ;
$pdoStatement->execute() ;
$usersList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC) ;

// modification du rôle d'un utilisateur
if(!empty($_POST['id_mod'])) {
    $sql = "UPDATE user SET usr_role=:role WHERE usr_id=:id" ;
    $pdoStatement = $pdo->prepare($sql) ;
    $pdoStatement->bindValue(':role',$_POST['role']) ;
    $pdoStatement->bindValue(':id',$_POST['id_mod']  ) ;
    $pdoStatement->execute() ;
    header('Location: users.php') ;
}
// suppression d'un utilisateur
if(!empty($_GET['id_del'])) {
    $deleteId = $_GET['id_del'] ;
    $sql = "DELETE FROM user WHERE usr_id=:id" ;
    $pdoStatement = $pdo->prepare($sql) ;
    $pdoStatement->bindValue(':id',$deleteId) ;
    $pdoStatement->execute() ;
    header('Location: users.php') ;
}

// inclusion header et footer
require_once __DIR__.'/../view/header.php' ;
require_once __DIR__.'/../view/users.php' ;
require_once __DIR__.'/../view/footer.php' ;

 ?>
